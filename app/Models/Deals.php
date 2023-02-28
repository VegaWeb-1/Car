<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;
use Symfony\Component\Uid\Uuid;


class Deals extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['deals'];
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $guarded = [];
    protected $appends = ['text_name','user_name','type_name','Images'];
    protected $hidden=[
        'user',
        'image',
        'deals',
        'type',
        'type_id',
        'user_id'
    ];
    public function getTextNameAttribute()
    {
        return @$this->deals;
    }
    public function getUserNameAttribute()
    {
        return @$this->user->name;
    }
    public function type(){
        return $this->belongsTo(Type::class,'type_id');
    }
    public function getTypeNameAttribute()
    {
        return @$this->type->name;
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function getImagesAttribute()
    {
        return @$this->image->filename;
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function ($deal) {
            $deal->uuid = Str::uuid();
        });

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::deleted(function ($deal) {
            File::delete(public_path('uploads/'.$deal->image->filename));
            $deal->image()->delete();
        });
    }
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
