<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;

class ApplicantsRegstrationController extends Controller
{
    public function index($id)
    {
        // IDに基づいてユーザーを取得
        $user = ResidencyCertificateApplicant::find($id);

        // ユーザーが見つからない場合は404エラーを返す
        if (!$user) {
            abort(404);
        }

        // ビューにデータを渡す
        return view('applicant_reg_page', [
            'userId' => $user->id,
            'name' => $user->name,
            'name_kana' => $user->name_kana,
            'username' => $user->username,
            'password' => $user->password,
            'email' => $user->email,
            'country' => $user->country,
            'language' => $user->language,
            'age' => $user->age,
            'gender' => $user->gender,
            'japanese_level' => $user->japanese_level,
            'live_class_lesson' => $user->live_class_lesson,
        ]);
    }

    public function store(Request $request) {}
}
