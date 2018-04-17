<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoredProcContactMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('DROP PROCEDURE IF EXISTS getAllMsg');
        DB::unprepared('DROP PROCEDURE IF EXISTS getMsgById');

        DB::unprepared('CREATE PROCEDURE getAllMsg()  
                BEGIN  
                    SELECT * FROM contact_messages; 
                END');

        DB::unprepared('CREATE PROCEDURE getMsgById(IN contactId INT(10))
                BEGIN  
                    SELECT * FROM contact_messages WHERE id = contactId; 
                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //DB::unprepared('DROP PROCEDURE IF EXISTS getMsgById');
    }
}
