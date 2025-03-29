<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;

class ApplicantsController extends Controller
{
    public function index(Request $request)
    {
        // コホート名をリクエストから取得
        $cohortName = $request->input('cohort_name');

        // コホート名に基づいてユーザーをフィルタリング
        $users = ResidencyCertificateApplicant::when($cohortName, function ($query) use ($cohortName) {
            return $query->where('cohort_name', $cohortName); // cohort_nameは適切なカラム名に置き換えてください
        })->get();

        // すべてのコホートを取得
        $cohorts = Cohort::all();

        // ビューにデータを渡す
        return view('applicant_page', compact('users', 'cohorts'));
    }

    public function store(Request $request) {}
}
