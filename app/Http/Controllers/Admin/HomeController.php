<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers\Admin
 */
class HomeController extends BaseAdminController
{
    /**
     * @return View
     */
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }
}
