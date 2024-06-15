<?php

namespace App\Repositories\Interfaces;

use App\Models\Website;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface WebsiteRepositoryInterface
{
    public function getWebsites(Request $request): array;
    public function create(array $data): void;
    public function delete(Website $website): void;
    public function getWebsitesGroupedByCategory(int $perPage = 100): LengthAwarePaginator;
}
