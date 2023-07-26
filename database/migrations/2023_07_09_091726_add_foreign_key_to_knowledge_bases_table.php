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
        Schema::table('knowledge_bases', function (Blueprint $table) {
            $table->foreign('symptom_id', 'fk_knowledge_bases_to_symptoms')->references('id')->on('symptoms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('disease_id', 'fk_knowledge_bases_to_diseases')->references('id')->on('diseases')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knowledge_bases', function (Blueprint $table) {
            $table->dropForeign('fk_knowledge_bases_to_symptoms');
            $table->dropForeign('fk_knowledge_bases_to_diseases');
        });
    }
};
