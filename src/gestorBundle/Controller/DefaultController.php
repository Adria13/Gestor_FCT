<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresa;
use gestorBundle\Form\empresaType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('gestorBundle:empresa');
        $datos = $repository->findAll();
        return $this->render('gestorBundle:Default:all.html.twig',array('datos' => $datos));
    }

    public function crearEmpresaAction(){

      $empresa = new empresa();
      $empresa->setNombre("Empresa Falos");
      $empresa->setDireccion("C/ Ajaj");
      $empresa->setCp(54637);
      $empresa->setTelefono1(123456789);
      $empresa->setTelefono2(987654321);
      $empresa->setFechaCreacion("12/06/16");

      $mangDoct=$this->getDoctrine()->getManager();
      $mangDoct->persist($empresa);
      $mangDoct->flush();
      return $this->render('gestorBundle:Default:crearEmpresa.html.twig', array("empresaId"=>$empresa->getId()));
    }

    public function newAction(Request $request){

      $empresa= new empresa();
      $form = $this->createForm(empresaType::class,$empresa);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()){
        $empresa = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($empresa);
        $em->flush();
        return $this->redirectToRoute('all');
      }

      return $this->render('gestorBundle:Default:new.html.twig', array("form"=>$form->createView()));
    }
}
