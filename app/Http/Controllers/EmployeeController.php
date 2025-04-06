<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $role = Auth::user()->role;    // Mengambil role user
            $userOffice = Auth::user()->office; // Mengambil lokasi/office user

            // Mulai query employees dengan relasi location
            $employees = Employee::with(['location']);

            // Jika role bukan admin, filter berdasarkan lokasi
            if ($role !== 'admin') {
                $employees->whereHas('location', function ($query) use ($userOffice) {
                    $query->where('nama_lokasi', $userOffice);
                });
            }

            // Urutkan berdasarkan id desc
            $employees->orderBy('id', 'desc');


            return DataTables::of($employees)
                ->addIndexColumn()
                ->addColumn('lokasi', fn($row) => $row->location->nama_lokasi ?? '-')
                ->addColumn('action', function ($row) {
                    return '
                    <a href="' . route("employees.edit", $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    <form action="' . route("employees.destroy", $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin?\')">Hapus</button>
                    </form>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('employees.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();

        return view('employees.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'fungsi' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'nohp' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        Employee::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'fungsi' => $request->fungsi,
            'location_id' => $request->location_id,
            'nohp' => $request->nohp,
            'photo' => $photoPath,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $locations = Location::all(); // buat dropdown lokasi
        return view('employees.edit', compact('employee', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'fungsi' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            $photoPath = $employee->photo;
        }

        $employee->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'fungsi' => $request->fungsi,
            'nohp' => $request->nohp,
            'location_id' => $request->location_id,
            'photo' => $photoPath,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // Hapus foto jika ada
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee berhasil dihapus.');
    }
}
