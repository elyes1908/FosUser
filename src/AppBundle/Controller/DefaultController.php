<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/home")
     */
    public function redirectAction(){
        $authChecker=$this->container->get('security.token_storage')->getToken()->getUser();
        if($authChecker->getRoles('ROLE_AGENT')){
            return $this->render('@Cours/Default/index.html.twig');
        }
        return $this->render('@FOSUser/Security/login.html.twig',[]);
    }
}
