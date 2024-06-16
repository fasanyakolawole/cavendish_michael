<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Models\Website;
use App\Services\WebsiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/*
 * Todo: All controller should return individual DTO so it returns only data is needed in the frontend, but time does not permit me.
 * Todo: All needed instances of exceptions should be handled separately
 *
 * The only requirement left to complete is:
 * As an authenticated user I would like to vote/unvote my favourite websites.
 * Categories will then show them in order of how many votes
 * they have so that the most relevant content is always at the top as time do not permit me,
 * its basically a crud functionality.I create the migration, factory etc already
 */
class WebsiteController extends Controller
{
    protected WebsiteService $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    /**
     * Display a listing of the websites. Filter by category, ranking or url.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $websites = $this->websiteService->getWebsites($request);

        return response()->json($websites);
    }

    /**
     * Store a newly created website in storage.
     *
     * @param StoreWebsiteRequest $request
     * @return JsonResponse
     */
    public function store(StoreWebsiteRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        $this->websiteService->createWebsite($validatedData);

        return response()->json('Website created!');
    }

    /**
     * Remove the specified website from storage.
     *
     * @param Website $website
     * @return JsonResponse
     */
    public function delete(Website $website): JsonResponse
    {
        $this->websiteService->deleteWebsite($website);

        return response()->json('Website deleted!');
    }
}

