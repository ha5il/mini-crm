<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use DataTables;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function dataTableFilter()
    {
        $company = Company::select(['id', 'name', 'email']);

        return DataTables::eloquent($company)->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
    }
}
