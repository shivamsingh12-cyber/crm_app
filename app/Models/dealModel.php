<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\accountModel;
use App\Models\contactModel;

class dealModel extends Model
{
    use HasFactory;
    protected $table = "deals";
    protected $primarykey = "id";

    public function get_accountdetail()
    {
        return $this->hasOne(accountModel::class,'id','contact_id');
    }
}
