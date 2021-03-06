<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'pregnancies',
        'glucose',
        'bloodpressure',
        'skinthickness',
        'insulin',
        'bmi',
        'diabetespedegreefunction',
        'age',
        'user_id',
        'diagnosis'
    ];
}
