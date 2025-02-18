<?php

namespace App\Controller;

use App\Repository\BookRepository;

class PageController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'home':
                        $this->home();
                        break;
                    case 'about':
                        $this->about();
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

    protected function home()
    {
        $this->render('page/home', [
            'test' => 555
        ]);
    }

    protected function about()
    {
        $this->render('page/about', []);
    }
}
