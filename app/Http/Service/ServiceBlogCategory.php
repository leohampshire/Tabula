<?php

namespace App\Http\Service;

use App\BlogCategory;

class ServiceBlogCategory
{
    public function createBlogCategory(array $data): void
    {
        BlogCategory::create($data);
    }

    public function updateBlogCategory(BlogCategory $category, array $data): void
    {
       $category->update($data);
    }
}
