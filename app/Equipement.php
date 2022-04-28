<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Panoscape\History\HasHistories;

class Equipement extends Model
{
    use HasHistories;

    public function getModelLabel()
    {
        return $this->display_name;
    } 
}
