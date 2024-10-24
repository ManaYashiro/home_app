<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;

class ApplicantsRegistrationController extends Controller
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
            'id' => $id,
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

    public function store(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'residency_certificate_application' => 'nullable|file|mimes:pdf,jpg,png',
            'proof_photo' => 'nullable|file|mimes:jpg,png',
            'application_form' => 'nullable|file|mimes:pdf',
            'passport' => 'nullable|file|mimes:pdf,jpg,png',
            'university_graduation_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'university_credits' => 'nullable|file|mimes:pdf,jpg,png',
            'previous_enrollment_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'residency_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'practical_training_notification' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        // 新しいレコードを作成
        $applicant = new Applicants();

        // アップロードされたファイルを保存
        if ($request->hasFile('residency_certificate_application')) {
            $applicant->residency_certificate_application = $request->file('residency_certificate_application')->store('documents');
        }
        if ($request->hasFile('proof_photo')) {
            $applicant->proof_photo = $request->file('proof_photo')->store('documents');
        }
        if ($request->hasFile('application_form')) {
            $applicant->application_form = $request->file('application_form')->store('documents');
        }
        if ($request->hasFile('passport')) {
            $applicant->passport = $request->file('passport')->store('documents');
        }
        if ($request->hasFile('university_graduation_certificate')) {
            $applicant->university_graduation_certificate = $request->file('university_graduation_certificate')->store('documents');
        }
        if ($request->hasFile('university_credits')) {
            $applicant->university_credits = $request->file('university_credits')->store('documents');
        }
        if ($request->hasFile('previous_enrollment_certificate')) {
            $applicant->previous_enrollment_certificate = $request->file('previous_enrollment_certificate')->store('documents');
        }

        if ($request->hasFile('residency_certificate')) {
            $applicant->residency_certificate = $request->file('residency_certificate')->store('documents');
        }
        if ($request->hasFile('practical_training_notification')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }

        if ($request->hasFile('residency_card')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('resident_certificate')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('national_health_insurance')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('pension_book')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('bank_book')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('my_number_card')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }

        if ($request->hasFile('resume')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('license')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('qualification_certificate')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('training_completion_certificate_rinxs')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('training_completion_certificate_nexus')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('moving_out_certificate')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('national_health_insurance_withdrawal_certificate')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('national_pension_withdrawal_certificate')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('moving_in_procedure')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('new_address_national_health_insurance')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }
        if ($request->hasFile('new_address_national_pension_book')) {
            $applicant->practical_training_notification = $request->file('practical_training_notification')->store('documents');
        }

        // データを保存
        $applicant->save();

        // リダイレクト
        return redirect()->route('applicant.registration', $id)->with('success', '申請が完了しました');
    }
}
