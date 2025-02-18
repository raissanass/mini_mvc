<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

class ArticleController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        $this->list();
                        break;
                    case 'show': // Ajouter ce cas pour afficher les détails
                        $this->show();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch(\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function list(): void
    {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->getAllArticles();

        $this->render(path: 'article/list', params: [
            'articles' => $articles
        ]);
    }

    // Nouvelle méthode pour afficher un article en détail
    public function show(): void
    {
        if (isset($_GET['id'])) {
            $articleRepository = new ArticleRepository();
            $article = $articleRepository->getArticleById($_GET['id']);

            if ($article) {
                $this->render('article/show', [
                    'article' => $article
                ]);
            } else {
                throw new \Exception("Article introuvable");
            }
        } else {
            throw new \Exception("ID d'article manquant");
        }
    }
}
