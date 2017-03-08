<?php

namespace ViewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ViewerBundle\Entity\Folder;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function runCommand($command, $arguments = array())
    {
        $kernel = $this->container->get('kernel');
        $app = new Application($kernel);

        $args = array_merge(array('command' => $command), $arguments);

        $input = new ArrayInput($args);
        $output = new NullOutput();

        return $app->doRun($input, $output);
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $folders = $em->getRepository('ViewerBundle:Folder')->findAll();

        foreach ($folders as $folder) {
            if ($folder->getPath3() == null or $folder->getPath4() == null) {
                $em->remove($folder);
            }
        }
        $em->flush();
        $this->runCommand('oneup:uploader:clear-orphans');
        return $this->render('ViewerBundle:Default:index.html.twig');
    }

    public function viewerAction(Folder $folder)
    {
        return $this->render('ViewerBundle:Default:viewer.html.twig',array(
            'folder' => $folder,
        ));
    }

    public function send1Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ref = $request->query->get('ref');
        $nom = $request->query->get('nom');

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
            $newFileName = $folderId.'-malloc-'.$ref.'.'.$file->getExtension();
            $fs->rename($file->getRealPath(), $file->getPath().'/'.$newFileName);
            if ($file->getExtension() == 'obj') {
                $folder->setPath1($newFileName);
            } elseif ($file->getExtension() == 'mtl') {
                $folder->setPath2($newFileName);
            }

        }
        $em->persist($folder);
        $em->flush();

        $response = new JsonResponse();
        $response->setData(array(
            'folderId' => $folderId,
        ));

        return $response;
    }
    public function send2Action(Request $request, Folder $folder)
    {
        $em = $this->getDoctrine()->getManager();

        $ref = $request->query->get('ref');
        $nom = $request->query->get('nom');
        // create folder
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
            $newFileName = $folderId.'-setup-'.$ref.'.'.$file->getExtension();
            $fs->rename($file->getRealPath(), $file->getPath().'/'.$newFileName);
            if ($file->getExtension() == 'obj') {
                $folder->setPath3($newFileName);
            } elseif ($file->getExtension() == 'mtl') {
                $folder->setPath4($newFileName);
            }

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
