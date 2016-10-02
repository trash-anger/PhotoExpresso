<?php

namespace App\Repositories;

use App\MessageAccomp;

class MessageAccompRepository extends ResourceRepository{

    public function __construct(MessageAccomp $messageAccomp){
        $this->model = $messageAccomp;
    }
}