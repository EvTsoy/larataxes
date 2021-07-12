<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalaryRequest;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::all()->sortByDesc('id');
        return view('salaries', compact('salaries'));
    }

    public function calc()
    {
        return view('calc');
    }

    public function show(StoreSalaryRequest $request)
    {
        $salary = Salary::make($request->validated());
        return view('show', compact('salary'));
    }
}
