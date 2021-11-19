<?php

use App\Models\Gas;
use App\Models\Brand;
use App\Models\Store;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->integer("price");
            $table->boolean("isAutomatic");
            $table->boolean("isAvailible");
            $table->string("img");
            $table->foreignIdFor(Gas::class);
            $table->foreignIdFor(Brand::class);
            $table->foreignIdFor(Store::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
