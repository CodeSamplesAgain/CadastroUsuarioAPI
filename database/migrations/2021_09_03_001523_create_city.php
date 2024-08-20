<?php

use App\Models\Estado;
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
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {

            $table->id();
            $table->integer('city_id')->unsigned();
            $table->foreignId('state_id')->constrained('states');
            $table->string('name', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {

            $table->dropForeign(['state_id']);
        });
        Schema::dropIfExists('cities');
    }
};
