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

        $user = $this->getUser();
        if ($user->hasRole('TEAMNEO')){
            $em = $this->getDoctrine()->getManager();
            $folders = $em->getRepository('ViewerBundle:Folder')->findAll();
            $folder = new Folder();
            $form = $this->createForm('ViewerBundle\Form\FolderType', $folder);


            foreach ($folders as $folder) {
                if ($folder->getSetupObj() == null or $folder->getSetupMtl() == null) {
                    $em->remove($folder);
                }
            }
            $em->flush();
            $this->runCommand('oneup:uploader:clear-orphans');
            return $this->render('ViewerBundle:Default:index.html.twig', array(
                'form' => $form->createView(),
            ));
        } else {
            return $this->redirectToRoute('cabinet_index');
        }

    }

    public function viewerAction($md5)
    {
        $em= $this->getDoctrine()->getManager();
        $folder = $em->getRepository('ViewerBundle:Folder')->findOneByMd5($md5);
        if ($folder != null) {
            return $this->render('ViewerBundle:Default:viewer.html.twig',array(
                'folder' => $folder,
            ));
        } else {
            return $this->redirectToRoute('viewer_homepage');
        }

    }

    public function send1Action(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $ref = $request->query->get('ref');
        $nom = $request->query->get('nom');
        $nbrGtS = $request->query->get('nbrGtS');
        $nbrGtI = $request->query->get('nbrGtI');
        $estimation = $request->query->get('estimation');

        // create folder
        $folder = new Folder;
        $folder->setRef($ref);
        $folder->setNom($nom);
        $folder->setNbGtS($nbrGtS);
        $folder->setNbGtI($nbrGtI);
        $folder->setEstimationTraitement($estimation);
        $folder->setMd5(md5($ref));

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
                $folder->setMallocObj($newFileName);
            } elseif ($file->getExtension() == 'mtl') {
                $folder->setMallocMtl($newFileName);
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
        $nbrGtS = $request->query->get('nbrGtS');
        $nbrGtI = $request->query->get('nbrGtI');
        $estimation = $request->query->get('estimation');

        // update folder
        $folder->setRef($ref);
        $folder->setNom($nom);
        $folder->setNbGtS($nbrGtS);
        $folder->setNbGtI($nbrGtI);
        $folder->setEstimationTraitement($estimation);
        $folder->setMd5(md5($ref.$folder->getId()));

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
                $folder->setSetupObj($newFileName);
            } elseif ($file->getExtension() == 'mtl') {
                $folder->setSetupMtl($newFileName);
            }

        }
        $em->persist($folder);
        $em->flush();

        $response = new JsonResponse();
        $response->setData(array(
            'md5' => $folder->getMd5(),
        ));

        return $response;
    }
}
