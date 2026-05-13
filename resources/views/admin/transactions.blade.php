@extends('layouts.admin')

@section('title', 'Laporan Transaksi')
@section('header-title', 'Laporan Transaksi')
@section('header-subtitle', 'Pantau semua transaksi dan pembayaran di sini.')

@section('content')
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-slate-50/50 border-b flex gap-4">
            <input type="text" placeholder="Cari pembeli atau event..."
                class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
            <select class="px-5 py-3 rounded-xl border-slate-200 border bg-white outline-none">
                <option>Semua Status</option>
                <option>Success</option>
                <option>Pending</option>
                <option>Failed</option>
            </select>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">Pembeli</th>
                        <th class="px-8 py-4">Event</th>
                        <th class="px-8 py-4">Jumlah Tiket</th>
                        <th class="px-8 py-4">Total Pembayaran</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Donni Prabowo</p>
                            <p class="text-xs text-slate-400">donni@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">Jazz Night 2024</td>
                        <td class="px-8 py-6 font-medium text-slate-600">2 Tiket</td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 310.000</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">Success</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">15 Apr 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Maya Sari</p>
                            <p class="text-xs text-slate-400">maya@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">AI & Future Workshop</td>
                        <td class="px-8 py-6 font-medium text-slate-600">1 Tiket</td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 55.000</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase">Pending</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">14 Apr 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Budi Santoso</p>
                            <p class="text-xs text-slate-400">budi@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">Hackathon 2024</td>
                        <td class="px-8 py-6 font-medium text-slate-600">3 Tiket</td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 0 (Gratis)</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase">Free</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">13 Apr 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Siti Nurhaliza</p>
                            <p class="text-xs text-slate-400">siti@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">Jazz Night 2024</td>
                        <td class="px-8 py-6 font-medium text-slate-600">1 Tiket</td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 150.000</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">Success</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">12 Apr 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Ahmad Wijaya</p>
                            <p class="text-xs text-slate-400">ahmad@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">Tech Summit 2024</td>
                        <td class="px-8 py-6 font-medium text-slate-600">4 Tiket</td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 600.000</td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase">Failed</span>
                        </td>
                        <td class="px-8 py-6 text-sm text-slate-500">11 Apr 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-8 py-6 border-t bg-slate-50/50 flex justify-between items-center">
            <p class="text-sm text-slate-500">Menampilkan 1 sampai 5 dari 24 transaksi</p>
            <div class="flex gap-2">
                <button class="px-4 py-2 rounded-lg border border-slate-200 text-slate-600 text-sm font-medium hover:bg-slate-50 transition">← Sebelumnya</button>
                <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">Selanjutnya →</button>
            </div>
        </div>
    </div>
@endsection
