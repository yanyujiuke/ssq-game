<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BicolorSphere extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    protected $table = 'bicolor_sphere';

    protected $fillable = [
        'date',
        'num',
        'red1',
        'red2',
        'red3',
        'red4',
        'red5',
        'red6',
        'blue',
        'lottery_number',
    ];

}
