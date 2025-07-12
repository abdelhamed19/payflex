<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    public $model;
    public $modelName;
    /**
     * Create a new component instance.
     */
    public function __construct($model, $modelName)
    {
        $this->model = $model;
        $this->modelName = $modelName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.table-component',[
            'model' => $this->model,
            'modelName' => $this->modelName,
        ]);
    }
}
