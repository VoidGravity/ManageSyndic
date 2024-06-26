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
    public $tableName = 'residents';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('monthly_contrubtion')->nullable();
            $table->string('apartment_number', 45)->nullable();
            $table->unsignedBigInteger('residential_buildings_id');
            $table->timestamps();
            $table->index(["user_id"], 'fk_resident_user1_idx');

            $table->index(["residential_buildings_id"], 'fk_residents_residential_buildings1_idx');


            $table->foreign('user_id', 'fk_resident_user1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('residential_buildings_id', 'fk_residents_residential_buildings1_idx')
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