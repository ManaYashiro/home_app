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

            $table->string('residency_certificate_application')
                ->comment('在留資格認定証明書交付申請書'); // Residency Certificate Application

            $table->string('proof_photo')
                ->comment('証明写真'); // Proof Photo

            $table->string('application_form')
                ->comment('アプリケーションフォーム'); // Application Form

            $table->string('passport')
                ->comment('パスポート'); // Passport

            $table->string('university_graduation_certificate')
                ->comment('大学修了証'); // University Graduation Certificate

            $table->string('university_credits')
                ->comment('大学取得単位表'); // University Credits

            $table->string('previous_enrollment_certificate')
                ->comment('過去の在学証明書'); // Previous Enrollment Certificate

            $table->string('residency_certificate')
                ->comment('在留資格認定証明書'); // Residency Certificate

            $table->string('practical_training_notification')
                ->comment('実務者研修通知書'); // Practical Training Notification

            $table->string('residency_card')
                ->comment('在留カード'); // Residency Card

            $table->string('resident_certificate')
                ->comment('住民票'); // Resident Certificate

            $table->string('national_health_insurance')
                ->comment('国民健康保険証'); // National Health Insurance

            $table->string('pension_book')
                ->comment('年金手帳'); // Pension Book

            $table->string('bank_book')
                ->comment('通帳'); // Bank Book

            $table->string('my_number_card')
                ->comment('マイナンバーカード'); // My Number Card

            $table->string('resume')
                ->comment('履歴書'); // Resume

            $table->string('license')
                ->comment('運転免許証'); // License

            $table->string('qualification_certificate')
                ->comment('各種資格証明書'); // Qualification Certificate

            $table->string('training_completion_certificate_rinxs')
                ->comment('研修修了証(RINXs)'); // Training Completion Certificate (RINXs)

            $table->string('training_completion_certificate_nexus')
                ->comment('研修修了証(Nexus)'); // Training Completion Certificate (Nexus)

            $table->string('moving_out_certificate')
                ->comment('転出証明書'); // Moving Out Certificate

            $table->string('national_health_insurance_withdrawal_certificate')
                ->comment('国民健康保険脱退証明書'); // National Health Insurance Withdrawal Certificate

            $table->string('national_pension_withdrawal_certificate')
                ->comment('国民年金脱退証明書'); // National Pension Withdrawal Certificate

            $table->string('moving_in_procedure')
                ->comment('転入手続き'); // Moving In Procedure

            $table->string('new_address_national_health_insurance')
                ->comment('新住所での国民健康保険証'); // New Address National Health Insurance

            $table->string('new_address_national_pension_book')
                ->comment('新住所での国民年金手帳'); // New Address National Pension Book

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
