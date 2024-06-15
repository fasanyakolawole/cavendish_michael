<?php

namespace App\Services;

use App\Models\Website;
use App\Repositories\Interfaces\WebsiteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WebsiteService
{
    protected WebsiteRepositoryInterface $websiteRepository;

    public function __construct(WebsiteRepositoryInterface $websiteRepository)
    {
        $this->websiteRepository = $websiteRepository;
    }

    public function getWebsites(Request $request): Collection
    {
        return $this->websiteRepository->getWebsites($request);
    }

    public function createWebsite(array $data): void
    {
        $this->websiteRepository->create($data);
    }

    public function deleteWebsite(Website $website): void
    {
        $this->websiteRepository->delete($website);
    }
}
