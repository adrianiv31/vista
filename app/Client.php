<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'name', 'cui', 'reg_com', 'address', 'client_code', 'tip_client', 'haapia', 'contact_name', 'contact_position', 'contact_tel', 'contact_email', 'user_id', 'limita_de_credit',

    ];


    public function user()
    {

        return $this->belongsTo('App\User');

    }

    public function docs()
    {

        return $this->hasMany('App\ClientDocuments');

    }
}