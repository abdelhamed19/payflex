<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

function createSectionViews($sectionName)
{
    $folder = resource_path("views/admin/" . strtolower($sectionName));

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

    // إنشاء الموديل والـ migration
    Artisan::call("make:model {$modelName} -m");

    $modelPath = app_path("Models/{$modelName}.php");

    if (File::exists($modelPath)) {
        $modelContent = File::get($modelPath);

        // إضافة `protected $guarded = [];` بعد `class {ModelName}`
        $updatedContent = preg_replace(
            '/class ' . $modelName . ' extends Model\s*{/',
            "class {$modelName} extends BaseModel {\n    protected \$guarded = [];",
            $modelContent
        );

        File::put($modelPath, $updatedContent);
    }
}
function appendRoutes($sectionName)
{
    $routeFilePath = base_path('routes/web.php');
    $controllerName = Str::studly(Str::singular($sectionName)) . 'Controller';
    $routeName = strtolower($sectionName);
    $controllerNamespace = "App\\Http\\Controllers\\Admin\\{$controllerName}";

    // التأكد من أن `use` غير مكرر
    $routeFileContent = File::get($routeFilePath);
    if (!str_contains($routeFileContent, "use {$controllerNamespace};")) {
        $routeFileContent = "<?php\n\nuse {$controllerNamespace};\n" . substr($routeFileContent, 5);
    }

    // تحديد المسارات
    $routes = <<<EOD

// Routes for {$sectionName}
Route::get('{$routeName}/index', [{$controllerName}::class, 'index'])->name('{$routeName}.index');
Route::get('{$routeName}/create', [{$controllerName}::class, 'create'])->name('{$routeName}.create');
Route::post('{$routeName}/store', [{$controllerName}::class, 'store'])->name('{$routeName}.store');
Route::get('{$routeName}/{id}/edit', [{$controllerName}::class, 'edit'])->name('{$routeName}.edit');
Route::put('{$routeName}/{id}', [{$controllerName}::class, 'update'])->name('{$routeName}.update');
Route::delete('{$routeName}/{id}', [{$controllerName}::class, 'destroy'])->name('{$routeName}.destroy');

EOD;

    // إضافة المسارات إلى `web.php`
    File::put($routeFilePath, $routeFileContent . $routes);
}
function createController($sectionName)
{
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
        return view('admin.{$sectionName}.index');
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
