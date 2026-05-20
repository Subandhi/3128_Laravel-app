<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk filter
        $categories = Category::all();

        // 2. Ambil semua partner
        $partners = Partner::all();

        // 3. Query dasar event
        $query = Event::with('category')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc');

        // 4. Filter berdasarkan kategori (jika ada di URL)
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // 5. Ambil data event
        $events = $query->get();

        return view('welcome', compact('events', 'categories', 'partners'));
    }
}