<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\MediaAPI;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function show(Media $media)
    {
        return view('media.show', [
            'media' => $media,
            'comments' => $media->comments()->orderBy('created_at', 'DESC')->paginate(5),
        ]);
    }

    public function store(MediaAPI $mediaAPI)
    {
        // validate name
        request()->validate(['name' => ['required', 'max:255']]);

        // search for request()->name, store result
        try {
            $mediaAPI->searchTitle(request('name'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'name' => 'This name could not be searched.'
            ]);
        }

        return back();
    }

    public function index(Request $request)
    {
        $data = '';
        $search = $request->get('search');
        if ($search != '') {
            $data = DB::table('media')
                ->where('Title', 'like', '%' . $search . '%')
                ->orWhere('Director', 'like', '%' . $search . '%')
                ->orWhere('Year', 'like', '%' . $search . '%')
                ->get();
        }
        return json_encode($data);
    }
}
