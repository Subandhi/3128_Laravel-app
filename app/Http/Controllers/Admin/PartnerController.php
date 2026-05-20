<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $search = request()->input('search');

        $partners = Partner::query();

        if ($search) {
            $partners->where('name', 'LIKE', '%' . $search . '%');
        }

        $partners = $partners->paginate(10);

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:partners,name',
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo_url')) {
            $file = $request->file('logo_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/partners'), $filename);
            $data['logo_url'] = 'uploads/partners/' . $filename;
        }

        Partner::create($data);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:partners,name,' . $partner->id,
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo_url')) {
            if ($partner->logo_url && file_exists(public_path($partner->logo_url))) {
                unlink(public_path($partner->logo_url));
            }

            $file = $request->file('logo_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/partners'), $filename);
            $data['logo_url'] = 'uploads/partners/' . $filename;
        }

        $partner->update($data);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo_url && file_exists(public_path($partner->logo_url))) {
            unlink(public_path($partner->logo_url));
        }

        $partner->delete();
        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus.');
    }
}
