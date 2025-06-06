<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function survey()
    {
        return $this->belongsTo(Everysurvey::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
