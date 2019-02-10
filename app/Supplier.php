<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'name', 'cui', 'reg_com', 'address', 'supplier_code', 'contact_name', 'contact_position', 'contact_tel', 'contact_email', 'due_date',

    ];

    public function docs()
    {

        return $this->hasMany('App\SupplierDocuments');

    }
}