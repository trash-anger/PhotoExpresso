<?php

namespace App\Repositories;

use App\FraisPort;

class FraisPortRepository extends ResourceRepository{

    public function __construct(FraisPort $fraisPort){
        $this->model = $fraisPort;
    }
}