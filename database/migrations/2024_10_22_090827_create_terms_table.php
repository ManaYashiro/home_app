<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id(); // IDカラム
            $table->string('term_name')->comment('期名称'); // 期名称
            $table->string('residency_certificate')->comment('在留資格認定交付申請書'); // 在留資格認定交付申請書
            $table->date('visa_application_date')->comment('ビザ申請日'); // ビザ申請日
            $table->date('japanese_study_start_date')->comment('日本語学習開始日'); // 日本語学習開始日
            $table->date('japanese_study_end_date')->comment('日本語学習終了日'); // 日本語学習終了日
            $table->date('entry_date')->comment('入国日'); // 入国日
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
