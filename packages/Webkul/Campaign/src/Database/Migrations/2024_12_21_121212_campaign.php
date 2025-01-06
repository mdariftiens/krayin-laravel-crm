<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type',\Webkul\Campaign\Enums\CampaignType::toArray());//
            $table->string('description')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', \Webkul\Campaign\Enums\CampaignStatus::toArray());
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('package_id');
            $table->decimal('budget');
            $table->integer('total_message_to_be_sent')->default(0);
            $table->integer('total_message_sent')->default(0);
            $table->enum('purpose',\Webkul\Campaign\Enums\CampaignPurpose::toArray());
            $table->integer('priority')->default(5);
            $table->timestamps();
        });

        Schema::create('message_history', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->text('message')->nullable();
            $table->enum('status',['sent','well be sent','fail']);
            $table->string('fail_reason');
            $table->timestampsTz();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('view_permission');
        });
    }
};
