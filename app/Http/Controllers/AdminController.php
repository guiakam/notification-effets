<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        return Admin::create($request->all());
    }

    public function show(Admin $admin)
    {
        return $admin;
    }

    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());
        return $admin;
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->noContent();
    }
}
