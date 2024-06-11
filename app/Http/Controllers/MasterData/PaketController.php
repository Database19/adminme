<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk memperbaiki masalah class Auth tidak ditemukan

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $packages = _db('packages')->select(['package_id','package_name','price_per_m2'])->get();
        $features = _db('features')
            ->join('package_features', 'features.feature_id', '=', 'package_features.feature_id')
            ->select('package_features.package_id', 'features.feature_name')
            ->get();
        $paket = $packages->map(function($package) use ($features) {
            $package->features = $features->where('package_id', $package->package_id);
            return $package;
        });
        // dd($paket);
        // $fields = getField('customers',['nama','lokasi','peruntukan','potensi','status']);
        // $query = _db('customers');

        // if ($request->has('filter_name')) {
        //     $query->where('nama', 'like', '%' . $request->filter_name . '%');
        // }
        // if ($request->has('filter_city')) {
        //     $query->where('lokasi', 'like', '%' . $request->filter_city . '%');
        // }

        // $data = $query->paginate(7);

        // dd($paket);

        return view('master-data.paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $fields = getField('customers');

        // return view('master-data.customer.form', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->only(['nama', 'entitas', 'objek', 'lokasi', 'peruntukan', 'potensi', 'po_date', 'status', 'relasi']);
        // $data['uuid'] = uuid();
        // $data['id'] = _db('customers')->max('id') + 1;
        // $data['kode_customer'] = 'CS' . sprintf('%05d', $data['id']) . $data['relasi'];
        // // dd($data);
        // _db('customers')->insert($data);

        // return redirect()->route('customer.index')->with(['success' => 'Customer berhasil ditambahkan.', 'alert-time' => 3]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $fields = getField('customers');
        // $data = _db('customers')->find($id);

        // return view('master-data.customer.form', compact('fields', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
