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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chat_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->longText('message')->nullable();
            $table->longText('response')->nullable();
            $table->timestamps();

            $table->foreign('chat_id')
                ->references('id')
                ->on('chats')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
