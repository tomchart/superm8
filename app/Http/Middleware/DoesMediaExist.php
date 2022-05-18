<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\MediaType;

class DoesMediaExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // search for existing Media for Title and Type provided by user
        $title = strtolower(request()->name);
        $type = MediaType::where('id', '=', request()->type_id)->first()->type;
        $media = Media::where('Title', '=', $title)->where('Type', '=', $type)->first();

        // merge if not null else do nothing
        if ($media != null) {
            $request->merge(['media' => $media]);
            return $next($request);
        } else {
            return $next($request);
        }
    }
}
