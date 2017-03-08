<?php

namespace ViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ViewerBundle:Default:index.html.twig');
    }

    public function viewerAction()
    {
        return $this->render('ViewerBundle:Default:viewer.html.twig');
    }
}
