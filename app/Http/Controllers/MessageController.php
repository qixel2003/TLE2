<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Photo;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::with('user')->latest()->get();
        return view('messages.index', compact('messages'));
    }

    public function show(Message $message) {
        $studentPhotos = Photo::with('user')
            ->where('user_id', '!=', $message->user_id)
            ->latest()
            ->get();

        return view('messages.show', compact('message', 'studentPhotos'));
        }

    public function create() {
        return view('messages.create');
    }

    public function store(Request $request, Message $message) {


        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'user_id' => 'required|exists:users,id',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('message_photos', 'public');
        }

        $message = [
            'title' => $request->title,
            'message' => $request->message,
            'photo' => $photoPath,
            'user_id' => $request->id,
        ];

        Message::create($message);

        return redirect()->route('messages.index')->with('success', 'Opdracht succesvol aangemaakt!');
    }

    public function edit(Message $message) {
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message) {

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('message_photos', 'public');
            $message->photo = $photoPath;
        }

        $message->update([
            'title' => $request->input('title'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('messages.show', $message)->with('success', 'Opdracht succesvol bijgewerkt!');
    }

    public function destroy(Message $message) {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Opdracht verwijderd!');
    }
}
