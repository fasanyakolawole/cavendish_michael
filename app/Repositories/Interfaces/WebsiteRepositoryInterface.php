<?php

namespace App\Repositories\Interfaces;

use App\Models\Website;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface WebsiteRepositoryInterface
{
    public function getWebsites(Request $request): Collection;

    public function create(array $data): void;

    public function delete(Website $website): void;
}
