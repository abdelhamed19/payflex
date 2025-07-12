<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laymor;
use App\Http\Requests\Admin\Laymor\CreateLaymorRequest;
use App\Http\Requests\Admin\Laymor\UpdateLaymorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaymorController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.laymor.index', [
            'model' => Laymor::search($request->query())->paginate(10),
            'modelName' => 'Laymor',
        ]);
    }

    public function create()
    {
        return view('admin.laymor.create');
    }

    public function store(CreateLaymorRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            Laymor::create($data);
            DB::commit();
            return redirect()->route('laymor.index')->with('success', __('admin.created_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => __('admin.error_creating')]);
        }
    }

    public function edit($id)
    {
        return view('admin.laymor.edit', [
            'id' => $id,
            'model' => Laymor::findOrFail($id),
            'modelName' => 'Laymor',
        ]);
    }

    public function show($id)
    {
        return view('admin.laymor.show', [
            'id' => $id,
            'model' => Laymor::findOrFail($id),
            'modelName' => 'Laymor',
        ]);
    }

    public function update(UpdateLaymorRequest $request, $id)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {
            Laymor::where('id', $id)->update($data);
            DB::commit();
            return redirect()->route('laymor.index')->with('success', __('admin.updated_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => __('admin.error_updating')]);
        }
    }
}