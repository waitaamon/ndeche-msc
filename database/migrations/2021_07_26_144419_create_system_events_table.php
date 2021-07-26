<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement('CREATE TABLE `SystemEvents` (
              `ID` int(10) UNSIGNED NOT NULL,
              `CustomerID` bigint(20) DEFAULT NULL,
              `ReceivedAt` datetime DEFAULT NULL,
              `DeviceReportedTime` datetime DEFAULT NULL,
              `Facility` smallint(6) DEFAULT NULL,
              `Priority` smallint(6) DEFAULT NULL,
              `FromHost` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
              `Message` text COLLATE utf8_unicode_ci,
              `NTSeverity` int(11) DEFAULT NULL,
              `Importance` int(11) DEFAULT NULL,
              `EventSource` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
              `EventUser` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
              `EventCategory` int(11) DEFAULT NULL,
              `EventID` int(11) DEFAULT NULL,
              `EventBinaryData` text COLLATE utf8_unicode_ci,
              `MaxAvailable` int(11) DEFAULT NULL,
              `CurrUsage` int(11) DEFAULT NULL,
              `MinUsage` int(11) DEFAULT NULL,
              `MaxUsage` int(11) DEFAULT NULL,
              `InfoUnitID` int(11) DEFAULT NULL,
              `SysLogTag` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
              `EventLogType` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
              `GenericFileName` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
              `SystemID` int(11) DEFAULT NULL
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systemEvents');
    }
}
