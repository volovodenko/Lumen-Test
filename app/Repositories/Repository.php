<?php

declare(strict_types = 1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    abstract public function newModel(): Model;
}
