<?php

namespace App\View\Components\admin;

use App\Models\Sidebar;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBarLayoutComponent extends Component
{
    public $sidebar;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->sidebar = Sidebar::where('is_active', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        dd('here');
        return view('components.admin.side-bar-layout-component',[
            'sidebar' => $this->sidebar
        ]);
    }
}
