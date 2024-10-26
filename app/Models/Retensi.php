<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retensi extends Model
{
    use HasFactory;

    public function rm(){
        return $this->belongsTo("App\Models\RekamMedis");
    }
}
