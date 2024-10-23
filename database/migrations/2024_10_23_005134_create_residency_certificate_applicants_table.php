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

            $table->string('cohort_name')
                ->comment('期名称'); // Cohort Name

            $table->string('name')
                ->comment('名前'); // Name

            $table->string('name_kana')
                ->comment('名前カナ'); // Name Kana

            $table->string('username')->unique()
                ->comment('ユーザー名'); // Username

            $table->string('password')
                ->comment('パスワード'); // Password

            $table->string('email')->unique()
                ->comment('メールアドレス'); // Email

            $table->string('country')
                ->comment('国'); // Country

            $table->string('language')
                ->comment('言語'); // Language

            $table->integer('age')
                ->comment('年齢'); // Age

            $table->enum('gender', ['male', 'female', 'other'])
                ->comment('性別'); // Gender

            $table->string('japanese_level')
                ->comment('日本語レベル'); // Japanese Level

            $table->boolean('live_class_lesson')->default(false)
                ->comment('ライブクラスレッスン'); // Live Class Lesson

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
