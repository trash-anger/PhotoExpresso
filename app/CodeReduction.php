<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeReduction extends Model
{
    protected $fillable = ['code','montant'];

    protected $table ='codereduction';


}
