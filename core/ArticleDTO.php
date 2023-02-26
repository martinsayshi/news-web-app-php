<?php

namespace app\core;

class ArticleDTO {
    private $id;
    private $title;
    private $text;
    private $creation_date;
    private $authors;

    public function __construct(\stdClass $model) {
        $this->id = $model->id;
        $this->title = $model->title;
        $this->text = $model->text;
        $this->creation_date = $model->creation_date;
        $this->authors = $model->authors;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreationDate() {
        return $this->creation_date;
    }

    public function getAuthors() {
        return $this->authors;
    }
}