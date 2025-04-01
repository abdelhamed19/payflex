<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sidebar;
use App\Models\SidebarChildren;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Section\CreateSectionRequest;

class SectionController extends Controller
{
    public function create()
    {
        return view('admin.sections.create');
    }
    public function store(CreateSectionRequest $request)
    {
        $SidebarData = $request->except('child_sections');
        $childData = $request->only('child_sections')['child_sections'] ?? null;
        try {
            DB::beginTransaction();
            $Sidebar = Sidebar::create($SidebarData);
            if (isset($childData)) {
                foreach ($childData as $key => $child) {
                    $child['sidebar_id'] = $Sidebar->id;
                    SidebarChildren::create($child);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error creating section: ' . $e->getMessage());
        }
        $sectionName = json_decode($Sidebar->name, true)['en'];
        createSectionViews($sectionName);
        createModelWithMigration($sectionName);
        createRequestFiles($sectionName);
        createController($sectionName);
        appendRoutes($sectionName);
        createSeeder($sectionName);
        return back()->with('success', 'Section created successfully');
    }

}
