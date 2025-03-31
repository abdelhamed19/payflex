<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

function createSectionViews($sectionName)
{
    $folder = resource_path("views/admin/" . $sectionName);

    // إنشاء المجلد إذا لم يكن موجودًا
    if (!File::exists($folder)) {
        File::makeDirectory($folder, 0755, true);
    }

    // تحديد الملفات التي يجب إنشاؤها
    $templates = ['index', 'create', 'edit', 'show'];

    foreach ($templates as $template) {
        $templatePath = resource_path("views/templates/section/$template.blade.php");
        $destinationPath = "$folder/$template.blade.php";

        // نسخ القالب إلى المجلد الجديد بعد استبدال {{ section_name }}
        if (File::exists($templatePath)) {
            $content = str_replace('{{ section_name }}', strtolower($sectionName), File::get($templatePath));
            File::put($destinationPath, $content);
        }
    }
}
function createModelWithMigration($sectionName)
{
    $modelName = Str::studly(Str::singular($sectionName));
    if (class_exists($modelName)) {
        return; // إذا كان الموديل موجودًا بالفعل، لا تقم بإنشائه مرة أخرى
    }

    // إنشاء الموديل والـ migration
    Artisan::call("make:model {$modelName} -m");

    $modelPath = app_path("Models/{$modelName}.php");

    if (File::exists($modelPath)) {
        $modelContent = File::get($modelPath);

        // إضافة `protected $guarded = [];` بعد `class {ModelName}`
        $updatedContent = preg_replace(
            '/class ' . $modelName . ' extends Model\s*{/',
            "class {$modelName} extends BaseModel {\n    protected \$guarded = []; \n",
            $modelContent
        );

        File::put($modelPath, $updatedContent);
    }
}
function appendRoutes($sectionName)
{
    $routeFilePath = base_path('routes/web.php');
    $controllerName = Str::studly(Str::singular($sectionName)) . 'Controller';
    $controllerNamespace = "App\\Http\\Controllers\\Admin\\{$controllerName}";

    // قراءة محتوى ملف routes/web.php
    $routeFileContent = File::get($routeFilePath);

    // التأكد من أن `use` غير مكرر
    if (!str_contains($routeFileContent, "use {$controllerNamespace};")) {
        $routeFileContent = preg_replace('/<\?php\s*/', "<?php\n\nuse {$controllerNamespace};\n", $routeFileContent, 1);
    }

    // تحديد المسارات المطلوب إضافتها داخل المجموعة
    $routes = <<<EOD

    // Routes for {$sectionName}
    Route::get('{$sectionName}/index', [{$controllerName}::class, 'index'])->name('{$sectionName}.index');
    Route::get('{$sectionName}/create', [{$controllerName}::class, 'create'])->name('{$sectionName}.create');
    Route::post('{$sectionName}/store', [{$controllerName}::class, 'store'])->name('{$sectionName}.store');
    Route::get('{$sectionName}/{id}/edit', [{$controllerName}::class, 'edit'])->name('{$sectionName}.edit');
    Route::put('{$sectionName}/{id}', [{$controllerName}::class, 'update'])->name('{$sectionName}.update');
    Route::delete('{$sectionName}/{id}', [{$controllerName}::class, 'destroy'])->name('{$sectionName}.destroy');

EOD;

    // البحث عن موضع المجموعة
    $pattern = '/Route::middleware\(\'auth\'\)->group\(function\s*\(\)\s*\{/';
    if (preg_match($pattern, $routeFileContent, $matches, PREG_OFFSET_CAPTURE)) {
        // العثور على نهاية المجموعة
        $closingBracketPos = strrpos($routeFileContent, '});');

        if ($closingBracketPos !== false) {
            // إدراج المسارات قبل إغلاق المجموعة `});`
            $routeFileContent = substr_replace($routeFileContent, $routes, $closingBracketPos, 0);

            // حفظ الملف بعد التعديل
            File::put($routeFilePath, $routeFileContent);
        }
    }
}
function createRequestFiles($sectionName)
{
    $sectionName = Str::studly(Str::singular($sectionName));
    $requests = [
        'storeRequest' => "Create{$sectionName}Request",
        'updateRequest' => "Update{$sectionName}Request"
    ];
    foreach ($requests as $requestName) {
        $requestPath = app_path("Http/Requests/Admin/{$sectionName}/{$requestName}.php");

        // إنشاء الـ request إذا لم يكن موجودًا
        if (!file_exists($requestPath)) {
            Artisan::call("make:request Admin/{$sectionName}/{$requestName}");
        }
    }
}
function createController($sectionName)
{
    $modelName = Str::studly(Str::singular($sectionName));
    $modelPath = '\App\Models\\' . Str::studly(Str::singular($sectionName));
    $controllerName = Str::studly(Str::singular($sectionName)) . 'Controller';
    $controllerPath = app_path("Http/Controllers/Admin/{$controllerName}.php");

    // إنشاء الكنترولر إذا لم يكن موجودًا
    if (!file_exists($controllerPath)) {
        Artisan::call("make:controller Admin/{$controllerName}");
    }


    // التأكد من وجود الملف قبل التعديل عليه
    if (file_exists($controllerPath)) {
        $controllerTemplate = <<<PHP
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class {$controllerName} extends Controller
{
    public function index()
    {
        return view('admin.{$sectionName}.index', [
            'model' => {$modelPath}::paginate(10),
            'modelName' => '{$modelName}',
        ]);
    }

    public function create()
    {
        return view('admin.{$sectionName}.create');
    }

    public function store(Request \$request)
    {
        // تخزين البيانات
    }

    public function edit(\$id)
    {
        return view('admin.{$sectionName}.edit', compact('id'));
    }

    public function update(Request \$request, \$id)
    {
        // تحديث البيانات
    }

    public function destroy(\$id)
    {
        // حذف البيانات
    }
}
PHP;
        file_put_contents($controllerPath, $controllerTemplate);
    }
}
function createSeeder($sectionName)
{
    $seederName = Str::studly(Str::singular($sectionName)) . 'Seeder';
    $seederPath = database_path("seeders/{$seederName}.php");

    // إنشاء الـ seeder إذا لم يكن موجودًا
    if (!file_exists($seederPath)) {
        Artisan::call("make:seeder {$seederName}");
        Artisan::call("optimize");
    }
}
