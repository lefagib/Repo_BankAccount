<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function account(){
        return $this->hasMany(Account::class);
       }
      
}
