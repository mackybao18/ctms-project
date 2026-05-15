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

        $table->string('drivers_id');
        $table->string('firstname');
        $table->string('middlename')->nullable();
        $table->string('lastname');

        $table->string('height')->nullable();
        $table->string('weight')->nullable();

        $table->string('civil_status');
        $table->string('religion');

        $table->string('provincial_address');
        $table->string('residence_address');

        $table->string('drivers_license_number');
        $table->date('dl_expiration')->nullable();

        $table->string('emergency_person');
        $table->string('emergency_contact');

        $table->string('contact_number');

        $table->string('photo')->nullable();

        $table->string('last_renewal')->nullable();

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
