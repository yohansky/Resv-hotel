<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;

    protected $table = "room";
    protected $fillable = ["no_kamar", "tipe", "status", "image"];

    public function Roomtype(){
        return $this->belongsTo(TypeModel::class, "tipe", "ID");
    }
}
