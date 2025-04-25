<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Models\Country;

class SettingController extends Controller
{
    public function countries()
    {
        $countries = Country::paginate(10);
        return view('admin.countries.index', compact('countries'));
    }
    public function regions()
    {
        $regions = Region::with('country')->paginate(10);
        return view('admin.regions.index', compact('regions'));
    }
    public function cities()
    {
        $cities = City::with(['country', 'region'])->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }
    public function changeLanguage($lang)
    {
        session(['lang' => $lang]);
        return back();
    }
    public function toggleStatus($model, $id, $action)
    {
        try {
            // تحويل اسم الموديل إلى المسار الصحيح داخل `App\Models`
            $modelClass = "App\\Models\\" . ucfirst($model);

            if (!class_exists($modelClass)) {
                return response()->json(['success' => false, 'message' => 'Invalid model name!'], 400);
            }

            $record = $modelClass::find($id);

            if (!$record) {
                return response()->json(['success' => false, 'message' => 'Record not found!'], 404);
            }

            // التحقق من وجود الحقل is_active في الموديل
            if (!array_key_exists('is_active', $record->getAttributes())) {
                return response()->json(['success' => false, 'message' => 'Model does not have is_active field!'], 400);
            }

            // تحديث الحالة
            $record->is_active = ($action === 'open') ? 1 : 0;
            $record->save();

            return response()->json([
                'success' => true,
                'message' => __('admin.status_updated_successfully'),
                'new_status' => $record->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('admin.status_update_failed'),
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
