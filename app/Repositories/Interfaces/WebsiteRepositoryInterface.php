<?php

namespace App\Repositories\Interfaces;

use App\Models\Website;

interface WebsiteRepositoryInterface
{
    public function getAllWebsites();
    public function getWebsiteById($id);
    public function createWebsite(array $data);
    public function searchWebsite(int $category_id, int $rank);
    public function updateWebsite($id, array $data);
    public function deleteWebsite($id);
}
