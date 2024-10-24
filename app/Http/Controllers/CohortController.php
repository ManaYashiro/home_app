<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cohort; // Cohortモデルを使う場合

class CohortController extends Controller
{
    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'cohortName' => 'required|string|max:255',
            'appCeoDate' => 'required|date',
            'appVisaDate' => 'required|date',
            'JpnLangStudyStartDate' => 'required|date',
            'JpnLangStudyEndDate' => 'required|date',
            'dateOfEntry' => 'required|date',
        ]);

        // Cohort モデルが存在する場合はデータ保存
        Cohort::create($validatedData);

        // 成功メッセージ付きでリダイレクト
        return redirect()->route('cohorts.index')->with('success', '期登録が完了しました');
    }
}
