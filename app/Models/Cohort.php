<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    use HasFactory;

    // 複数代入可能なフィールドの定義
    protected $fillable = [
        'cohortName',
        'appCeoDate',
        'appVisaDate',
        'JpnLangStudyStartDate',
        'JpnLangStudyEndDate',
        'dateOfEntry',
    ];
}
