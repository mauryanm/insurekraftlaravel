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
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned()->index()->nullable();
            $table->string('add_on_coverage_value')->nullable();
            $table->string('modal_code')->nullable();
            $table->string('make')->nullable();
            $table->string('modal_name')->nullable();
            $table->string('business_status')->nullable();
            $table->integer('engine_capacity_amount')->nullable();
            $table->integer('seating_capacity')->nullable();
            $table->string('vehicle_class')->nullable();
            $table->string('vehicle_weight')->nullable();
            $table->string('subline')->nullable();
            $table->string('body_style')->nullable();
            $table->string('fule_type')->nullable();
            $table->integer('min_seating_capacity')->nullable();
            $table->integer('max_seating_capacity')->nullable();
            $table->timestamp('effective_start_date')->nullable();
            $table->timestamp('effective_end_date')->nullable();
            $table->string('bike_scooter')->nullable();
            $table->string('make_final')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('sc_band')->nullable();
            $table->string('modal_name_type')->nullable();
            $table->string('variant_name')->nullable();
            $table->string('iib_tac_code')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_types');
    }
};
