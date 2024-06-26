<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contrubtions';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->id();
            $table->decimal('price')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('residents_id');
            $table->unsignedBigInteger('syndics_id');
            $table->timestamps();
            $table->index(["residents_id"], 'fk_contribution_residents1_idx');

            $table->index(["syndics_id"], 'fk_contribution_syndics1_idx');


            $table->foreign('residents_id', 'fk_contribution_residents1_idx')
                ->references('id')->on('residents')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('syndics_id', 'fk_contribution_syndics1_idx')
                ->references('id')->on('syndics')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};