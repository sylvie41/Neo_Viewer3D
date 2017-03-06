<?php

namespace ViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ViewerBundle\Entity\Folder;
use Symfony\Component\Filesystem\Filesystem;

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

    public function sendAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ref = $request->request->get('ref-patient');
        $nom = $request->request->get('nom-patient');

        // create folder
        $folder = new Folder;
        $folder->setRef($ref);
        $folder->setNom($nom);

        $em->persist($folder);
        $em->flush();

        $folderId = $folder->getId();
        $fs = new Filesystem();

        // get files
        $manager = $this->get('oneup_uploader.orphanage_manager')->get('documents');
        $files = $manager->getFiles();
        // upload orphanaged files
        $files = $manager->uploadFiles();

        foreach ($files as $file) {

            // rename file
            $newFileName = $folderId.'-'.$ref.'.'.$file->getExtension();
            $fs->rename($file->getRealPath(), $file->getPath().'/'.$newFileName);
            if ($file->getExtension() == 'obj') {
                $folder->setPath1($newFileName);
            } elseif ($file->getExtension() == 'mtl') {
                $folder->setPath2($newFileName);
            }

        }
        $em->persist($folder);
        $em->flush();

        return $this->redirectToRoute('viewer_homepage');
    }
}
