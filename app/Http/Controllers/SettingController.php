<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingController extends Controller
{
    public function countries(Request $request)
    {
        $countries = Country::search($request->query())->paginate(10);
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
                return response()->json(['success' => false, 'message' => __('admin.invalid_model')], 400);
            }

            $record = $modelClass::find($id);

            if (!$record) {
                return response()->json(['success' => false, 'message' => __('admin.record_not_found')], 404);
            }

            // التحقق من وجود الحقل is_active في الموديل
            if (!array_key_exists('is_active', $record->getAttributes())) {
                return response()->json(['success' => false, 'message' => __('admin.model_does_not_have_is_active_field')], 400);
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
    public function deleteItems()
    {
        $ids = request()->input('ids');
        $model = request()->input('model');

        if (empty($ids) || empty($model)) {
            return response()->json(['success' => false, 'message' => __('admin.invalid_input')], 400);
        }

        $modelClass = "App\\Models\\" . ucfirst($model);

        if (!class_exists($modelClass)) {
            return response()->json(['success' => false, 'message' => __('admin.invalid_model')], 400);
        }

        $deletedCount = $modelClass::destroy($ids);

        if ($deletedCount > 0) {
            return response()->json(['success' => true, 'message' => __('admin.items_deleted_successfully')]);
        } else {
            return response()->json(['success' => false, 'message' => __('admin.no_items_deleted')], 404);
        }
    }
    public function deleteResource()
    {
        $id = request()->query('id');
        $model = request()->query('model');

        if (empty($id) || empty($model)) {
            return response()->json(['success' => false, 'message' => __('admin.invalid_input')], 400);
        }

        $modelClass = "App\\Models\\" . ucfirst($model);

        if (!class_exists($modelClass)) {
            return response()->json(['success' => false, 'message' => __('admin.invalid_model')], 400);
        }

        $record = $modelClass::find($id);

        if (!$record) {
            return response()->json(['success' => false, 'message' => __('admin.record_not_found')], 404);
        }

        try {
            $record->delete();
            return response()->json(['success' => true, 'message' => __('admin.success')]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('admin.failed'),
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function search()
    {
        $search = request()->input('search');
        $model = request()->input('model');
        $fromDate = request()->input('from_date');
        $toDate = request()->input('to_date');
        $file = request()->input('file_directory');
        $value = request()->input('value');
        if (class_exists("App\\Models\\" . ucfirst($model))) {
            $modelClass = "App\\Models\\" . ucfirst($model);
        } else {
            return response()->json(['success' => false, 'message' => __('admin.invalid_model')], 400);
        }
        $queryBuilder = $modelClass::search($search);
        return view($file, [
            $value => $queryBuilder
        ]);
    }
}
