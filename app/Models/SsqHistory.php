<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SsqHistory extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'ssq_history';
    protected $fillable = [
        'open_code',
        'code',
        'expect',
        'name',
        'time',
    ];

}
