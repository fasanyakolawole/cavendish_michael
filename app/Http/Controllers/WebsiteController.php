<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Models\Website;
use App\Services\WebsiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    protected WebsiteService $websiteService;

    public function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    /**
     * Display a listing of the websites.
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

