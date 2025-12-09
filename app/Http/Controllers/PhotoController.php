<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::with('user')->latest()->get();
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:4096',
            'title' => 'required',
            'description' => 'nullable'
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Photo::create([
            'image_path' => $path,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('photos.index')
            ->with('success', 'Foto succesvol toegevoegd!');
    }

    public function show(Photo $photo)
    {
        $photo->load('user', 'comments.user'); // laad user + comments efficiënt

        return view('photos.show', compact('photo'));
    }


    public function edit(Photo $photo)
    {
        $this->authorize('update', $photo);
        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'photo' => 'image|max:4096'
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($photo->image_path);
            $photoPath = $request->file('photo')->store('photos', 'public');
            $photo->image_path = $photoPath;
        }


        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Foto bijgewerkt!');
    }

    public function destroy(Photo $photo)
    {
        $this->authorize('delete', $photo);

        Storage::disk('public')->delete($photo->photo);
        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Foto verwijderd!');
    }

}
