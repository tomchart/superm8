<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Media;

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
            'rating_ebert' => [],
        ]);
    }
}
