<?php

namespace Cz\I18Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AcceuilController extends Controller
{
    public function indexAction()
    {
        return $this->render('CzI18Bundle:Acceuil:index.html.twig', array(
            // ...
        ));
    }
    public function pageAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $chambre= $em->getRepository('CzAdminBundle:ChambreGeneraleTranslation')->findOneBySlug($slug);

        if (!$chambre) throw $this->createNotFoundException('La page n\'existe pas.');

        return $this->render('CzAdminBundle:pages:layout/pages.html.twig', array('chambre' => $chambre));
    }
    public function page2Action($slug2)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('CzAdminBundle:ChambreDetailsTranslation')->findOneBySlug($slug2);

        if (!$page) throw $this->createNotFoundException('La page n\'existe pas2.');

        return $this->render('CzAdminBundle:pages:layout/pages2.html.twig', array('page' => $page));
    }

}
