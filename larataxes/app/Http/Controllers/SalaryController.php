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
        return response()->json([
            'corrections' => $salary->corrections,
            'opv' => $salary->opv,
            'ipn' => $salary->ipn,
            'vosms' => $salary->vosms,
            'onHands' => $salary->salaryOnHands
        ]);
    }

    public function store(StoreSalaryRequest $request) {
        $salary = Salary::create($request->validated());
        return $salary;
    }
}
