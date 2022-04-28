<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Watchlist;

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
        $media_input_name = strtolower(request()->name);
        $media_input_type = request()->type_id;
        $media = Media::where('name', '=', $media_input_name)->where('type_id', '=', $media_input_type)->first();

        $watchlist = Watchlist::where('id', '=', request('watchlist_id'))->first();

        if ($watchlist->media->contains($media)) {
            return back()->with('error', 'This media already exists in your watchlist.');
        }

        if ($media != null) {
            $request->merge(['media' => $media]);
            return $next($request);
        } else {
            $attributes = $this->validateMedia();
            $media = Media::create($attributes);
            $request->merge(['media' => $media]);
            return $next($request);
        }
    }
    protected function validateMedia()
    {
        return request()->validate([
            'type_id' => ['required', 'integer'],
            'name' => ['required', 'max:255'],
        ]);
    }
}
