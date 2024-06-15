<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('website_id')
                ->constrained('websites')
                ->onDelete('cascade')
                ->index('idx_websites_categories_website_id');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade')
                ->index('idx_websites_categories_category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites_categories');
    }
}
