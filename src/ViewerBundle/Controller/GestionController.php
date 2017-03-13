<?php

namespace ViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GestionController extends Controller
{
    public function indexCabinetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $folders = $em->getRepository('ViewerBundle:Folder')->findAll();

        return $this->render('ViewerBundle:Gestion:index_cabinet.html.twig', array(
            'folders' => $folders,
        ));
    }

}
