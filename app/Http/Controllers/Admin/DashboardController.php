<?php


namespace App\Http\Controllers\Admin;


class DashboardController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        return view('admin.dashboard.index');
    }
}
