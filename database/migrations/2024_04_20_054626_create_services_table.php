<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_request');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('motorcycle_name');
            $table->string('motorcycle_type');
            $table->string('service_types'); // Assuming this could be a JSON array.
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'service_finished', 'cancelled']);
            $table->unsignedBigInteger('store_id')->nullable();
            $table->timestamps();

            // If 'assigned_to' refers to a user, ensure the users table exists before running this migration
            $table->foreign('store_id')->references('id')->on('store_info');
            $table->foreign('customer_id')->references('id')->on('customer_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
