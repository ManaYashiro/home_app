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
            $table->string('cohort_name')->nullable()->comment('期名称'); // 期名称
            $table->date('app_ceo_date')->comment('在留資格認定証明書交付申請日'); // 在留資格認定交付申請書
            $table->date('app_visa_date')->nullable()->comment('ビザ申請日'); // ビザ申請日
            $table->date('jpn_lang_study_start_date')->nullable()->comment('日本語学習開始日'); // 日本語学習開始日
            $table->date('jpn_lang_study_end_date')->nullable()->comment('日本語学習終了日'); // 日本語学習終了日
            $table->date('date_of_entry')->nullable()->comment('入国日'); // 入国日
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
