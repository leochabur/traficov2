<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use GestionBundle\Entity\segVial\documentacion\CompaniaSeguro;
use GestionBundle\Form\segVial\documentacion\SeguroType;
use GestionBundle\Entity\segVial\documentacion\Seguro;
use GestionBundle\Form\segVial\documentacion\VerificacionTecnicaNacionalType;
use GestionBundle\Entity\segVial\documentacion\VerificacionTecnicaNacional;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use GestionBundle\Form\segVial\documentacion\VerificacionTecnicaProvincialType;
use GestionBundle\Entity\segVial\documentacion\VerificacionTecnicaProvincial;
use GestionBundle\Entity\segVial\documentacion\VerificacionTecnica;
use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaVencimiento;
use GestionBundle\Entity\segVial\documentacion\finanzas\CuotaUnidad;
use GestionBundle\Entity\segVial\documentacion\Vencimiento;
use GestionBundle\Form\segVial\documentacion\finanzas\CuotaVencimientoType;

/**
 * @Route("/documentos")
 */

class GestionDocumentosController extends AbstractController
{

    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }



    /**
     * @Route("/pagos/cuota/registrar/{id}", name="controller_gestion_documentos_pagos_registrar_cuuota")
     */
    public function registrarCuotaPagoVencimiento($id, Request $request): Response
    {
        try
        {
            $em = $this->getDoctrine()->getManager();

            $vto = $em->find(Vencimiento::class, $id);

            $url = $this->generateUrl('controller_gestion_documentos_pagos_registrar_cuuota', ['id' => $id]);

            $cuota = new CuotaVencimiento();
            $form = $this->getFormAddCuotaVencimiento($cuota, $url, $vto);

            $form->handleRequest($request);

            $validator = $this->validator;

            $groups = ['general'];

            $errors = $validator->validate($cuota, null, $groups);

            $details = [];

            if (count($errors))
            {               
                foreach ($errors as $e)
                {
                    $const = $e->getConstraint();
                    $groups = $const->groups;
                    $details[$groups[0]][] = $const->message;                              
                }
                return new JsonResponse(['ok' => false, 'errors' => $details]);
            }

            $cant = $vto->getUnidades()->count();

            if (!$cant)
            {
                return new JsonResponse(['ok' => false, 'errors' => ['general' => ['El vencimiento no tiene ninguna unidad asignada!']]]);
            }

            $montoUnitario = ($cuota->getMonto() / $vto->getUnidades()->count());

            foreach ($vto->getUnidades() as $u)
            {
                $cu = new CuotaUnidad();
                $cu->setMonto($montoUnitario);
                $cu->setUnidad($u);
                $cuota->addCuotasUnidade($cu);
            }

            $em->persist($cuota);
            $em->flush();
            return new JsonResponse(['ok' => true, 'monto' => $montoUnitario]);
        }
        catch (\Exception $e){
                                return new JsonResponse(['ok' => false, 'msg' => $e->getMessage()]);
        }
    }


    /**
     * @Route("/pagos/delete/cuota/{id}", name="controller_gestion_documentos_pagos_delete_cuuota")
     */
    public function deleteCuotaPagoVencimiento($id): Response
    {
        try
        {
            $em = $this->getDoctrine()->getManager();
            $vto = $em->find(CuotaVencimiento::class, $id);

            $em->remove($vto);
            $em->flush();

            return new JsonResponse(['ok' => true]);
        }
        catch (\Exception $e){
                                return new JsonResponse(['ok' => false, 'msg' => $e->getMessage()]);
        }
    }


    /**
     * @Route("/detalle/pagos/{id}", name="controller_gestion_documentos_detalle_pagos")
     */
    public function detallePagosVecimiento($id): Response
    {
        $vto = $this->getDoctrine()->getManager()->find(Vencimiento::class, $id);

        $url = $this->generateUrl('controller_gestion_documentos_pagos_registrar_cuuota', ['id' => $id]);

        $cuota = new CuotaVencimiento();
        $form = $this->getFormAddCuotaVencimiento($cuota, $url, $vto);

        return $this->render('controller/gestion_documentos/pagos/detallePagos.html.twig', ['vto' => $vto, 'form' => $form->createView()]);
    }

    private function getFormAddCuotaVencimiento($cuota, $url, $vto)
    {
        return $this->createForm(CuotaVencimientoType::class, $cuota, ['action' => $url,'method' => 'POST', 'vto' => $vto]);
    }

    /**
     * @Route("/verificacion/home", name="controller_gestion_documentos_home_verificaciones")
     */
    public function verificacionesIndex(): Response
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(VerificacionTecnica::class);
        $detalle = $repository->getAllVTVActivas();
        return $this->render('controller/gestion_documentos/verificacion/index.html.twig', ['detalle' => $detalle]);
    }


    /**
     * @Route("/vtv/nuevo/{type}", name="controller_gestion_documentos_alta_vtv")
     */
    public function nuevaVTV($type): Response
    {
        if ($type == 1)
        {
            $vtv = new VerificacionTecnicaNacional();
            $url = $this->generateUrl('controller_gestion_documentos_alta_vtv_nacion_procesar', ['type' => 1]);
            $form = $this->getFormAltaVTV(VerificacionTecnicaNacionalType::class, $vtv, $url);
            $label = 'Nueva VTV Nacion';
        }
        elseif($type == 2)
        {
            $vtv = new VerificacionTecnicaProvincial();
            $url = $this->generateUrl('controller_gestion_documentos_alta_vtv_nacion_procesar', ['type' => 2]);
            $form = $this->getFormAltaVTV(VerificacionTecnicaProvincialType::class, $vtv, $url);
            $label = 'Nueva VTV Provincia';
        }
        else
        {
            $this->addFlash('error', 'Tipo de documento inexistente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones');
        }

        return $this->render('controller/gestion_documentos/verificacion/nuevoVTVNacion.html.twig', 
                             [
                                'form' => $form->createView(),
                                'label' => $label
                             ]);
    }

    /**
     * @Route("/vtv/edit/{id}", name="controller_gestion_documentos_editar_vtv")
     */
    public function editarVTV($id): Response
    {
        $vtv = $this->getDoctrine()->getManager()->find(VerificacionTecnica::class, $id);
        if (!$vtv)
        {
            $this->addFlash('error', 'VTV inexistente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones');
        }
        $type = $vtv->getType();

        $classForm = [1 => VerificacionTecnicaNacionalType::class, 2 => VerificacionTecnicaProvincialType::class];

        $url = $this->generateUrl('controller_gestion_documentos_editar_vtv_procesar', ['id' => $id]);

        $form = $this->getFormAltaVTV($classForm[$type], $vtv, $url);

        return $this->render('controller/gestion_documentos/verificacion/nuevoVTVNacion.html.twig', 
                             [
                                'form' => $form->createView(),
                                'label' => 'Modificar '. $vtv->getTipoVtv(),
                                'edicion' => true,
                                'vtv' => $vtv
                             ]);
    }

    /**
     * @Route("/vtv/editar/procesar/{id}", name="controller_gestion_documentos_editar_vtv_procesar")
     */
    public function vtvEditarProcesar($id, Request $request): Response
    {

        $em = $this->getDoctrine()->getManager();

        $vtv = $em->find(VerificacionTecnica::class, $id);

        if (!$vtv)
        {
            $this->addFlash('error', 'Verificacion inexistente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones'); 
        }
        $type = $vtv->getType();


        if ($type == 1)
        {
            $url = $this->generateUrl('controller_gestion_documentos_editar_vtv_procesar', ['id' => $id]);
            $form = $this->getFormAltaVTV(VerificacionTecnicaNacionalType::class, $vtv, $url);
            $label = 'Modificar VTV Nacion';
        }
        elseif($type == 2)
        {
            $url = $this->generateUrl('controller_gestion_documentos_editar_vtv_procesar', ['id' => $id]);
            $form = $this->getFormAltaVTV(VerificacionTecnicaProvincialType::class, $vtv, $url);
            $label = 'Modificar VTV Provincia';
        }
        else
        {
            $this->addFlash('error', 'Tipo de documento inexistente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones');
        }

        $form->handleRequest($request);

        $validator = $this->validator;

        $groups = ['general'];

        $errors = $validator->validate($vtv, null, $groups);

        $details = [];

        if (count($errors))
        {
            
            foreach ($errors as $e)
            {
                $const = $e->getConstraint();
                $groups = $const->groups;

                    $details[$groups[0]][] = $const->message;
                          
            }

            return $this->render('controller/gestion_documentos/verificacion/nuevoVTVNacion.html.twig', 
                                 [
                                    'form' => $form->createView(),
                                    'label' => $label,
                                    'errors' => $details,
                                    'vtv' => $vtv,
                                    'edicion' => true
                                 ]);
        }
        else
        {

            if (($vtv->getUnidades()->count() == 0) || ($vtv->getUnidades()->count() > 1 ))
            {
                $details[$groups[0]][] = 'Debe seleccionoar un coche';
                return $this->render('controller/gestion_documentos/verificacion/nuevoVTVNacion.html.twig', 
                                     [
                                        'form' => $form->createView(),
                                        'label' => $label,
                                        'errors' => $details,
                                        'vtv' => $vtv,
                                        'edicion' => true
                                     ]);
            }
            $em->flush();
            $this->addFlash('success', 'VTV modificada exitosamente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones');
        }
    }


    /**
     * @Route("/vtv/nuevo/procesar/{type}/{id}", name="controller_gestion_documentos_alta_vtv_nacion_procesar")
     */
    public function vtvNacionNuevoProcesar($type, $id = 0, Request $request): Response
    {
        if ($type == 1)
        {
            $vtv = new VerificacionTecnicaNacional();
            $url = $this->generateUrl('controller_gestion_documentos_alta_vtv_nacion_procesar', ['type' => 1]);
            $form = $this->getFormAltaVTV(VerificacionTecnicaNacionalType::class, $vtv, $url);
            $label = 'Nueva VTV Nacion';
        }
        elseif($type == 2)
        {
            $vtv = new VerificacionTecnicaProvincial();
            $url = $this->generateUrl('controller_gestion_documentos_alta_vtv_nacion_procesar', ['type' => 2]);
            $form = $this->getFormAltaVTV(VerificacionTecnicaProvincialType::class, $vtv, $url);
            $label = 'Nueva VTV Provincia';
        }
        else
        {
            $this->addFlash('error', 'Tipo de documento inexistente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones');
        }

        $form->handleRequest($request);

        $validator = $this->validator;

        $groups = ['general'];

        $errors = $validator->validate($vtv, null, $groups);

        $details = [];

        if (count($errors))
        {
            
            foreach ($errors as $e)
            {
                $const = $e->getConstraint();
                $groups = $const->groups;

                    $details[$groups[0]][] = $const->message;
                          
            }

            return $this->render('controller/gestion_documentos/verificacion/nuevoVTVNacion.html.twig', 
                                 [
                                    'form' => $form->createView(),
                                    'label' => $label,
                                    'errors' => $details
                                 ]);
        }
        else
        {

            if (($vtv->getUnidades()->count() == 0) || ($vtv->getUnidades()->count() > 1 ))
            {
                $details[$groups[0]][] = 'Debe seleccionoar un coche';
                return $this->render('controller/gestion_documentos/verificacion/nuevoVTVNacion.html.twig', 
                                     [
                                        'form' => $form->createView(),
                                        'label' => $label,
                                        'errors' => $details
                                     ]);
            }


            $em = $this->getDoctrine()->getManager();

            $cv = new CuotaVencimiento();
            $cv->setFechaVencimiento($vtv->getEmision());
            $cv->setFechaPago($vtv->getEmision());
            $cv->setMonto($vtv->getImporte());

            $cu = new CuotaUnidad();
            $cu->setUnidad($vtv->getInterno());
            $cu->setMonto($vtv->getImporte());

            $cv->addCuotasUnidade($cu);

            $vtv->addCuotasVencimiento($cv);

            $em->persist($vtv);
            $em->flush();
            $this->addFlash('success', 'VTV generada exitosamente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_verificaciones');
        }
    }


    private function getFormAltaVTV($class, $vtv, $url)
    {
        return $this->createForm($class, $vtv, ['action' => $url,'method' => 'POST']);
    }

    ///////////////////////////////// ADMINISTRACION DE SEGUROS

    /**
     * @Route("/seguro/home", name="controller_gestion_documentos_home_seguro")
     */
    public function segurosIndex(): Response
    {
        $repository = $this->getDoctrine()->getManager()->getRepository(Seguro::class);
        $detalle = $repository->getAllSegurosActivos();
        return $this->render('controller/gestion_documentos/index.html.twig', ['detalle' => $detalle]);
    }

    /**
     * @Route("/seguro/nuevo", name="controller_gestion_documentos_alta_seguro")
     */
    public function segurosNuevo(): Response
    {
        $seguro = new Seguro();
        $url = $this->generateUrl('controller_gestion_documentos_alta_seguro_procesar');
        $form = $this->getFormAltaSeguro($seguro, $url);

        return $this->render('controller/gestion_documentos/nuevoSeguro.html.twig', 
                             [
                                'form' => $form->createView(),
                                'label' => 'Nuevo Seguro'
                             ]);
    }

    private function getFormAltaSeguro($seguro, $url)
    {
        return $this->createForm(SeguroType::class, $seguro, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/seguro/nuevo/procesar", name="controller_gestion_documentos_alta_seguro_procesar")
     */
    public function segurosNuevoProcesar(Request $request): Response
    {
        $seguro = new Seguro();
        $url = $this->generateUrl('controller_gestion_documentos_alta_seguro_procesar');
        $form = $this->getFormAltaSeguro($seguro, $url);

        $form->handleRequest($request);

        $validator = $this->validator;//get('validator');

        $groups = ['general'];

        $errors = $validator->validate($seguro, null, $groups);

        $details = [];

        if (count($errors))
        {
            
            foreach ($errors as $e)
            {
                $const = $e->getConstraint();
                $groups = $const->groups;

                    $details[$groups[0]][] = $const->message;
                          
            }

            return $this->render('controller/gestion_documentos/nuevoSeguro.html.twig', 
                     [
                        'form' => $form->createView(),
                        'label' => 'Nuevo Seguro',
                        'errors' => $details
                     ]);
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seguro);
            $em->flush();
            $this->addFlash('success', 'Seguro generado exitosamente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_seguro');
        }
    }

    /**
     * @Route("/seguro/editar/{id}", name="controller_gestion_documentos_editar_seguro")
     */
    public function segurosEditar($id): Response
    {
        $seguro = $this->getDoctrine()->getManager()->find(Seguro::class, $id);

        if (!$seguro)
        {
            $this->addFlash('error', 'Seguro inexistente en la BD!');
            return $this->redirectToRoute('controller_gestion_documentos_home_seguro');
        }

        $url = $this->generateUrl('controller_gestion_documentos_editar_seguro_procesar', ['id' => $id]);
        $form = $this->getFormAltaSeguro($seguro, $url);

        return $this->render('controller/gestion_documentos/nuevoSeguro.html.twig', 
                             [
                                'form' => $form->createView(),
                                'label' => 'Modificar Seguro'
                             ]);
    }

    /**
     * @Route("/seguro/editar/procesar/{id}", name="controller_gestion_documentos_editar_seguro_procesar")
     */
    public function segurosEditarProcesar($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        $seguro = $em->find(Seguro::class, $id);

        if (!$seguro)
        {
            $this->addFlash('error', 'Seguro inexistente en la BD!');
            return $this->redirectToRoute('controller_gestion_documentos_home_seguro');
        }

        $url = $this->generateUrl('controller_gestion_documentos_editar_seguro_procesar', ['id' => $id]);
        $form = $this->getFormAltaSeguro($seguro, $url);

        $form->handleRequest($request);

        $validator = $this->validator;//get('validator');

        $groups = ['general'];

        $errors = $validator->validate($seguro, null, $groups);

        $details = [];

        if (count($errors))
        {
            
            foreach ($errors as $e)
            {
                $const = $e->getConstraint();
                $groups = $const->groups;

                    $details[$groups[0]][] = $const->message;
                          
            }

            return $this->render('controller/gestion_documentos/nuevoSeguro.html.twig', 
                     [
                        'form' => $form->createView(),
                        'label' => 'Modificar Seguro',
                        'errors' => $details
                     ]);
        }
        else
        {
            $em->flush();
            $this->addFlash('success', 'Seguro modificado exitosamente!');
            return $this->redirectToRoute('controller_gestion_documentos_home_seguro');
        }
    }
}
