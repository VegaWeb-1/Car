<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelCar extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'name',
    ];

}
