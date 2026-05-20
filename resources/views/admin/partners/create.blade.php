@extends('layouts.admin')

@section('title', 'Tambah Partner Baru - Admin')
@section('page_title', 'Tambah Partner Baru')
@section('page_subtitle', 'Masukkan data partner dan sponsor baru.')

@section('content')
<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm max-w-3xl">

    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Nama Partner --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                Nama Partner
            </label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl
                focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                placeholder="Contoh: PT. Teknologi Indonesia"
                required>

            @error('name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Logo Partner --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                Logo Partner
            </label>
            <input type="file" name="logo_url" accept="image/*"
                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl
                focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium">

            <p class="text-xs text-slate-400 mt-2">
                Format: JPG, PNG, GIF | Ukuran maksimal: 2MB
            </p>

            @error('logo_url')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="pt-4 flex justify-end gap-4 border-t border-slate-100">
            <a href="{{ route('admin.partners.index') }}"
                class="px-6 py-4 text-slate-500 font-bold hover:text-slate-800 transition">
                Batal
            </a>

            <button type="submit"
                class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold
                shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">
                Simpan Partner
            </button>
        </div>

    </form>
</div>
@endsection
