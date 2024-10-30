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
            'username' => 'nullable|required_without:username2|string|max:255', // username2がない場合のみ必須
            'username2' => 'nullable|required_without:username|string|max:255', // usernameがない場合のみ必須
            'password' => 'required|string|min:8', // 例：パスワードは8文字以上
            'email' => 'nullable|email|unique:residency_certificate_applicants,email',
            'country' => 'nullable|string',
            'language' => 'nullable|string',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'japanese_level' => 'nullable|string',
            'live_class_lesson' => 'nullable|string',
        ], [
            'password.min' => 'passwordは8文字以上でなければなりません',
            'username.required_without' => 'usernameは必須です',
            'username2.required_without' => 'usernameは必須です',
        ]);

        // username2が存在すればそれを使用し、なければusernameを使用する
        $usernameToCheck = $request->input('username2') ?: $request->input('username');
        // 該当するユーザーが存在するか確認
        $applicant = ResidencyCertificateApplicant::where('username', $usernameToCheck)->first();

        if ($applicant) {
            //更新データ
            $applicant->update($validatedData);
            $message = __('certificate_app_reg.upMessage');
        } else {
            //保存データ
            ResidencyCertificateApplicant::create($validatedData);
            $message = __('certificate_app_reg.message');
        }
        return redirect('/certificate_app_registration')->with('success', $message);
    }

    public function destroy(Request $request)
    {
        // リクエストからusernameを取得
        $applicant = $request->input('username');

        // usernameが存在する場合は削除
        if ($applicant) {
            $certificate = ResidencyCertificateApplicant::where('user_name', $applicant)->first();

            if ($certificate) {
                $certificate->delete();
                return redirect('/certificate_app_registration')->with('success', __('certificate_app_reg.delete_success'));
            } else {
                return redirect('/certificate_app_registration')->withErrors(['username' => __('certificate_app_reg.not_found')]);
            }
        }
        return redirect('/certificate_app_registration')->withErrors(['username' => __('certificate_app_reg.select_user')]);
    }
}
