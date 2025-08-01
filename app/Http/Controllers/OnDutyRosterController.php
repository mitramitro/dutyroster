<?php

namespace App\Http\Controllers;

use App\Models\OnDutyRoster;
use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OnDutyRosterController extends Controller
{
    /**
     * Menampilkan daftar On Duty Roster.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Jika user belum login, kembalikan response error JSON
            if (!Auth::check()) {
                return response()->json([
                    'error' => 'Session expired. Please login again.'
                ], 401);
            }

            $role = Auth::user()->role;           // Ambil role user yang login
            $userOffice = Auth::user()->office;     // Ambil office user yang login


            $onDutyRosters = OnDutyRoster::with([
                'location',
                'managerOnDuty',
                'hssePagi',
                // 'hsseSore',
                'mps',
                'ssgaQq',
                'rsdFuelPagi',
                'rsdFuelSore',
                'rsdLpgPagi',
                'rsdLpgSore'
            ]);

            // Jika user bukan admin, filter data berdasarkan lokasi
            if ($role !== 'admin') {
                $onDutyRosters = $onDutyRosters->whereHas('location', function ($query) use ($userOffice) {
                    $query->where('nama_lokasi', $userOffice);
                });
            }

            $onDutyRosters = $onDutyRosters->orderBy('tanggal', 'desc');

            return DataTables::of($onDutyRosters)
                ->addIndexColumn()
                ->addColumn('tanggal', function ($row) {
                    return Carbon::parse($row->tanggal)->format('d-m-Y');
                })
                ->addColumn('lokasi', fn($row) => $row->location->nama_lokasi ?? '-')
                ->addColumn('manager_on_duty', fn($row) => $row->managerOnDuty->nama ?? '-')
                ->addColumn('hsse_pagi', fn($row) => $row->hssePagi->nama ?? '-')
                // ->addColumn('hsse_sore', fn($row) => $row->hsseSore->nama ?? '-')
                ->addColumn('mps', fn($row) => $row->mps->nama ?? '-')
                ->addColumn('ssga_qq', fn($row) => $row->ssgaQq->nama ?? '-')
                ->addColumn('rsd_fuel_pagi', fn($row) => $row->rsdFuelPagi->nama ?? '-')
                ->addColumn('rsd_fuel_sore', fn($row) => $row->rsdFuelSore->nama ?? '-')
                ->addColumn('rsd_lpg_pagi', fn($row) => $row->rsdLpgPagi->nama ?? '-')
                ->addColumn('rsd_lpg_sore', fn($row) => $row->rsdLpgSore->nama ?? '-')
                // ->addColumn('action', function ($row) {
                //     return '
                //     <a href="' . route('onduty.edit', $row->id) . '" class="btn btn-warning btn-sm">Edit</a>
                //     <button onclick="delConfirm(' . $row->id . ')" class="btn btn-danger btn-sm">Hapus</button>';
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }

        return view('onduty.index');
    }

    /**
     * Menampilkan form untuk membuat On Duty Roster baru.
     */
    public function create()
    {
        $employees = Employee::all();
        $locations = Location::all();

        return view('onduty.create', compact('employees', 'locations'));
    }

    /**
     * Menyimpan data On Duty Roster baru.
     */
    public function store(Request $request)
    // Validasi data yang diterima dari form
    {
        // dd($request->all());
        $request->validate([
            'tanggal' => 'required|date',
            'location_id' => 'required|exists:locations,id',
            'manager_on_duty_id' => 'required|exists:employees,id',
            'hsse_pagi_id' => '',
            // 'hsse_sore_id' => '',
            'mps_id' => 'required|exists:employees,id',
            'ssga_qq_id' => 'required|exists:employees,id',
            'rsd_fuel_pagi_id' => 'required|exists:employees,id',
            'rsd_fuel_sore_id' => 'required|exists:employees,id',
            'rsd_lpg_pagi_id' => 'required|exists:employees,id',
            'rsd_lpg_sore_id' => 'required|exists:employees,id',
        ]);

        OnDutyRoster::create($request->all());

        return redirect()->route('onduty.index')->with('success', 'On Duty Roster berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail On Duty Roster tertentu.
     */
    public function show(OnDutyRoster $onDutyRoster)
    {
        // return view('onduty.show', compact('onDutyRoster'));
        abort(404);
    }

    /**
     * Menampilkan form untuk mengedit On Duty Roster.
     */
    public function edit($id)
    {
        $onDutyRoster = OnDutyRoster::findOrFail($id);
        $employees = Employee::all();
        $locations = Location::all();

        return view('onduty.edit', compact('onDutyRoster', 'employees', 'locations'));
    }

    /**
     * Memperbarui data On Duty Roster.
     */
    public function update(Request $request, OnDutyRoster $onduty)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'location_id' => 'required|exists:locations,id',
            'manager_on_duty_id' => 'required|exists:employees,id',
            'hsse_pagi_id' => 'required|exists:employees,id',
            // 'hsse_sore_id' => 'required|exists:employees,id',
            'mps_id' => 'required|exists:employees,id',
            'ssga_qq_id' => 'required|exists:employees,id',
            'rsd_fuel_pagi_id' => 'required|exists:employees,id',
            'rsd_fuel_sore_id' => 'required|exists:employees,id',
            'rsd_lpg_pagi_id' => 'required|exists:employees,id',
            'rsd_lpg_sore_id' => 'required|exists:employees,id',
        ]);

        $onduty->update($request->all());

        return redirect()->route('onduty.index')->with('success', 'On Duty Roster berhasil diperbarui.');
    }

    /**
     * Menghapus On Duty Roster.
     */
    public function destroy(OnDutyRoster $onDutyRoster)
    {
        $onDutyRoster->delete();

        return redirect()->route('onduty.index')->with('success', 'On Duty Roster berhasil dihapus.');
    }


    public function preview($id)
    {
        $onduty = OnDutyRoster::with([
            'location',
            'managerOnDuty',
            'hssePagi',
            // 'hsseSore',
            'mps',
            'ssgaQq',
            'rsdFuelPagi',
            'rsdFuelSore',
            'rsdLpgPagi',
            'rsdLpgSore'
        ])->findOrFail($id);

        return view('onduty.preview', compact('onduty'));
    }

    public function publishDisplay(Request $request)
    {

        $office = $request->query('office');
        // Filter data duty roster dengan status publish 'published' dan lokasi sesuai parameter
        $onduty = OnDutyRoster::with([
            'location',
            'managerOnDuty',
            'hssePagi',
            // 'hsseSore',
            'mps',
            'ssgaQq',
            'rsdFuelPagi',
            'rsdFuelSore',
            'rsdLpgPagi',
            'rsdLpgSore'
        ])
            ->where('publish', 'published')
            ->whereHas('location', function ($query) use ($office) {
                $query->where('nama_lokasi', $office);
            })
            ->orderBy('tanggal', 'desc')
            ->first();

        if (!$onduty) {
            // Jika tidak ada record publish yang 'published', kirim pesan ke view
            return view('onduty.display')->with('message', 'Belum ada yang di publish');
        }

        return view('onduty.display', compact('onduty'));
    }


    public function latest(Request $request)
    {
        $office = $request->query('office');
        Log::info("Office dari request:", ['office' => $office]); // Debug

        $onduty = OnDutyRoster::with('location')
            ->where('publish', 'published')
            ->whereHas('location', function ($query) use ($office) {
                $query->where('nama_lokasi', $office);
            })
            ->orderBy('tanggal', 'desc')
            ->first();

        if (!$onduty) {
            Log::info("Data OnDutyRoster tidak ditemukan untuk office: " . $office);
            return response()->json([
                'id'         => null,
                'updated_at' => null,
            ]);
        }

        Log::info("Data ditemukan:", [
            'id' => $onduty->id,
            'updated_at' => $onduty->updated_at ? $onduty->updated_at->toDateTimeString() : 'null'
        ]);

        return response()->json([
            'id'         => $onduty->id,
            'updated_at' => $onduty->updated_at ? $onduty->updated_at->toDateTimeString() : null,
        ]);
    }


    public function togglePublish($id)
    {
        // Ambil record yang akan di-publish
        $onduty = OnDutyRoster::findOrFail($id);
        $location = $onduty->location->nama_lokasi;

        // Ubah semua record di lokasi yang sama menjadi 'no'
        OnDutyRoster::whereHas('location', function ($query) use ($location) {
            $query->where('nama_lokasi', $location);
        })->update(['publish' => 'no']);

        // Ubah record yang dipilih menjadi 'published'
        $onduty->update(['publish' => 'published']);

        return response()->json(['success' => true]);
    }
}
