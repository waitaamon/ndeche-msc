<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemEvent extends Model
{
    use HasFactory;

    protected $table = 'SystemEvents';

    protected $primaryKey = 'identifier';

    protected $fillable = ['CustomerID', 'FromHost', 'Message', 'NTSeverity', 'Importance', 'ReceivedAt', 'DeviceReportedTime', 'SysLogTag'];

    protected $dates = ['ReceivedAt', 'DeviceReportedTime'];

}
