<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $users = DB::table('vehicle_types')->paginate(10);
        return view('admin.vehicle-types.index',compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vehicle-types.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Toastr::success('User added successfully :)','Success');
        return redirect()->to('admin/vehicle-type');
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
        $user = VehicleType::findOrFail($id);
        return view('admin.vehicle-types.edit', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Toastr::success('User updated successfully :)','Success');
        return redirect()->to('admin/vehicle-type');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        info($id);
    }
}
