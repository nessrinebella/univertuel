<?php
namespace App\Controller\Platform;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PlatformController extends AbstractController
{
    public function homepageView()
    {
        return $this->render('platform/homepage/homepage.html.twig');
    }
    
    public function memberHomepageView()
    {
    	return $this->render('platform/member/dashboard.html.twig');
    }
    
    public function forbiddenView ()
    {
        return $this->render('platform/forbidden/forbidden.html.twig');
    }
}

