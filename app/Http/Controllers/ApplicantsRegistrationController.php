<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;
use App\Models\ResidencyCertificateApplicant;
use Illuminate\Support\Facades\Storage;

class ApplicantsRegistrationController extends Controller
{
    private $uploadsFolder = "";

    public function __construct()
    {
        $this->uploadsFolder = Applicants::UPLOAD_FOLDER;
    }

    public function index($id)
    {
        // IDに基づいてユーザーを取得
        $residentApplicant = ResidencyCertificateApplicant::leftJoin('applicants', 'residency_certificate_applicants.id', '=', 'applicants.user_id')
            ->where('residency_certificate_applicants.id', $id)
            ->first();
        // ユーザーが見つからない場合は404エラーを返す
        if (!$residentApplicant) {
            abort(404);
        }
        // ビューにデータを渡す
        return view('applicant_reg_page', [
            'id' => $id,
            'residentApplicant' => $residentApplicant,
            'upload' => $this->uploadsFolder . "/" . $residentApplicant->username,
        ]);
    }

    public function store(Request $request,  $id)
    {
        // バリデーション
        $request->validate([
            'residency_certificate_application' => 'nullable|file|mimes:pdf,jpg,png',
            'proof_photo' => 'nullable|file|mimes:pdf,jpg,png',
            'application_form' => 'nullable|file|mimes:pdf,jpg,png',
            'passport' => 'nullable|file|mimes:pdf,jpg,png',
            'university_graduation_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'university_credits' => 'nullable|file|mimes:pdf,jpg,png',
            'previous_enrollment_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'residency_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'practical_training_notification' => 'nullable|file|mimes:pdf,jpg,png',
            'residency_card' => 'nullable|file|mimes:pdf,jpg,png',
            'resident_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'national_health_insurance' => 'nullable|file|mimes:pdf,jpg,png',
            'pension_book' => 'nullable|file|mimes:pdf,jpg,png',
            'bank_book' => 'nullable|file|mimes:pdf,jpg,png',
            'my_number_card' => 'nullable|file|mimes:pdf,jpg,png',
            'resume' => 'nullable|file|mimes:pdf,jpg,png',
            'license' => 'nullable|file|mimes:pdf,jpg,png',
            'qualification_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'training_completion_certificate_rinxs' => 'nullable|file|mimes:pdf,jpg,png',
            'training_completion_certificate_nexus' => 'nullable|file|mimes:pdf,jpg,png',
            'moving_out_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'national_health_insurance_withdrawal_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'national_pension_withdrawal_certificate' => 'nullable|file|mimes:pdf,jpg,png',
            'moving_in_procedure' => 'nullable|file|mimes:pdf,jpg,png',
            'new_address_national_health_insurance' => 'nullable|file|mimes:pdf,jpg,png',
            'new_address_national_pension_book' => 'nullable|file|mimes:pdf,jpg,png',
        ]);

        $fileArray = [
            'residency_certificate_application',
            'proof_photo',
            'application_form',
            'passport',
            'university_graduation_certificate',
            'university_credits',
            'previous_enrollment_certificate',
            'residency_certificate',
            'practical_training_notification',
            'residency_card',
            'resident_certificate',
            'national_health_insurance',
            'pension_book',
            'bank_book',
            'my_number_card',
            'resume',
            'license',
            'qualification_certificate',
            'training_completion_certificate_rinxs',
            'training_completion_certificate_nexus',
            'moving_out_certificate',
            'national_health_insurance_withdrawal_certificate',
            'national_pension_withdrawal_certificate',
            'moving_in_procedure',
            'new_address_national_health_insurance',
            'new_address_national_pension_book',
        ];
        // IDでResidentを取得
        $residentApplicant = ResidencyCertificateApplicant::where('residency_certificate_applicants.id', $id)->first();
        // IDに基づいてユーザーを取得
        $applicant = Applicants::where('user_id', $id)->first();

        foreach ($fileArray as $key) {
            $path = $this->fileUpload($residentApplicant->username, $request, $key);
            if ($path) {
                $data[$key] = $path;
            }
        }

        $data['user_id'] = $id;

        if ($applicant) {
            $applicant->update($data);
        } else {
            Applicants::create($data);
        }
        // リダイレクト
        return redirect()->route('applicant.registration', $id)->with('success', '申請が完了しました');
    }

    public function fileUpload($username, $request, $key)
    {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $file_extension = $file->extension();
            $file_mime_type = $file->getClientMimeType();
            $original_file_name = $file->getClientOriginalName();
            return Storage::disk('public')->putFileAs($this->uploadsFolder . "/" . $username, $file, $original_file_name);
        }

        return null;
    }
}
