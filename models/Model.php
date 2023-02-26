<?php

namespace app\models;

use app\core\Database;

class Model {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getOneArticle($id) {
        $this->db->query("
        SELECT news.*, GROUP_CONCAT(author.name SEPARATOR ', ') AS authors
        FROM news
        JOIN news_author ON news.id = news_author.news_id
        JOIN author ON author.id = news_author.author_id
        WHERE news.id = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    public function getArticles() {
        $this->db->query("
        SELECT news.*, GROUP_CONCAT(author.name SEPARATOR ', ') AS authors
        FROM news
        JOIN news_author ON news.id = news_author.news_id
        JOIN author ON author.id = news_author.author_id
        GROUP BY news.id");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAllAuthors() {
        $this->db->query("
        SELECT * FROM author");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getAuthorsId($data) {
        $allId = [];

        foreach ($data['authors'] as $author) {
            $this->db->query('SELECT id FROM author WHERE name = :name');
            $this->db->bind(':name', $author);
            $authorId = $this->db->resultSet();
            $allId[] = $authorId[0]->id;
        }
        
        return $allId;
    }

    public function add($data) {
        $this->db->query('INSERT INTO news (title, text, creation_date) VALUES(:title, :text, :creation_date)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':creation_date', $data['date']);
        $this->db->execute();


        $newsId = $this->db->lastInsertId();

        $authorsId = $this->getAuthorsId($data);


        foreach ($authorsId as $authorId) {
            $this->db->query('INSERT INTO news_author (news_id, author_id) VALUES(:newsId, :authorId)');
            $this->db->bind(':newsId', $newsId);
            $this->db->bind(':authorId', $authorId);
            $this->db->execute();
        }
    }

    public function edit($data) {
        $this->db->query('UPDATE news SET title = :title, text = :text, creation_date = :creation_date WHERE id = :id');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':creation_date', $data['date']);
        $this->db->bind(':id', $data['id']);
        $this->db->execute();


        $newsId = $data['id'];
        $authorsId = $this->getAuthorsId($data);
        
        $this->db->query('DELETE FROM news_author WHERE news_id = :newsId');
        $this->db->bind(':newsId', $newsId);
        $this->db->execute();

        foreach ($authorsId as $authorId) {
            $this->db->query('INSERT INTO news_author (news_id, author_id) VALUES(:newsId, :authorId)');
            $this->db->bind(':newsId', $newsId);
            $this->db->bind(':authorId', $authorId);
            $this->db->execute();
        }
    }

    public function getArticlesByAuthor($authorId) {
        $this->db->query("
        SELECT news.*, GROUP_CONCAT(author.name SEPARATOR ', ') AS authors
        FROM news
        JOIN news_author ON news.id = news_author.news_id
        JOIN author ON author.id = news_author.author_id
        WHERE author.id = :id
        GROUP BY news.id");
        $this->db->bind(':id', $authorId);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getTopAuthorsLastWeek() {
        // determine start and end dates of last week
        $lastWeekStart = date('Y-m-d', strtotime('last week Monday'));
        $lastWeekEnd = date('Y-m-d', strtotime('last week Sunday'));

        $this->db->query("
            SELECT author.name as author_name, COUNT(*) as article_count 
            FROM news 
            JOIN news_author ON news.id = news_author.news_id
            JOIN author ON news_author.author_id = author.id
            WHERE news.creation_date BETWEEN :start_date AND :end_date
            GROUP BY news_author.author_id 
            ORDER BY article_count DESC 
            LIMIT 3");
        
        $this->db->bind(':start_date', $lastWeekStart);
        $this->db->bind(':end_date', $lastWeekEnd);
        $results = $this->db->resultSet();
        return $results;
    }

}