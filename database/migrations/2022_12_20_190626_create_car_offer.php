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
        Schema::create('car_offer', function (Blueprint $table) {
            $table->id();
            //offer status
            $table->enum("status",['active','inactive'])->default('inactive');
            //offer type
            $table->enum("type",['standard','extended'])->default('standard');
            // car price
            $table->float("price");
            // car manufacturer
            $table->string("manufacturer");
            // car model
            $table->string("model");
            // car model version
            $table->string("version");
            // offer author data
            $table->json('author');
            // offer details
            $table->json('details');
            // car equipment
            $table->json('equipment');
            // localization
            $table->json('localization');
            // repairs only for extended offer
            $table->json('repairs')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_offer');
    }
};
