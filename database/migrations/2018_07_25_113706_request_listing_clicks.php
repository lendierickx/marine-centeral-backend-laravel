<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestListingClicks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_listing_clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('authid')->nullable();
            $table->integer('request_id');
            $table->string('ip_address',255);
            $table->timestamps();
        });
        DB::statement("CREATE OR REPLACE VIEW request_listing_clicks_view AS select COUNT(*) as totalclicks,request_id from request_listing_clicks GROUP BY request_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_listing_clicks');
    }
}
