<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = "transaction";
    protected $fillable = ["Name","Email","Phone", "Checkin","tipe", "Checkout","Required","UID","transfer_pic","status", "total","Members"];
    public $timestamps = false;
}
