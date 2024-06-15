<?php

namespace Tests\Unit\Services;

use App\Models\Website;
use App\Repositories\Interfaces\WebsiteRepositoryInterface;
use App\Services\WebsiteService;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class WebsiteServiceTest extends TestCase
{
    protected $websiteRepository;
    protected WebsiteService $websiteService;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the WebsiteRepositoryInterface
        $this->websiteRepository = \Mockery::mock(WebsiteRepositoryInterface::class);

        // Create an instance of WebsiteService injecting the mock repository
        $this->websiteService = new WebsiteService($this->websiteRepository);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        \Mockery::close();
    }

    /** @test */
    public function it_can_get_websites_grouped_by_category_paginated()
    {
        // Mock expected result
        $expectedWebsitesGroupedByCategory = new LengthAwarePaginator(
            [
                ['url' => 'http://example.com'],
                ['url' => 'http://example.org'],
            ],
            10, // Total number of items
            10, // Items per page
            1 // Current page
        );

        // Mock repository method call and return
        $this->websiteRepository->shouldReceive('getWebsitesGroupedByCategory')
            ->once()
            ->with(10) // Per page
            ->andReturn($expectedWebsitesGroupedByCategory);

        // Call the method under test
        $result = $this->websiteService->getWebsitesGroupedByCategory(10);

        // Assert the result matches expected websites grouped by category paginated
        $this->assertEquals($expectedWebsitesGroupedByCategory, $result);
    }

    /** @test */
    public function it_can_create_a_website()
    {
        // Mock website data
        $websiteData = [
            'url' => 'http://example.com',
        ];

        // Mock repository method call
        $this->websiteRepository->shouldReceive('create')
            ->once()
            ->with($websiteData);

        // Call the method under test
        $this->websiteService->createWebsite($websiteData);

        // Assert that the create method was called once with the correct data
        $this->assertTrue(true); // Just a placeholder assertion for now
    }

    /** @test */
    // todo make test that only admins can delete
    public function it_can_delete_a_website()
    {
        // Mock a website instance
        $website = new Website(['url' => 'http://example.com']);

        // Mock repository method call
        $this->websiteRepository->shouldReceive('delete')
            ->once()
            ->with($website);

        // Call the method under test
        $this->websiteService->deleteWebsite($website);

        // Assert that the delete method was called once with the correct website instance
        $this->assertTrue(true); // Just a placeholder assertion for now
    }
}
