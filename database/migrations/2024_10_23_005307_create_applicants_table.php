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

            $table->string('residency_certificate_application')->nullable()->comment('在留資格認定証明書交付申請書');
            $table->string('proof_photo')->nullable()->comment('証明写真');
            $table->string('application_form')->nullable()->comment('アプリケーションフォーム');
            $table->string('passport')->nullable()->comment('パスポート');
            $table->string('university_graduation_certificate')->nullable()->comment('大学修了証');
            $table->string('university_credits')->nullable()->comment('大学取得単位表');
            $table->string('previous_enrollment_certificate')->nullable()->comment('過去の在学証明書');
            $table->string('residency_certificate')->nullable()->comment('在留資格認定証明書');
            $table->string('practical_training_notification')->nullable()->comment('実務者研修通知書');
            $table->string('residency_card')->nullable()->comment('在留カード');
            $table->string('resident_certificate')->nullable()->comment('住民票');
            $table->string('national_health_insurance')->nullable()->comment('国民健康保険証');
            $table->string('pension_book')->nullable()->comment('年金手帳');
            $table->string('bank_book')->nullable()->comment('通帳');
            $table->string('my_number_card')->nullable()->comment('マイナンバーカード');
            $table->string('resume')->nullable()->comment('履歴書');
            $table->string('license')->nullable()->comment('運転免許証');
            $table->string('qualification_certificate')->nullable()->comment('各種資格証明書');
            $table->string('training_completion_certificate_rinxs')->nullable()->comment('研修修了証(RINXs)');
            $table->string('training_completion_certificate_nexus')->nullable()->comment('研修修了証(Nexus)');
            $table->string('moving_out_certificate')->nullable()->comment('転出証明書');
            $table->string('national_health_insurance_withdrawal_certificate')->nullable()->comment('国民健康保険脱退証明書');
            $table->string('national_pension_withdrawal_certificate')->nullable()->comment('国民年金脱退証明書');
            $table->string('moving_in_procedure')->nullable()->comment('転入手続き');
            $table->string('new_address_national_health_insurance')->nullable()->comment('新住所での国民健康保険証');
            $table->string('new_address_national_pension_book')->nullable()->comment('新住所での国民年金手帳');

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
