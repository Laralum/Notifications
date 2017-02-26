<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Laralum\Notifications\Models\Settings;

class CreateLaralumNotificationsSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laralum_notifications_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('mail_enabled');
            $table->timestamps();
        });

        Settings::create([
            'mail_enabled'  => false
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laralum_notifications_settings');
    }
}
