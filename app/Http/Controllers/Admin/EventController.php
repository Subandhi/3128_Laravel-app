<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        // Validasi data dari request
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);

        // Simpan data ke database
        \App\Models\Event::create($data);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Data Event berhasil ditambahkan.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Data event berhasil dihapus secara permanen.');
    }
    public function edit(Event $event)
    {
        $categories = \App\Models\Category::all();

        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(\Illuminate\Http\Request $request, Event $event)
    {
        // Validasi data
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);

        // Update data event
        $event->update($data);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Rincian data event berhasil diperbarui.');
    }
}
