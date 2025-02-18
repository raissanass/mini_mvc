<?php

namespace App\Repository;

use App\Entity\Article;

class ArticleRepository extends Repository
{
    public function getAllArticles(): array
    {   
        $sql = 'SELECT * FROM article';
        $stmt = $this->pdo->prepare($sql); 
        $stmt->execute();

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = Article::createAndHydrate($row);
            $articles[] = $article;
        }
        return $articles;
    }

    // Nouvelle méthode pour récupérer un article par son ID
    public function getArticleById(int $id): ?Article
    {
        $sql = 'SELECT * FROM article WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row) {
            return Article::createAndHydrate($row);
        }
        return null; // Retourne null si l'article n'existe pas
    }
}
