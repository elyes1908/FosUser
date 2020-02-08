<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@User/Default/index.html.twig');
    }
    public function AdminCoursAction()
    {$u = $this->container->get('security.token_storage')->getToken()->getUser();
        try
        {
            switch ($u->getRoles()[0]) {
                case "AGENT":
                    return $this->redirect('index');

                    break;
            }
        }
        catch (\Throwable $e)
        {
            return $this->redirect('http://localhost/FosUser/web/app_dev.php/login');

        };
        return $this->render('@Cours/Default/index.html.twig', ['u'=>$u]);
    }
}
