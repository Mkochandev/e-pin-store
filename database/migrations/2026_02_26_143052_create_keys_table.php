<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
           $table->foreignId('game_id')->constrained();
           $table->foreignId('platform_id')->constrained();
           $table->decimal('price', 8, 2);
           $table->string('key_code')->unique();
           $table->boolean('is_sold')->default(false);
           $table->timestamp('sold_at')->nullable();
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
        Schema::dropIfExists('keys');
    }
}
