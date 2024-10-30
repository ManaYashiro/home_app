<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResidencyCertificateApplicantRequest;
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

    public function store(ResidencyCertificateApplicantRequest $request)
    {
        $validatedData = $request->validated();

        // 該当するユーザーが存在するか確認
        $applicant = ResidencyCertificateApplicant::where('username', $request->input('username'))->first();

        if (!$applicant) {
            //保存データ
            ResidencyCertificateApplicant::create($validatedData);
            $message = __('certificate_app_reg.message');
        } else {
            //更新データ
            $applicant->update($validatedData);
            $message = __('certificate_app_reg.upMessage');
        }
        return redirect('/certificate_app_registration')->with('success', $message);
    }

    public function destroy(Request $request)
    {
        // リクエストからcertificate_nameを取得
        $applicant = $request->input('certificate_name');
        // usernameが存在する場合は削除
        if ($applicant) {
            $certificate = ResidencyCertificateApplicant::where('username', $applicant)->first();

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
