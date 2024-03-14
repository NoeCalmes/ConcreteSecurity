<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthProtect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Vérifier si l'utilisateur est connecté
        if ($request->uri->getSegment(1) === 'admin' && !$session->get('admin')) {
            // Rediriger vers la page d'accueil si l'admin n'est pas connecté
            return redirect()->to('/');
        }

        // Vérifier si l'utilisateur est connecté pour les URL commençant par "demande/"
        if ($request->uri->getSegment(1) === 'demande' && !$session->get('user')) {
            // Rediriger vers la page d'accueil si l'utilisateur n'est pas connecté
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
