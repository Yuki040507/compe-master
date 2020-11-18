<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompeTeam extends Model
{
    ////
    protected $table = 'compe_teams';

    protected $primaryKey = "id";

    protected $fillable = [
        'compe_id', 'compe_member', 'compe_handicap','compe_team'
    ];
}
