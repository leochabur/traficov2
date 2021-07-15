<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Entity\trafico\Servicio;
use GestionBundle\Form\trafico\ServicioType;
use GestionBundle\Entity\trafico\Turno;
use GestionBundle\Form\trafico\TurnoType;
use GestionBundle\Form\utils\SelectClienteType;
use GestionBundle\Entity\segVial\Unidad;
use GestionBundle\Form\segVial\UnidadType;
use GestionBundle\Entity\rrhh\Propietario;
use GestionBundle\Form\rrhh\PropietarioType;

/**
 * @Route("/trafico")
 */

class GestionTraficoController extends AbstractController
{

    ////////////ABM Servicio
    /**
     * @Route("/servicios/alta", name="alta_servicio")
     */
    public function altaServicioAction()
    {        
        $servicio = new Servicio();
        $url = $this->generateUrl('alta_servicio_procesar');
        $form = $this->getFormAltaServicio($servicio, $url);

        return $this->render('@Gestion/trafico/altaServicio.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Servicio']);
    }

    /**
     * @Route("/servicios/editar/{id}", name="editar_servicio")
     */
    public function editarServicioAction($id)
    {        
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->find($id);
        $url = $this->generateUrl('editar_servicio_procesar', ['id' => $id]);
        $form = $this->getFormAltaServicio($servicio, $url);

        return $this->render('@Gestion/trafico/altaServicio.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Servicio']);
    }

    /**
     * @Route("/servicios/editarprocesar/{id}", name="editar_servicio_procesar", methods={"POST"})
     */
    public function procesarEditarServicioAction($id, Request $request)
    {
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->find($id);
        $url = $this->generateUrl('editar_servicio_procesar', ['id' => $id]);
        $form = $this->getFormAltaServicio($servicio, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicio);
            $em->flush();
            $this->addFlash(
                                'success',
                                'El servicio  ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('lista_servicios');
        }
        return $this->render('@Gestion/trafico/altaServicio.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Servicio']);
    }

    private function getFormAltaServicio($servicio, $url)
    {
        $user = $this->getUser();
        return $this->createForm(ServicioType::class, 
                                 $servicio, 
                                 ['usuario' => $user, 'action' => $url,'method' => 'POST', 'estructura' => $this->get('session')->get('estructura')]);
    }

    /**
     * @Route("/servicios/altaprocesar", name="alta_servicio_procesar", methods={"POST"})
     */
    public function procesarAltaServicioAction(Request $request)
    {
        $servicio = new Servicio();
        $url = $this->generateUrl('alta_servicio_procesar');
        $form = $this->getFormAltaServicio($servicio, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
        	$em = $this->getDoctrine()->getManager();
        	$em->persist($servicio);
        	$em->flush();
        	/*$this->addFlash(
					            'success',
					            'El servicio '.$servicio.', ha sido generado exitosamente!'
					        );*/
        	return $this->redirectToRoute('alta_turnos', ['id' => $servicio->getId()]);
        }
        return $this->render('@Gestion/trafico/altaServicio.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Servicio']);
    }

    /**
     * @Route("/servicios/lista", name="lista_servicios", methods={"POST", "GET"})
     */
    public function listarServicioAction(Request $request)
    {
        $estructura = $this->get('session')->get('estructura');
        $form = $this->createForm(SelectClienteType::class, null,  ['estructura' => $estructura]);
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            $data = $form->getData();
            $repository = $this->getDoctrine()->getManager()->getRepository(Servicio::class);
            $servicios = $repository->getServiciosCliente($data['clientes'], $estructura);
            return $this->render('@Gestion/trafico/listadoServicios.html.twig', ['servicios' => $servicios, 'form' => $form->createView()]);
        }
        return $this->render('@Gestion/trafico/listadoServicios.html.twig', ['form' => $form->createView()]);
    }



    /**
     * @Route("/turnos/alta/{id}", name="alta_turnos")
     */
    public function altaTurnoAction($id)
    {
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->find($id);
        $turno = new Turno();
        $url = $this->generateUrl('alta_turnos_procesar', ['id' => $servicio->getId()]);
        $form = $this->getFormAltaTurno($turno, $servicio, $url);

        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Agregar Turno a Servicio']);
    }

    private function getFormAltaTurno($turno, $servicio, $url)
    {
        return $this->createForm(TurnoType::class, $turno, 
        						['servicio' => $servicio, 'action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/turno/altaproc/{id}", name="alta_turnos_procesar", methods={"POST"})
     */
    public function procesarAltaTurnoAction($id, Request $request)
    {
        $servicio = $this->getDoctrine()->getRepository(Servicio::class)->find($id);
        $turno = new Turno();
        $url = $this->generateUrl('alta_turnos_procesar', ['id' => $servicio->getId()]);
        $form = $this->getFormAltaTurno($turno, $servicio, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($turno);
            $em->flush();
            $this->addFlash(
                                'success',
                                'El turno ha sido generado exitosamente!'
                            );
            return $this->redirectToRoute('alta_turnos', ['id' => $servicio->getId()]);
        }
        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Agregar Turno a Servicio']);
    }

    /**
     * @Route("/turnos/editar/{tno}", name="editar_turno")
     */
    public function editarTurnoAction($tno)
    {
        $turno = $this->getDoctrine()->getRepository(Turno::class)->find($tno);
        $servicio = $turno->getServicio();
        $url = $this->generateUrl('editar_turno_procesar', ['tno' => $turno->getId()]);
        $form = $this->getFormAltaTurno($turno, $servicio, $url);

        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['edit' => true, 'servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Modificar Turno']);
    }

    /**
     * @Route("/turno/editarproc/{tno}", name="editar_turno_procesar", methods={"POST"})
     */
    public function procesarEditarTurnoAction($tno, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $turno = $em->getRepository(Turno::class)->find($tno);
        $servicio = $turno->getServicio();
        $url = $this->generateUrl('editar_turno_procesar', ['tno' => $turno->getId()]);

        $form = $this->getFormAltaTurno($turno, $servicio, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $em->flush();
            $this->addFlash(
                                'success',
                                'El turno ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_turnos', ['id' => $servicio->getId()]);
        }
        return $this->render('@Gestion/trafico/altaTurno.html.twig', ['edit' => true, 'servicio' => $servicio, 'form' => $form->createView(), 'label' => 'Modificar Turno']);
    }

    ////////////////ABM Unidades///////////////////////
    /**
     * @Route("/segvial/unidades/alta", name="alta_unidad", methods={"GET", "POST"})
     */
    public function altaUnidadAction(Request $request)
    {
        $unidad = new Unidad();
        $form = $this->getFormAltaUnidad($unidad, '');
        if ($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $user = $this->getUser();
                if (($user->getPerfil()) && ($user->getPerfil()->getPerfil() == 'PERFIL_SEGVIAL'))
                {
                    $unidad->setConfirmado(true);
                }
                $em = $this->getDoctrine()->getManager();
                $em->persist($unidad);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'La unidad ha sido almacenada exitosamente!'
                                );
                return $this->redirectToRoute('alta_unidad');
            }
        }

        return $this->render('@Gestion/segVial/altaUnidad.html.twig', ['form' => $form->createView(), 'label' => 'Agregar Turno a Servicio']);
    }

    private function getFormAltaUnidad($unidad, $url)
    {
        return $this->createForm(UnidadType::class, 
                                 $unidad, 
                                 ['user' => $this->getUser(), 'action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/segvial/unidades/edit/{id}", name="editar_unidad")
     */
    public function editarUnidadAction($id)
    {
        $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($id);
        $url = $this->generateUrl('procesar_editar_unidad', ['id' => $id]);
        $form = $this->getFormAltaUnidad($unidad, $url);

        return $this->render('@Gestion/segVial/altaUnidad.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Unidad']);
    }

    /**
     * @Route("/segvial/unidades/editprs/{id}", name="procesar_editar_unidad", methods={"POST"})
     */
    public function procesarEditarUnidadAction($id, Request $request)
    {
        $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($id);
        $url = $this->generateUrl('procesar_editar_unidad', ['id' => $id]);
        $form = $this->getFormAltaUnidad($unidad, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $user = $this->getUser();
            if (($user->getPerfil()) && ($user->getPerfil()->getPerfil() == 'PERFIL_SEGVIAL'))
            {
                $unidad->setConfirmado(true);
            }
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                                'success',
                                'La unidad ha sido modificada exitosamente!'
                            );
            return $this->redirectToRoute('lista_unidades');
        }
        return $this->render('@Gestion/segVial/altaUnidad.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Unidad']);
    }

    /**
     * @Route("/segvial/unidades/lista", name="lista_unidades")
     */
    public function listarUnidadesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Unidad::class);
        $unidades = $repository->getUnidades();
        return $this->render('@Gestion/segVial/listaUnidades.html.twig', ['unidades' => $unidades]);
    }

    ////////////////ABM Propietarios///////////////////////
    /**
     * @Route("/rrhh/propietarios/alta", name="alta_propietario", methods={"GET", "POST"})
     */
    public function altaPropietarioAction(Request $request)
    {
        $propietario = new Propietario();
        $form = $this->getFormAltaPropietario($propietario, '');
        if ($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($propietario);
                $em->flush();
                $this->addFlash(
                                    'success',
                                    'El propietario ha sido almacenado exitosamente!'
                                );
                return $this->redirectToRoute('alta_propietario');
            }
        }

        $propietarios = $this->getDoctrine()->getRepository(Propietario::class)->getPropietarios();

        return $this->render('@Gestion/rrhh/altaPropietario.html.twig', ['empleadores' => $propietarios, 'form' => $form->createView(), 'label' => 'Nuevo']);
    }

    private function getFormAltaPropietario($propietario, $url)
    {
        return $this->createForm(PropietarioType::class, 
                                 $propietario, 
                                 ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/rrhh/propietarios/edit/{id}", name="editar_propietario")
     */
    public function editarPropietarioAction($id)
    {
        $propietario = $this->getDoctrine()->getRepository(Propietario::class)->find($id);
        $url = $this->generateUrl('procesar_editar_propietario', ['id' => $id]);
        $form = $this->getFormAltaPropietario($propietario, $url);
        return $this->render('@Gestion/rrhh/altaPropietario.html.twig', ['edit' => true, 'form' => $form->createView(), 'label' => 'Modificar']);
    }

    /**
     * @Route("/rrhh/propietarios/editprc/{id}", name="procesar_editar_propietario", methods={"POST"})
     */
    public function procesarEditarPropietarioAction($id, Request $request)
    {
        $propietario = $this->getDoctrine()->getRepository(Propietario::class)->find($id);
        $url = $this->generateUrl('procesar_editar_propietario', ['id' => $id]);
        $form = $this->getFormAltaPropietario($propietario, $url);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                                'success',
                                'El propietario ha sido modificado exitosamente!'
                            );
            return $this->redirectToRoute('alta_propietario');
        }
        return $this->render('@Gestion/rrhh/altaPropietario.html.twig', ['edit' => true, 'form' => $form->createView(), 'label' => 'Modificar']);
    }
}
