<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;

class CertificateAppRegistrationController extends Controller
{
    public function search(Request $request)
    {
        $username = $request->input('username');

        // データベースからレコードを取得
        $results = ResidencyCertificateApplicant::where('username', $username)
            ->first();

        // JSONとして結果を返す
        return response()->json($results);
    }

    public function cohortSelect(Request $request)
    {
        $cohort_name = $request->input('cohort_name');

        // データベースからレコードを取得
        $results = ResidencyCertificateApplicant::where('cohort_name', $cohort_name)
            ->get();

        // JSONとして結果を返す
        return response()->json($results);
    }

    public function userSelect(Request $request)
    {
        $username = $request->input('username');

        // データベースからレコードを取得
        $results = ResidencyCertificateApplicant::where('username', $username)
            ->first();

        // JSONとして結果を返す
        return response()->json($results);
    }
}
