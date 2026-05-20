@extends('layouts.admin')

@section('title', 'Edit Partner - Admin')
@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Perbarui data partner dan sponsor.')

@section('content')
<div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm max-w-3xl">

    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Nama Partner --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                Nama Partner
            </label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}"
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

            @if($partner->logo_url)
                <div class="mb-4">
                    <p class="text-sm text-slate-600 mb-2">Logo Saat Ini:</p>
                    <img src="{{ asset($partner->logo_url) }}"
                         class="w-24 h-24 rounded-xl object-cover shadow-sm">
                </div>
            @endif

            <input type="file" name="logo_url" accept="image/*"
                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl
                focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium">

            <p class="text-xs text-slate-400 mt-2">
                Format: JPG, PNG, GIF | Ukuran maksimal: 2MB (Biarkan kosong jika tidak ingin mengubah)
            </p>

            @error('logo_url')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        {{-- Info Waktu --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                    Dibuat
                </label>
                <input type="text" value="{{ $partner->created_at->format('d M Y H:i') }}"
                    class="w-full px-5 py-4 bg-slate-100 border-2 border-slate-100 rounded-2xl text-slate-500"
                    disabled>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                    Terakhir Diperbarui
                </label>
                <input type="text" value="{{ $partner->updated_at->format('d M Y H:i') }}"
                    class="w-full px-5 py-4 bg-slate-100 border-2 border-slate-100 rounded-2xl text-slate-500"
                    disabled>
            </div>
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
                Perbarui Partner
            </button>
        </div>

    </form>
</div>
@endsection
