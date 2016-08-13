<?php

namespace Cz\I18Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AcceuilController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     */
    public function indexAction()
    {
//        return new RedirectResponse($this->generateUrl('_slug', array('url'=>'', '_locale'=>$this->container->getParameter('locale'))));
        return $this->render('CzI18Bundle:Acceuil:index.html.twig', array(
            // ...
        ));
    }
    public function pageAction($slug,\Symfony\Component\HttpFoundation\Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $chambre= $em->getRepository('CzAdminBundle:ChambreGeneraleTranslation')->findOneBySlug($slug);

        if (!$chambre){
            $chambre= $em->getRepository('CzAdminBundle:ChambreGeneraleTranslation')->findOneByLocale($request->getLocale());
            return $this->render('CzI18Bundle:pages:layout/pages.html.twig', array('chambre' => $chambre));

        }
//            throw $this->createNotFoundException('La page n\'existe pas.');


        return $this->render('CzI18Bundle:pages:layout/pages.html.twig', array('chambre' => $chambre));
    }
    public function page2Action($slug2)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('CzAdminBundle:ChambreDetailsTranslation')->findOneBySlug($slug2);

        if (!$page) $this->redirect('cz_admin');

        return $this->render('CzI18Bundle:pages:layout/pages2.html.twig', array('page' => $page));
    }
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('CzAdminBundle:ChambreGeneraleTranslation')->findAll();

        return $this->render('CzI18Bundle:pages:modulesUsed/menu.html.twig', array('pages' => $pages));
    }
}
