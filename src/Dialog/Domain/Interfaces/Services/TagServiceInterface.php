<?php

namespace App\Dialog\Domain\Interfaces\Services;

use App\Dialog\Domain\Entities\TagEntity;
use Illuminate\Support\Collection;
use ZnCore\Domain\Interfaces\Service\CrudServiceInterface;
use ZnCore\Domain\Libs\Query;

interface TagServiceInterface extends CrudServiceInterface
{

    public function allByWorlds(array $words, Query $query = null): Collection;
    public function oneByWordOrCreate(string $word): TagEntity;
}
