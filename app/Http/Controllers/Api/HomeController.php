<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $employees = Employee::count();

        return response()->json([
            'employees' => $employees
        ]);
    }
}