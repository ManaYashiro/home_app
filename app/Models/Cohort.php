<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'cohorts';

    // 複数代入可能なフィールドの定義
    protected $fillable = [
        'cohort_name',
        'app_ceo_date',
        'app_visa_date',
        'jpn_lang_study_start_date',
        'jpn_lang_study_end_date',
        'date_of_entry',
    ];
}
