@extends('layouts.admin')

@section('title', 'Edit Transaksi - Admin')
@section('page_title', 'Edit Transaksi')
@section('page_subtitle', 'Ubah detail transaksi di sini.')
@section('content')
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8">
    <p class="text-slate-600">Edit transaksi ID: {{ $id }}</p>
</div>
@endsection
