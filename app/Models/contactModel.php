<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\accountModel;

class contactModel extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $primarykey = "id";

    public function getAccountDetail()
    {
        return $this->hasOne(accountModel::class,'id','account_id');
    }
}
