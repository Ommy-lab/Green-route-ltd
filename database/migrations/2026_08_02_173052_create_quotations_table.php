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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_request_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->decimal('cereal_cost', 12, 2)->default(0);
        $table->decimal('transport_cost', 12, 2)->default(0);
        $table->decimal('loading_cost', 12, 2)->default(0);
        $table->decimal('other_cost', 12, 2)->default(0);
        $table->decimal('discount', 12, 2)->default(0);
        $table->decimal('total_price', 12, 2);

        $table->string('estimated_delivery')->nullable();
        $table->text('notes')->nullable();
        $table->date('valid_until')->nullable();

        $table->enum('customer_decision', [
            'Pending',
            'Accepted',
            'Rejected',
        ])->default('Pending');

        $table->text('rejection_reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
