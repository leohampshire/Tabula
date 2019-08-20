<?php

namespace Tests\Unit;

use Tests\TestCase;

class BlogCategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        \App\BlogCategory::create([
            'name' => 'Categoria Teste',
            'meta_title' => 'Categoria Teste',
            'keyword' => 'categoria teste',
            'meta_description' => 'Categoria Teste',
            'urn' => 'categoria-teste',
        ]);

        self::assertDatabaseHas('blog_categories', ['name' => 'Categoria Teste']);
    }
}
