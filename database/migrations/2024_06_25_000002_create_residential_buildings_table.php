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
    public $tableName = 'residential_buildings';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->id();
            $table->string('name', 45)->nullable();
            $table->unsignedBigInteger('number')->nullable();
            $table->string('address', 250)->nullable();
            $table->unsignedBigInteger('syndic_id');

            $table->index(["syndic_id"], 'fk_residential_building_syndic1_idx');


            $table->foreign('syndic_id', 'fk_residential_building_syndic1_idx')
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