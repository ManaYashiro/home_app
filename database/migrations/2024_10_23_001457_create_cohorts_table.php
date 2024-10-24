<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cohorts', function (Blueprint $table) {
            $table->id();
            $table->string('cohort_name')
                ->comment('期名称'); // Cohort Name
            $table->date('app_ceo_date')
                ->comment('在留資格認定証明書交付申請日'); // Residency Certificate Application Date
            $table->date('app_visa_date')
                ->comment('ビザ申請日'); // Visa Application Date
            $table->date('jpn_lang_study_start_date')
                ->comment('日本語学習開始日'); // Japanese Language Study Start Date
            $table->date('jpn_lang_study_end_date')
                ->comment('日本語学習終了日'); // Japanese Language Study End Date
            $table->date('date_of_entry')
                ->comment('入国日'); // Date of Entry
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohorts');
    }
};
