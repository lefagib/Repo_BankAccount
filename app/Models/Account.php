<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function client(){
        return $this->belongsto(Client::class);
       }

       public function accountType(){
        return $this->belongsto(AccountType::class);
       }
}
