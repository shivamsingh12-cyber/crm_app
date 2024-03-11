<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealModel extends Model
{
    use HasFactory;
    protected $table = "deals";
    protected $primarykey = "id";
}
