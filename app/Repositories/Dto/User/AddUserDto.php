<?php

declare(strict_types = 1);

namespace App\Repositories\Dto\User;

final class AddUserDto
{
    public function __construct(
        private string $first_name,
        private string $last_name,
        private string $phone,
        private string $email,
        private string $password,
    ) {
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'phone'      => $this->phone,
            'email'      => $this->email,
            'password'   => $this->password,
        ];
    }
}
