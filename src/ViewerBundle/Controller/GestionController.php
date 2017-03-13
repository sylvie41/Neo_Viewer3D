<?php

namespace ViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ViewerBundle\Entity\Folder;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    public function validateFolderAction(Folder $folder, Request $request) {

        $em = $this->getDoctrine()->getManager();

        $folderId = $folder->getId();
        $state = $request->query->get('state');

        if ($state == 'checked') {
            $folder->setAccepted(true);
        } else {
            $folder->setAccepted(false);
        }

        $em->persist($folder);
        $em->flush();

        $response = new JsonResponse();
        $response->setData(array(
            'folderId' => $folderId,
        ));

        return $response;
    }

}
