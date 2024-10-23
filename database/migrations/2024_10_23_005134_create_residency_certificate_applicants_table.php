<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidencyCertificateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residency_certificate_applicants', function (Blueprint $table) {
            $table->id();
            // 期名称
            $table->string('cohort_name'); // cohort_name
            // 名前
            $table->string('name'); // name
            // 名前カナ
            $table->string('name_kana'); // name_kana
            // ユーザー名
            $table->string('username')->unique(); // username
            // パスワード
            $table->string('password'); // password
            // メールアドレス
            $table->string('email')->unique(); // email
            // 国
            $table->string('country'); // country
            // 言語
            $table->string('language'); // language
            // 年齢
            $table->integer('age'); // age
            // 性別
            $table->enum('gender', ['male', 'female', 'other']); // gender
            // 日本語レベル
            $table->string('japanese_level'); // japanese_level
            // ライブクラスレッスン
            $table->boolean('live_class_lesson')->default(false); // live_class_lesson
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residency_certificate_applicants');
    }
}
