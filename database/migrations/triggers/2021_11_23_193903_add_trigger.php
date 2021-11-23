<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER check_alert_level_incrementation
            BEFORE INSERT 
            ON region_alert_histories 
            FOR EACH ROW
            BEGIN
                IF (ABS((SELECT CAST(alert_level_id AS SIGNED) FROM region_alert_histories 
                WHERE CAST(region_id AS SIGNED) = CAST(NEW.region_id AS SIGNED) AND CAST(end_date AS SIGNED) IS NULL
                GROUP BY CAST(region_id AS SIGNED)) - CAST(NEW.alert_level_id AS SIGNED)) <> 1) THEN
                    SIGNAL SQLSTATE '45000' 
                        SET MESSAGE_TEXT = 'Alert level can only be modified by 1 level at a time';
                END IF;
            END
        ");

        DB::unprepared("
            CREATE TRIGGER set_default_alert_level
            AFTER INSERT
            ON regions
            FOR EACH ROW
            BEGIN
                INSERT INTO region_alert_histories(region_id, alert_level_id) VALUES (NEW.id, 1);
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER 'check_alert_level_incrementation'");
        DB::unprepared("DROP TRIGGER 'set_default_alert_level'");
    }
}
