<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Dto\User\AddUserDto;

final class UserRepository extends Repository
{
    public function add(AddUserDto $dto): User
    {
        $user = $this->newModel();
        $user->fill($dto->toArray());
        $user->save();

        return $user;
    }

    public function newModel(): User
    {
        return new User();
    }
}
