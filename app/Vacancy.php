<?php

namespace App;

class Vacancy extends Model
{
    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }
}
