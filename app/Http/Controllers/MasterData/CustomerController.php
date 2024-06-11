<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk memperbaiki masalah class Auth tidak ditemukan

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $fields = getField('customers',['nama','lokasi','peruntukan','potensi','status']);
        $query = _db('customers');

        if ($request->has('filter_name')) {
            $query->where('nama', 'like', '%' . $request->filter_name . '%');
        }
        if ($request->has('filter_city')) {
            $query->where('lokasi', 'like', '%' . $request->filter_city . '%');
        }

        $data = $query->paginate(7);

        return view('master-data.customer.index', compact('fields', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = getField('customers');

        return view('master-data.customer.form', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['nama', 'entitas', 'objek', 'lokasi', 'peruntukan', 'potensi', 'po_date', 'status', 'relasi']);
        $data['uuid'] = uuid();
        $data['id'] = _db('customers')->max('id') + 1;
        $data['kode_customer'] = 'CS' . sprintf('%05d', $data['id']) . $data['relasi'];
        // dd($data);
        _db('customers')->insert($data);

        return redirect()->route('customer.index')->with(['success' => 'Customer berhasil ditambahkan.', 'alert-time' => 3]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fields = getField('customers');
        $data = _db('customers')->find($id);

        return view('master-data.customer.form', compact('fields', 'data'));
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
