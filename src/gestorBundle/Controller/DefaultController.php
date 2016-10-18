<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('gestorBundle:empresa');
        $datos = $repository->findAll();
        return $this->render('gestorBundle:Default:all.html.twig',array('datos' => $datos));
    }
}
