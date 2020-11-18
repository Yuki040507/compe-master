<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompeDetail extends Model
{
    ////
    protected $table = 'compe_details';

    protected $primaryKey = "compe_id";

    protected $fillable = [
        'group_id', 'compe_name', 'compe_date', 'compe_course', 'compe_comment',
    ];
}
