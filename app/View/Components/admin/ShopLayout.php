<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ShopLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.admin.shop');
    }
}
