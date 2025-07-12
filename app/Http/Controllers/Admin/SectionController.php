<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Sidebar;
use App\Models\SidebarChildren;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Section\CreateSectionRequest;

class SectionController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('admin.sections.create', compact('roles'));
    }
    public function store(CreateSectionRequest $request)
    {
        $SidebarData = $request->except('child_sections', 'role_ids');
        $childData = $request->only('child_sections')['child_sections'] ?? null;
        $roleIds = $request->only('role_ids')['role_ids'];
        try {
            DB::beginTransaction();
            $Sidebar = Sidebar::create($SidebarData);
            if (isset($childData)) {
                foreach ($childData as $key => $child) {
                    $child['sidebar_id'] = $Sidebar->id;
                    SidebarChildren::create($child);
                }
            }
            $Sidebar->roles()->sync($roleIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error creating section: ' . $e->getMessage());
        }
        $sectionName = json_decode($Sidebar->name, true)['en'];
        createSectionViews($sectionName);
        createModelWithMigration($sectionName);
        createRequestFolderWithFiles($sectionName);
        createController($sectionName);
        appendRoutes($sectionName);
        createSeeder($sectionName);
        return back()->with('success', __('admin.section_created'));
    }
}
