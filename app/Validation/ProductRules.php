<?php

namespace App\Validation;

use App\Models\Article;

class ArticleRules
{
    /** @var Article */
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    static public function makeStore(): array
    {
        return [

        ];

    }

    static public function makeUpdate(): array
    {
        return [

        ];

    }
}
