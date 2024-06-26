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
    public $tableName = 'servicing';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->id();
            $table->string('type', 45)->nullable();
            $table->string('name', 45)->nullable();
            $table->decimal('cost')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->enum('status', ['PENDING', 'STARTED', 'FINISHED'])->nullable();
            $table->unsignedBigInteger('residential_buildings_id');
            $table->timestamps();
            $table->index(["residential_buildings_id"], 'fk_servicing_residential_buildings1_idx');


            $table->foreign('residential_buildings_id', 'fk_servicing_residential_buildings1_idx')
                ->references('id')->on('residential_buildings')
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