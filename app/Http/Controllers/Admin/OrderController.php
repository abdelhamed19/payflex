<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        // تخزين البيانات
    }

    public function edit($id)
    {
        return view('admin.orders.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // تحديث البيانات
    }

    public function destroy($id)
    {
        // حذف البيانات
    }
}