<?php

namespace GestionBundle\Controller;

use DH\Auditor\Provider\Doctrine\DoctrineProvider;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use GestionBundle\Entity\ventas\Cliente;
use GestionBundle\Form\ventas\ClienteType;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Entity\segVial\opciones\TipoUnidad;
use GestionBundle\Form\segVial\opciones\TipoUnidadType;
use GestionBundle\Entity\segVial\opciones\CalidadUnidad;
use GestionBundle\Form\segVial\opciones\CalidadUnidadType;
use GestionBundle\Entity\segVial\opciones\TipoSuspension;
use GestionBundle\Form\segVial\opciones\TipoSuspensionType;
use GestionBundle\Entity\segVial\opciones\TipoMotor;
use GestionBundle\Form\segVial\opciones\TipoMotorType;
use GestionBundle\Entity\segVial\opciones\TipoHabilitacionUnidad;
use GestionBundle\Form\segVial\opciones\TipoHabilitacionUnidadType;
use GestionBundle\Entity\segVial\peajes\EstacionPeaje;
use GestionBundle\Form\segVial\peajes\EstacionPeajeType;

use GestionBundle\Entity\segVial\eventos\TipoInfraccion;
use GestionBundle\Form\segVial\eventos\TipoInfraccionType;
use GestionBundle\Entity\segVial\eventos\Infraccion;
use GestionBundle\Form\segVial\eventos\InfraccionType;
use GestionBundle\Entity\segVial\eventos\Evento;



/**
 * @Route("/admin")
 */

class GestionSegVialController extends AbstractController
{

