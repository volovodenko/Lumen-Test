<?php

declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Dto\Company\AddCompanyDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class CompanyRepository extends Repository
{
    public function getByUserId(int $userId): Collection
    {
        return $this->newModel()
            ->newQuery()
            ->whereHas(
                'users',
                fn (Builder $query) => $query->where('users.id', $userId)
            )->get();
    }

    public function add(AddCompanyDto $dto): Company
    {
        $company = $this->newModel();
        $company->fill($dto->toArray());
        $company->save();

        return $company;
    }

    public function newModel(): Company
    {
        return new Company();
    }
}
