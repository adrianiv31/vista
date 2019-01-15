<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'category_id','specie','name', 'descriere', 'insamantare', 'cod_produs', 'producer_id', 'categorie_bio', 'um',

    ];

    public function docs(){

        return  $this->hasMany('App\ProductDocuments');

    }

    public function producer(){

        return $this->belongsTo('App\Producer');

    }
}
