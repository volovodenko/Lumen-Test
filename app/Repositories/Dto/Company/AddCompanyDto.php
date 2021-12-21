<?php

declare(strict_types = 1);

namespace App\Repositories\Dto\Company;

final class AddCompanyDto
{
    public function __construct(
        private string $title,
        private string $phone,
        private string $description,
    ) {
    }

    public function toArray(): array
    {
        return [
            'title'       => $this->title,
            'phone'       => $this->phone,
            'description' => $this->description,
        ];
    }
}
