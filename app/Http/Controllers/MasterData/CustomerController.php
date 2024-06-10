<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $fields = getField('customers',['nama','objek','lokasi','peruntukan','potensi','status']);

        return view('master-data.customer.index', compact('fields'));
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
        _db('customers')->insert($data);

        return redirect()->route('customer.index')->with(['success' => 'Customer berhasil ditambahkan.', 'alert-time' => 3]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
