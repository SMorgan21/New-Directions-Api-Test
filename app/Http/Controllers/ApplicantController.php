<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicantController extends Controller
{
    public function index(Request $request)
    {
        $company = $request->user();

        $applicants = $company->applicants()
            ->when($request->county, function ($query, $county) {
                return $query->where('county', $county);
            })
            ->when($request->dbs_check, function ($query, $dbs_check) {
                return $query->where('dbs_check', $dbs_check);
            })
            ->when($request->position, function ($query, $position) {
                return $query->where('position', $position);
            })
            ->get();

        return response()->json($applicants);
    }

    public function show(Applicant $applicant)
    {
        $this->authorize('view', $applicant);
        return response()->json($applicant);
    }

    public function downloadCv(Applicant $applicant)
    {
        $this->authorize('view', $applicant);
        return Storage::download($applicant->cv_path);
    }
}
