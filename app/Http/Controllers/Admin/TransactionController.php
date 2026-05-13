<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('admin.transactions');
    }

    public function create()
    {
        return view('admin.transactions.create');
    }

    public function store(Request $request)
    {
        // Logic untuk menyimpan transaction
        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($id)
    {
        return view('admin.transactions.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admin.transactions.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic untuk update transaction
        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Logic untuk hapus transaction
        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
