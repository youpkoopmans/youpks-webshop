<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItem extends Component
{
    /**
     * The model.
     *
     * @var string
     */
    public $model;

    /**
     * Create a new component instance.
     *
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('b::components.sidebar-item');
    }
}
