<?php

namespace App\Repositories\Contracts;

use App\Models\Dream;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface DreamRepositoryInterface
{
    public function getForUser(int $userId, array $filters = []): Collection;
    public function getPaginatedForUser(int $userId, int $perPage = 15): LengthAwarePaginator;
    public function findForUser(int $id, int $userId): ?Dream;
    public function create(array $data): Dream;
    public function update(Dream $dream, array $data): Dream;
    public function delete(Dream $dream): bool;
}
