<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id")->unsigned();
            $table->string("title");
            $table->string("description");
            $table->integer("points");
            $table->boolean("evaluable")->default(false)->comment("usar checkbox");
            $table->enum("type", ["individual", "grupal"])->default("individual")->comment("usar select");
            $table->enum("priority", ["baja", "normal", "alta"])->default("normal")->comment("usar radio buttons");
            $table->date("due_date");
            $table->timestamps();

            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeworks');
    }
}
