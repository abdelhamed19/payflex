<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

function createSectionViews($sectionName)
{
    $folder = resource_path("views/admin/" . $sectionName);

    if (!File::exists($folder)) {
        File::makeDirectory($folder, 0755, true);
    }

    $templates = ['index', 'create', 'edit', 'show'];

    foreach ($templates as $template) {
        $templatePath = resource_path("views/templates/section/$template.blade.php");
        $destinationPath = "$folder/$template.blade.php";

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
        return;
    }

    Artisan::call("make:model {$modelName} -m");

    $modelPath = app_path("Models/{$modelName}.php");

    if (File::exists($modelPath)) {
        $modelContent = File::get($modelPath);

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
    $routeDefinition = "Route::get('{$sectionName}/index', [{$controllerName}::class, 'index'])->name('{$sectionName}.index');";

    $routeFileContent = File::get($routeFilePath);

    // أضف use إذا مش موجود
    if (!str_contains($routeFileContent, "use {$controllerNamespace};")) {
        $routeFileContent = preg_replace('/<\?php\s*/', "<?php\n\nuse {$controllerNamespace};\n", $routeFileContent, 1);
    }

    // لو الراوت موجود خلاص اخرج
    if (str_contains($routeFileContent, $routeDefinition)) {
        return;
    }

    $routes = <<<EOD

    // Routes for {$sectionName}
    Route::get('{$sectionName}/index', [{$controllerName}::class, 'index'])->name('{$sectionName}.index');
    Route::get('{$sectionName}/create', [{$controllerName}::class, 'create'])->name('{$sectionName}.create');
    Route::post('{$sectionName}/store', [{$controllerName}::class, 'store'])->name('{$sectionName}.store');
    Route::get('{$sectionName}/{id}/edit', [{$controllerName}::class, 'edit'])->name('{$sectionName}.edit');
    Route::put('{$sectionName}/{id}', [{$controllerName}::class, 'update'])->name('{$sectionName}.update');
    Route::delete('{$sectionName}/{id}', [{$controllerName}::class, 'destroy'])->name('{$sectionName}.destroy');

EOD;

    // match جروب الادمن كامل
    $pattern = '/Route::prefix\([\'"]admin[\'"]\)->middleware\([^\)]*\)->group\(function\s*\(\)\s*\{(.*?)\n\}\);/s';

    if (preg_match($pattern, $routeFileContent, $matches)) {
        $originalGroup = $matches[0];
        $groupBody = $matches[1];

        // أضف الراوتات قبل قوس النهاية
        $newGroup = str_replace($groupBody, $groupBody . $routes, $originalGroup);
        $routeFileContent = str_replace($originalGroup, $newGroup, $routeFileContent);

        File::put($routeFilePath, $routeFileContent);
        Artisan::call('optimize');
    }
}

function createRequestFolderWithFiles($sectionName)
{
    $folderName = Str::studly(Str::singular($sectionName));
    $folderPath = app_path("Http/Requests/Admin/{$folderName}");

    if (!File::exists($folderPath)) {
        File::makeDirectory($folderPath, 0755, true);
    }

    $requests = [
        "Create{$folderName}Request",
        "Update{$folderName}Request",
    ];

    foreach ($requests as $request) {
        $filePath = "{$folderPath}/{$request}.php";
        if (!file_exists($filePath)) {
            Artisan::call("make:request Admin/{$folderName}/{$request}");
        }
    }
}

function createController($sectionName)
{
    $modelName = Str::studly(Str::singular($sectionName));
    $modelPath = "App\\Models\\{$modelName}";
    $controllerName = "{$modelName}Controller";
    $controllerPath = app_path("Http/Controllers/Admin/{$controllerName}.php");

    if (!file_exists($controllerPath)) {
        Artisan::call("make:controller Admin/{$controllerName}");
    }

    if (file_exists($controllerPath)) {
        $requestNamespace = "App\\Http\\Requests\\Admin\\{$modelName}";
        $createRequest = "Create{$modelName}Request";
        $updateRequest = "Update{$modelName}Request";

        $controllerTemplate = <<<PHP
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use {$modelPath};
use {$requestNamespace}\\{$createRequest};
use {$requestNamespace}\\{$updateRequest};

class {$controllerName} extends Controller
{
    public function index()
    {
        return view('admin.{$sectionName}.index', [
            'model' => {$modelName}::paginate(10),
            'modelName' => '{$modelName}',
        ]);
    }

    public function create()
    {
        return view('admin.{$sectionName}.create');
    }

    public function store({$createRequest} \$request)
    {
        // تخزين البيانات
    }

    public function edit(\$id)
    {
        return view('admin.{$sectionName}.edit', compact('id'));
    }

    public function update({$updateRequest} \$request, \$id)
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

    if (!file_exists($seederPath)) {
        Artisan::call("make:seeder {$seederName}");
    }
}
