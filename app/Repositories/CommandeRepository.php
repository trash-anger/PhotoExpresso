<?php

namespace App\Repositories;

use App\Commande;

class CommandeRepository extends ResourceRepository{

    public function __construct(Commande $commande){
        $this->model = $commande;
    }
}