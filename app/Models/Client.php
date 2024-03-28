<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
   /* protected $fillable =[
        'CNI' ,
         'Nom' ,
          'prenom' ,
           'adresse' ,
            'date_naissance',

    ];*/
    //it's The same than fillable
   protected $guarded =[];

   public function accounts(){
    return $this->hasMany(Account::class);
   }


}
