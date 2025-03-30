<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayoutComponent extends Component
{
    public $path;
    public $mode;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $locale = session()->get('lang','ar');
        if($locale == 'ar')
        {
            $this->path = 'light-rtl';
            $this->mode = 'rtl';
        }
        else
        {
            $this->path = 'light';
            $this->mode = '';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.admin-layout-component',[
            'locale' => $this->path,
            'mode' => $this->mode
        ]);
    }
}
