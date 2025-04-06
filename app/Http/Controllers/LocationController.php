<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{
    /**
     * Tampilkan daftar lokasi.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locations = Location::query();

            return DataTables::of($locations)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('locations.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <form action="' . route('locations.destroy', $row->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus lokasi?\')">Hapus</button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('locations.index');
    }

    /**
     * Tampilkan form untuk membuat lokasi baru.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Simpan lokasi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|unique:locations,nama_lokasi',
        ]);

        Location::create($request->only('nama_lokasi'));

        return redirect()->route('locations.index')->with('success', 'Location berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail lokasi.
     */
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    /**
     * Tampilkan form untuk mengedit lokasi.
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Perbarui data lokasi yang sudah ada.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'nama_lokasi' => 'required|unique:locations,nama_lokasi,' . $location->id,
        ]);

        $location->update($request->only('nama_lokasi'));

        return redirect()->route('locations.index')->with('success', 'Location berhasil diperbarui.');
    }

    /**
     * Hapus lokasi.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location berhasil dihapus.');
    }
}
