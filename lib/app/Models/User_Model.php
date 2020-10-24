<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Model extends Model
{
    protected $table ="zalo_accounts";
    protected $primarykey = 'id';
    protected $guarded =[];
}
