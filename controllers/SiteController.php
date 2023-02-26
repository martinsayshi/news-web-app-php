<?php

namespace app\controllers;

use app\views\View;
use app\models\Model;
use app\core\ArticleDTO;
use app\core\AuthorDTO;


class SiteController {

    public static function index() {
        $model = new Model();
        $articles = $model->getArticles();

        $articlesDTOs = [];
            foreach ($articles as $article) {
                $articlesDTO = new ArticleDTO($article);
                $articlesDTOs[] = $articlesDTO;
            }

            View::renderView('home', $articlesDTOs);
    }

    public static function addNews() {
        $model = new Model();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data = [
                'title' => trim($_POST['title']),
                'text' => trim($_POST['text']),
                'authors' => $_POST['authors'],
                'date' => $_POST['date']
            ];

            $model->add($data);
            header('location: /');

        } else {
            $data = [];
    
            View::renderView('addnews', $data);    
        } 
    }

    public static function editNews() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new Model();
            $id = $_GET['id'];
            
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'text' => trim($_POST['text']),
                'authors' => $_POST['authors'],
                'date' => $_POST['date']
            ];

            $model->edit($data);
            header('location: /');

        } else {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $model = new Model();

                $article = $model->getOneArticle($id);
                $articleDTO = new ArticleDTO($article);
        
                View::renderView('edit', $articleDTO);  
            } else {
                header('location: /');
            }
  
        } 
    }

    public static function checkPost() {
        $id = $_GET['id'];
        $model = new Model();

        $article = $model->getOneArticle($id);

        $articleDTO = new ArticleDTO($article);
        View::renderView('article', $articleDTO);  

    }

    public static function checkAuthor() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $model = new Model();

            $articles = $model->getArticlesByAuthor($id);
            $articlesDTOs = [];
            foreach ($articles as $article) {
                $articlesDTO = new ArticleDTO($article);
                $articlesDTOs[] = $articlesDTO;
            }

            View::renderView('articlesauthor', $articlesDTOs);
        } else {
            $model = new Model();
            $allAuthors = $model->getAllAuthors();

            View::renderView('author', $allAuthors);
        }
    }

    public static function getTopAuthors () {
        $model = new Model();
        $topAuthors = $model->getTopAuthorsLastWeek();
        $authorsDTOs = [];
        foreach ($topAuthors as $author) {
            $authorsDTO = new AuthorDTO($author);
            $authorsDTOs[] = $authorsDTO;
        }

        View::renderView('topauthors', $authorsDTOs);
    }
}