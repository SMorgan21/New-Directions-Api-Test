<?php

namespace App\Policies;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicantPolicy
{
    use HandlesAuthorization;

    public function view(Company $company, Applicant $applicant): bool
    {
        return $company->id === $applicant->company_id;
    }
}
