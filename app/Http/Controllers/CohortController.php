<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cohort;

class CohortController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'cohort_name' => 'required|string|max:255',
            'app_ceo_date' => 'required|date',
            'app_visa_date' => 'nullable|date',
            'jpn_lang_study_start_date' => 'nullable|date',
            'jpn_lang_study_end_date' => 'nullable|date',
            'date_of_entry' => 'nullable|date',
        ]);

        // データ保存
        Cohort::create($validatedData);

        // 成功メッセージ付きでリダイレクト
        return redirect('/cohort_registration')->with('success', '期登録が完了しました');
    }
}
