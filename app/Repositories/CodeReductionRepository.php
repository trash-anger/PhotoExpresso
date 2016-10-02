<?php

namespace App\Repositories;

use App\CodeReduction;

class CodeReductionRepository extends ResourceRepository{

    public function __construct(CodeReduction $codeReduction){
        $this->model = $codeReduction;
    }
}