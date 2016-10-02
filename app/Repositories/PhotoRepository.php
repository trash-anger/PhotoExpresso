<?php

namespace App\Repositories;

use App\Photo;

class PhotoRepository extends ResourceRepository{
    public function __construct(Photo $photo){
        $this->model = $photo;
    }
}