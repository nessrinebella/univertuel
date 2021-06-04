<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) 
        {
             return $this->redirectToRoute('app_homepage');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('platform/security/form_login.html.twig', ['error' => $error]);
    }

    /**
     * Allows admin user to log out
     * @Route("/admin/logout", name="admin_account_logout", methods={"GET"})
     * @return void
     */
    public function logout() 
    {
        throw new \Exception('Will be intercepted before getting here');
    }
}
