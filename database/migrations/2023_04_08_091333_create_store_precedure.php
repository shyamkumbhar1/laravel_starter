<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        CREATE DEFINER=`root`@`localhost` PROCEDURE `All_user1`(
            IN `Param1` INT,
            IN `Param2` INT
        
        )
        LANGUAGE SQL
        DETERMINISTIC
        CONTAINS SQL
        SQL SECURITY DEFINER
        COMMENT 'Search all Users Data'
        BEGIN
        SELECT * FROM user1s WHERE user1s.id =Param1;
        SELECT * FROM phones where phones.id = Param2;
        END
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_precedure');
    }
};
