<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Location;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::query();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('users.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <form action="' . route('users.destroy', $row->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus user?\')">Hapus</button>
                        </form>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('auth.users');
    }

    /**
     * Tampilkan form untuk menambahkan user baru.
     */
    public function create()
    {
        // Untuk form pendaftaran, jika ada dropdown Office dan Position, kita bisa juga mengirimkan data yang dibutuhkan.
        $locations = Location::all();
        $positions = Employee::select('jabatan')->distinct()->get();
        return view('auth.register', compact('locations', 'positions'));
    }

    /**
     * Simpan data user baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'office'   => 'required',
            // 'position' => 'required',
            'nohp'     => 'required',
            'role'     => 'required',
            'password' => 'required|min:5'
        ]);

        User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'office'   => $request->office,
            // 'position' => $request->position,
            'nohp'     => $request->nohp,
            'role'     => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Tampilkan form untuk mengedit user.
     */
    public function edit(User $user)
    {
        // Ambil data lokasi untuk dropdown Office
        $locations = Location::all();
        // Ambil data posisi yang unik dari tabel employees untuk dropdown Position
        $positions = Employee::select('jabatan')->distinct()->get();
        return view('auth.edit', compact('user', 'locations', 'positions'));
    }

    /**
     * Perbarui data user yang sudah ada.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'office'   => 'required',
            'position' => 'required',
            'nohp'     => 'required',
            'role'     => 'required',
        ]);

        $data = $request->only(['username', 'name', 'email', 'office', 'position', 'nohp', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user dari database.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
