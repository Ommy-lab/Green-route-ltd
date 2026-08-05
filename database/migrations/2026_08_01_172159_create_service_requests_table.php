<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {

        $table->id();

        $table->string('request_number')->unique();

        $table->string('tracking_token')->unique();

        $table->string('customer_name');

        $table->string('phone');

        $table->string('email')->nullable();

        $table->enum('service_type', [
            'transport_own_cereals',
            'buy_with_transport',
            'buy_without_transport'
    ]);

        $table->string('cereal_type');

        $table->decimal('quantity',10,2);

        $table->string('unit');

        $table->string('pickup_location')->nullable();

        $table->string('delivery_location')->nullable();

        $table->date('preferred_date')->nullable();

        $table->text('message')->nullable();

        $table->enum('status',[
            'Pending Price',
            'Price Sent',
            'Accepted',
            'Rejected',
            'In Progress',
            'Completed'
        ])->default('Pending Price');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
