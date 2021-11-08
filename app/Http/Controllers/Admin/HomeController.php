<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\BaseController;

/**
 * Class HomeController
 * @package App\Http\Controllers\Admin
 */
class HomeController extends BaseController
{
    /**
     * @return View
     */
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }
}
