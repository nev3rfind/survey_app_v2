<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameEverysurveyInResponse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_responses', function (Blueprint $table) {
            $table->renameColumn('everysurvey_id', 'survey_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_responses', function (Blueprint $table) {
            $table->renameColumn('survey_id', 'everysurvey_id');
        });
    }
}
