<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDocuments extends Model
{
    //
    protected $fillable = [
        'doc_id', 'client_id','token'

    ];
}
