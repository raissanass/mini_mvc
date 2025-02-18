<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        // Charger le contrôleur des pages
                        $controller = new PageController();
                        $controller->route();
                        break;
                    case 'auth':
                        // Charger le contrôleur d'authentification
                        $controller = new AuthController();
                        $controller->route();
                        break;
                    case 'user':
                        // Charger le contrôleur utilisateur
                        $controller = new UserController();
                        $controller->route();
                        break;
                    case 'article':
                        // Charger le contrôleur des articles
                        $controller = new ArticleController();
                        $controller->route();
                        break;
                    default:
                        throw new \Exception("Le contrôleur n'existe pas");
                        break;
                }
            } else {
                // Chargement de la page d'accueil si aucun contrôleur n'est spécifié dans l'URL
                $controller = new PageController();
                $controller->home();
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';

        try {
            if (!file_exists($filePath)) {
                throw new \Exception("Fichier non trouvé : " . $filePath);
            } else {
                // Extrait chaque ligne du tableau et crée des variables pour chacune
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