    //////////////ADMINISTRAR PEAJES////////////////////////
    /**
     * @Route("/segvial/peajes/estpeaje", name="alta_estacion_peaje", methods={"GET", "POST"})
     */
    public function altaEstacionPeajeAction(Request $request)
    {
        $estacion = new EstacionPeaje();
        $form = $this->getFormAltaEstacionPeaje($estacion, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($estacion);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'La estacion de peaje ha sido generada exitosamente!'
                                );
                return $this->redirectToRoute('alta_estacion_peaje');
            }
        }

        $estaciones = $em->getRepository(EstacionPeaje::class)->findBy([], ['nombre' => 'ASC']);;

        return $this->render('@Gestion/segVial/peajes/abmEstacionPeaje.html.twig', 
                            ['estaciones' => $estaciones, 'label' => 'Nueva', 'form' => $form->createView()]);
    }

    private function getFormAltaEstacionPeaje($estacion, $url)
    {
        return $this->createForm(EstacionPeajeType::class, $estacion, ['user' => $this->getUser(), 'action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/peajes/addtu", name="add_tipo_estacion_peaje", methods={"GET", "POST"})
     */
    public function addTipoUnidad(Request $request)
    {

    }
    //////////////////////////////////////////////////////


    ////////////ABM Tipo Unidad
    /**
     * @Route("/segvial/tipounidad/alta", name="alta_tipo_unidad", methods={"GET", "POST"})
     */
    public function altaTipoUnidadAction(Request $request)
    {
        $tipo = new TipoUnidad();
        $form = $this->getFormAltaTipoUnidad($tipo, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($tipo);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'El Tipo de Unidad ha sido generado exitosamente!'
                                );
                return $this->redirectToRoute('alta_tipo_unidad');
            }
        }

        $tipos = $em->getRepository(TipoUnidad::class)->findAll();

        return $this->render('@Gestion/segVial/opciones/altaTipoUnidad.html.twig', ['tipos' => $tipos, 'label' => 'Nuevo', 'form' => $form->createView()]);
    }

    private function getFormAltaTipoUnidad($tipo, $url)
    {
        return $this->createForm(TipoUnidadType::class, $tipo, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/tipounidad/edit/{id}", name="editar_tipo_unidad")
     */
    public function editarTipoUnidadAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoUnidad::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_unidad', ['id' => $id]);
        $form = $this->getFormAltaTipoUnidad($tipo, $url);
        return $this->render('@Gestion/segVial/opciones/altaTipoUnidad.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }

    /**
     * @Route("/segvial/tipounidad/editprc/{id}", name="procesar_editar_tipo_unidad", methods={"POST"})
     */
    public function procesarEditarTipoUnidadAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoUnidad::class, $id);

        $form = $this->getFormAltaTipoUnidad($tipo, '');
        

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash(
                                'success',
                                'El Tipo de Unidad ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_tipo_unidad');
        }
        return $this->render('@Gestion/segVial/opciones/altaTipoUnidad.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }
    /////////////////////////

    ////////////ABM Calidad Unidad
    /**
     * @Route("/segvial/calidad/alta", name="alta_calidad_unidad", methods={"GET", "POST"})
     */
    public function altaCalidadUnidadAction(Request $request)
    {
        $calidad = new CalidadUnidad();
        $form = $this->getFormAltaCalidadUnidad($calidad, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($calidad);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'La Calidad de Unidad ha sido almacenada exitosamente!'
                                );
                return $this->redirectToRoute('alta_calidad_unidad');
            }
        }

        $calidades = $em->getRepository(CalidadUnidad::class)->findAll();

        return $this->render('@Gestion/segVial/opciones/altaCalidadUnidad.html.twig', ['calidades' => $calidades, 'label' => 'Nueva', 'form' => $form->createView()]);
    }

    private function getFormAltaCalidadUnidad($calidad, $url)
    {
        return $this->createForm(CalidadUnidadType::class, $calidad, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/calidad/edit/{id}", name="editar_calidad_unidad")
     */
    public function editarCalidadUnidadAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $calidad = $em->find(CalidadUnidad::class, $id);
        $url = $this->generateUrl('procesar_editar_calidad_unidad', ['id' => $id]);
        $form = $this->getFormAltaCalidadUnidad($calidad, $url);
        return $this->render('@Gestion/segVial/opciones/altaCalidadUnidad.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }

    /**
     * @Route("/segvial/calidad/editprc/{id}", name="procesar_editar_calidad_unidad", methods={"POST"})
     */
    public function procesarEditarCalidadUnidadAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $calidad = $em->find(CalidadUnidad::class, $id);
        $url = $this->generateUrl('procesar_editar_calidad_unidad', ['id' => $id]);
        $form = $this->getFormAltaCalidadUnidad($calidad, $url);
        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash(
                                'success',
                                'La Calidad de Unidad ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_calidad_unidad');
        }
        return $this->render('@Gestion/segVial/opciones/altaCalidadUnidad.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }
    /////////////////////////

    ////////////ABM Tipo Suspension
    /**
     * @Route("/segvial/tipos/alta", name="alta_tipo_suspension", methods={"GET", "POST"})
     */
    public function altaTipoSuspensionAction(Request $request)
    {
        $tipo = new TipoSuspension();
        $form = $this->getFormAltaTipoSuspension($tipo, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($tipo);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'El Tipo de Suspension ha sido almacenado exitosamente!'
                                );
                return $this->redirectToRoute('alta_tipo_suspension');
            }
        }

        $tipos = $em->getRepository(TipoSuspension::class)->findAll();

        return $this->render('@Gestion/segVial/opciones/altaTipoSuspension.html.twig', ['tipos' => $tipos, 'label' => 'Nuevo', 'form' => $form->createView()]);
    }

    private function getFormAltaTipoSuspension($tipo, $url)
    {
        return $this->createForm(TipoSuspensionType::class, $tipo, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/tipos/edit/{id}", name="editar_tipo_suspension")
     */
    public function editarTipoSuspensionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoSuspension::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_suspension', ['id' => $id]);
        $form = $this->getFormAltaTipoSuspension($tipo, $url);
        return $this->render('@Gestion/segVial/opciones/altaTipoSuspension.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }

    /**
     * @Route("/segvial/tipos/editprc/{id}", name="procesar_editar_tipo_suspension", methods={"POST"})
     */
    public function procesarEditarTipoSuspensionAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoSuspension::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_suspension', ['id' => $id]);
        $form = $this->getFormAltaTipoSuspension($tipo, $url);
        

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash(
                                'success',
                                'El Tipo de Suspension ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_tipo_suspension');
        }
        return $this->render('@Gestion/segVial/opciones/altaTipoSuspension.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }
    /////////////////////////

    ////////////ABM Tipo Motor
    /**
     * @Route("/segvial/tipom/alta", name="alta_tipo_motor", methods={"GET", "POST"})
     */
    public function altaTipoMotorAction(Request $request)
    {
        $tipo = new TipoMotor();
        $form = $this->getFormAltaTipoMotor($tipo, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($tipo);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'El Tipo de Motor ha sido almacenado exitosamente!'
                                );
                return $this->redirectToRoute('alta_tipo_motor');
            }
        }

        $tipos = $em->getRepository(TipoMotor::class)->findAll();

        return $this->render('@Gestion/segVial/opciones/altaTipoMotor.html.twig', ['tipos' => $tipos, 'label' => 'Nuevo', 'form' => $form->createView()]);
    }

    private function getFormAltaTipoMotor($tipo, $url)
    {
        return $this->createForm(TipoMotorType::class, $tipo, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/tipom/edit/{id}", name="editar_tipo_motor")
     */
    public function editarTipoMotorAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoMotor::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_motor', ['id' => $id]);
        $form = $this->getFormAltaTipoMotor($tipo, $url);
        return $this->render('@Gestion/segVial/opciones/altaTipoMotor.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }

    /**
     * @Route("/segvial/tipom/editprc/{id}", name="procesar_editar_tipo_motor", methods={"POST"})
     */
    public function procesarEditarTipoMotorAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoMotor::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_motor', ['id' => $id]);
        $form = $this->getFormAltaTipoMotor($tipo, $url);
        

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash(
                                'success',
                                'El Tipo de Motor ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_tipo_motor');
        }
        return $this->render('@Gestion/segVial/opciones/altaTipoMotor.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }
    /////////////////////////

    ////////////ABM Tipo Habilitacion
    /**
     * @Route("/segvial/tipoh/alta", name="alta_tipo_habilitacion", methods={"GET", "POST"})
     */
    public function altaTipoHabilitacionAction(Request $request)
    {
        $tipo = new TipoHabilitacionUnidad();
        $form = $this->getFormAltaTipoHabilitacion($tipo, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($tipo);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'El Tipo de Habilitacion ha sido almacenado exitosamente!'
                                );
                return $this->redirectToRoute('alta_tipo_habilitacion');
            }
        }

        $tipos = $em->getRepository(TipoHabilitacionUnidad::class)->findAll();

        return $this->render('@Gestion/segVial/opciones/altaTipoHabilitacion.html.twig', ['tipos' => $tipos, 'label' => 'Nuevo', 'form' => $form->createView()]);
    }

    private function getFormAltaTipoHabilitacion($tipo, $url)
    {
        return $this->createForm(TipoHabilitacionUnidadType::class, $tipo, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/tipoh/edit/{id}", name="editar_tipo_habilitacion")
     */
    public function editarTipoHabilitacionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoHabilitacionUnidad::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_habilitacion', ['id' => $id]);
        $form = $this->getFormAltaTipoHabilitacion($tipo, $url);
        return $this->render('@Gestion/segVial/opciones/altaTipoHabilitacion.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }

    /**
     * @Route("/segvial/tipoh/editprc/{id}", name="procesar_editar_tipo_habilitacion", methods={"POST"})
     */
    public function procesarEditarTipoHabilitacionAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->find(TipoHabilitacionUnidad::class, $id);
        $url = $this->generateUrl('procesar_editar_tipo_habilitacion', ['id' => $id]);
        $form = $this->getFormAltaTipoHabilitacion($tipo, $url);
        

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash(
                                'success',
                                'El Tipo de Habilitacion ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_tipo_habilitacion');
        }
        return $this->render('@Gestion/segVial/opciones/altaTipoHabilitacion.html.twig', ['edit' => true, 'label' => 'Modificar', 'form' => $form->createView()]);
    }
    /////////////////////////

    ////////////////EVENTOS///////////////////////////
    /////////////////////////////////////////////////
    ////////////ABM Tipo Infraccion////////////////

    /**
     * @Route("/segvial/eventos/tpoinf", name="eventos_alta_tipo_infraccion", methods={"GET", "POST"})
     */
    public function altaTipoInfraccion(Request $request)
    {
        $tipo = new TipoInfraccion();
        $form = $this->getFormAltaTipoInfraccion($tipo, '');
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {                
                $em->persist($tipo);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'El Tipo de Infraccion ha sido generado exitosamente!'
                                );
                return $this->redirectToRoute('eventos_alta_tipo_infraccion');
            }
        }

        $tipos = $em->getRepository(TipoInfraccion::class)->findAll();

        return $this->render('@Gestion/segVial/eventos/altaTipoInfraccion.html.twig', ['tipos' => $tipos, 'label' => 'Nuevo', 'form' => $form->createView()]);
    }

    private function getFormAltaTipoInfraccion($tipo, $url)
    {
        return $this->createForm(TipoInfraccionType::class, $tipo, ['action' => $url,'method' => 'POST']);
    }


    ////////////////////////////INFRACCIONES///////////////////////////////////////////
    /**
     * @Route("/segvial/eventos/infup", name="eventos_alta_infraccion")
     */
    public function altaInfraccion()
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Evento::class);
        $proximo = $repository->proximoNumeroEvento(Infraccion::class);
        $prefix = Infraccion::getPrefix();

        $infraccion = new Infraccion();
        $form = $this->getFormAltaInfraccion($infraccion, $this->generateUrl('eventos_alta_infraccion_procesar'), $proximo, $prefix);

        return $this->render('@Gestion/segVial/eventos/altaInfraccion.html.twig', ['label' => 'Nuevo', 'form' => $form->createView()]);
    }

    private function getFormAltaInfraccion($infraccion, $url, $proximo, $prefix)
    {
        return $this->createForm(InfraccionType::class, $infraccion, ['action' => $url,'method' => 'POST', 'numero' => $proximo, 'prefix' => $prefix]);
    }

    /**
     * @Route("/segvial/eventos/infupproc", name="eventos_alta_infraccion_procesar", methods={"POST"})
     */
    public function altaInfraccionProcesar(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Evento::class);
        $proximo = $repository->proximoNumeroEvento(Infraccion::class);
        $prefix = Infraccion::getPrefix();

        $infraccion = new Infraccion();
        $form = $this->getFormAltaInfraccion($infraccion, $this->generateUrl('eventos_alta_infraccion_procesar'), $proximo, $prefix);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $infraccion->setUsuarioAlta($this->getUser());
            $infraccion->setFechaAlta(new \DateTime());
            $em->persist($infraccion);
            $em->flush();
                            $this->addFlash(
                                    'success',
                                    'Se ha generado con exito la infraccion Numero '.$prefix.' '.$proximo
                                );
            return $this->redirectToRoute('eventos_alta_infraccion');
        }
        return $this->render('@Gestion/segVial/eventos/altaInfraccion.html.twig', ['label' => 'Nuevo', 'form' => $form->createView()]);
    }

}
