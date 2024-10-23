<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            // 在留資格認定証明書交付申請書
            $table->string('residency_certificate_application');
            // 証明写真
            $table->string('proof_photo');
            // アプリケーションフォーム
            $table->string('application_form');
            // パスポート
            $table->string('passport');
            // 大学修了証
            $table->string('university_graduation_certificate');
            // 大学取得単位表
            $table->string('university_credits');
            // 過去の在学証明書
            $table->string('previous_enrollment_certificate');
            // 在留資格認定証明書
            $table->string('residency_certificate');
            // 実務者研修通知書
            $table->string('practical_training_notification');
            // 在留カード
            $table->string('residency_card');
            // 住民票
            $table->string('resident_certificate');
            // 国民健康保険証
            $table->string('national_health_insurance');
            // 年金手帳
            $table->string('pension_book');
            // 通帳
            $table->string('bank_book');
            // マイナンバーカード
            $table->string('my_number_card');
            // 履歴書
            $table->string('resume');
            // 運転免許証
            $table->string('license');
            // 各種資格証明書
            $table->string('qualification_certificate');
            // 研修修了証(RINXs)
            $table->string('training_completion_certificate_rinxs');
            // 研修修了証(Nexus)
            $table->string('training_completion_certificate_nexus');
            // 転出証明書
            $table->string('moving_out_certificate');
            // 国民健康保険脱退証明書
            $table->string('national_health_insurance_withdrawal_certificate');
            // 国民年金脱退証明書
            $table->string('national_pension_withdrawal_certificate');
            // 転入手続き
            $table->string('moving_in_procedure');
            // 新住所での国民健康保険証
            $table->string('new_address_national_health_insurance');
            // 新住所での国民年金手帳
            $table->string('new_address_national_pension_book');

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
        Schema::dropIfExists('applicants');
    }
}
