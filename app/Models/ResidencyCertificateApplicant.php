<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidencyCertificateApplicant extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'residency_certificate_applicants';

    // 複数代入可能なフィールドの定義
    protected $fillable = [
        'cohort_name',
        'name',
        'name_kana',
        'username',
        'password',
        'email',
        'country',
        'language',
        'age',
        'gender',
        'japanese_level',
        'live_class_lesson',
    ];
}
