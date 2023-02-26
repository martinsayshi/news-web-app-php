<?php

namespace app\core;

class AuthorDTO {
    private $name;
    private $articleCount;

    public function __construct(\stdClass $model) {
        $this->name = $model->author_name;
        $this->articleCount = $model->article_count;
    }

    public function getName() {
        return $this->name;
    }

    public function getArticleCount() {
        return $this->articleCount;
    }
}