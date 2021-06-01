<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'countCards' => [
                ['text' => trans('text.company'), 'count' => Company::count(), 'route' => route('company.index'), 'icon' => 'fas fa-building'],
                ['text' => trans('text.employee'), 'count' => Employee::count(), 'route' => route('employee.index'), 'icon' => 'fa fa-users'],
            ]
        ]);
    }
}
