<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    use HasFactory;

    protected $table = "room_type";
    protected $fillable = ["name","price","details", "short_desc", "perks","image"];
    public $timestamps = false;
}
