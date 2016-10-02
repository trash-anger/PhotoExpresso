<?php

namespace App\Repositories;

use App\Adresse;

class AdresseRepository extends ResourceRepository{

    public function __construct(Adresse $adresse){
        $this->model = $adresse;
    }
}