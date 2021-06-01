<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return view('company.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        if ($request->file('logo')) {
            $logo_path = $this->storeCompanyLogo($request->logo);
        }

        $company = Company::create(array_merge($request->validated(), [
            'logo_path' => $logo_path ?? null,
        ]));

        return redirect()->route('company.show', $company->id);
    }

    private function storeCompanyLogo($requestLogo)
    {
        return $requestLogo->storeAs(
            'images',
            sprintf('company/%s.%s',
                Str::random(8),
                $requestLogo->extension()
            )
        );
    }

    public function show($id)
    {
        return view('company.show', [
            'company' => Company::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('company.edit', [
            'company' => Company::findOrFail($id),
        ]);
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        if ($request->file('logo')) {
            $logo_path = $this->storeCompanyLogo($request->logo);
            Storage::delete($company->logo_path);
        }

        $company->update(array_merge($request->validated(), [
            'logo_path' => isset($logo_path) ? $logo_path : $company->logo_path,
        ]));

        return redirect()->route('company.show', $company->id);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
    }
}
