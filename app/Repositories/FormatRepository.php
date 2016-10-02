<?php

namespace App\Repositories;

use App\Format;

class FormatRepository extends ResourceRepository{

    public function __construct(Format $format){
        $this->model = $format;
    }
}