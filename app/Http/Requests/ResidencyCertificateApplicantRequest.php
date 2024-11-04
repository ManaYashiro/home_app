<?php

namespace App\Http\Requests;

use App\Models\ResidencyCertificateApplicant;
use Illuminate\Foundation\Http\FormRequest;

class ResidencyCertificateApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $applicant = null;
        if ($this->has('select_username_id')) {
            //select選択時
            $userId = $this->input('select_username_id');
            $applicant = ResidencyCertificateApplicant::where('id', $userId)->first();
            //residency_certificate_applicantsのIDとselectのvalueが取得したIDが一致したものが時
            if ($applicant) {
                //selectで選択されたユーザーの名前をそのまま返す
                $this->merge(
                    ['username' => $applicant->username]
                );
            }
        } else if ($this->has('username')) {
            //input入力時
            if (!$applicant = null) {
                $username = $this->input('username');
                $applicant = ResidencyCertificateApplicant::where('username', $username)->first();
            }
        }

        return [
            'cohort_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'username' => 'required|string|unique:residency_certificate_applicants,username,' . ($applicant ? $applicant->id : 'NULL'),
            'password' => 'required|string|min:8', // 例：パスワードは8文字以上
            'email' => 'required|email|unique:residency_certificate_applicants,email,' . ($applicant ? $applicant->id : 'NULL'),
            'country' => 'nullable|string',
            'language' => 'nullable|string',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
            'japanese_level' => 'nullable|string',
            'live_class_lesson' => 'nullable|string',
        ];
    }
}
