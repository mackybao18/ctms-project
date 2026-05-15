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
    Schema::create('drivers', function (Blueprint $table) {
        $table->id();

        $table->string('driver_id');
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');

        $table->string('height')->nullable();
        $table->string('weight')->nullable();

        $table->string('civil_status');
        $table->string('religion');

        $table->string('residence_address');
        $table->string('provincial_address');

        $table->string('toda');

        $table->string('contact_number');

        $table->string('license_number');
        $table->date('expiration_date')->nullable();

        $table->string('emergency_person');
        $table->string('emergency_contact');

        $table->string('profile')->nullable();

        $table->string('status')->default('Active');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
