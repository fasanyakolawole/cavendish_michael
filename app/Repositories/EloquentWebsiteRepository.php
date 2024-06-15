<?php

namespace App\Repositories;

use App\Models\Website;
use App\Repositories\Interfaces\WebsiteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EloquentWebsiteRepository implements WebsiteRepositoryInterface
{
    public function getWebsites(Request $request): Collection
    {
        $query = Website::query();

        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        if ($request->has('rankings')) {
            $query->whereHas('rankings', function ($q) use ($request) {
                $q->where('rank', $request->rankings);
            });
        }

        if ($request->has('keyword')) {
            $query->where('url', 'like', '%' . $request->keyword . '%');
        }

        return $query->get();
    }

    public function create(array $data): void
    {
        Website::create($data);
    }

    public function delete(Website $website): void
    {
        $website->delete();
    }
}
