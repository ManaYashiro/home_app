<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'applicants';

    // 複数代入可能なフィールドの定義
    protected $fillable = [
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
}
