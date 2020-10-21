<?php

namespace App\Services;

use App\Models\Estilo;
use Illuminate\Support\Facades\DB;

class EstiloService
{
    public function __construct(Estilo $model)
    {
        $this->model = $model;
    }
}
