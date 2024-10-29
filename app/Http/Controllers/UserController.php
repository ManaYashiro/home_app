<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;

class UserController extends Controller
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
}
