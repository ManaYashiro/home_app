<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;

class ResidencyCertificateAppController extends Controller
{
    public function index()
    {
        // コホートのデータを取得
        $cohorts = Cohort::all();
        // ビューにコホートデータを渡す
        return view('certificate_app_reg', compact('cohorts'));
    }

    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'cohort_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8', // 例：パスワードは8文字以上
            'email' => 'nullable|email|unique:residency_certificate_applicants,email',
            'country' => 'nullable|string',
            'language' => 'nullable|string',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'japanese_level' => 'nullable|string',
            'live_class_lesson' => 'nullable|string',
        ], [
            'password.min' => 'passwordは8文字以上でなければなりません。',
        ]);

        // データ保存
        ResidencyCertificateApplicant::create($validatedData);

        // 成功メッセージ付きでリダイレクト
        return redirect('/certificate_app_registration')->with('success', '在留資格認定書交付申請者登録が完了しました');
    }
}
