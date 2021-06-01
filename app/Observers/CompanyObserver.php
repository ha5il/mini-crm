<?php

namespace App\Observers;

use App\Mail\NewCompanyRegistered;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;

class CompanyObserver
{
    public function created(Company $company)
    {
        if ($company->email) {
            Mail::to($company->email)->send(new NewCompanyRegistered($company));
        }
    }
}
