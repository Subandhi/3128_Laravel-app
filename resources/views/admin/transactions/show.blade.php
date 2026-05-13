@extends('layouts.admin')

@section('title', 'Detail Transaksi - Admin')
@section('page_title', 'Detail Transaksi')
@section('page_subtitle', 'Lihat detail transaksi di sini.')
@section('content')
<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8">
    <p class="text-slate-600">Detail transaksi ID: {{ $id }}</p>
</div>
@endsection
