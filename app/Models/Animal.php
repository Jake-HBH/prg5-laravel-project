<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory, SoftDeletes;

//mass assignable waardes
    protected $fillable = [
        'name',
        'description',
        'species_id',
        'age',
        'gender',
        'address',
        'image_url',
        'adoption_status',
        'published',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function species()
    {
        return $this->belongsTo(Species::class);
    }



}
