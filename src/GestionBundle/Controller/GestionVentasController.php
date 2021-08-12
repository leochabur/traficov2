<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use GestionBundle\Entity\ventas\Cliente;
use GestionBundle\Form\ventas\ClienteType;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Entity\ventas\Ciudad;
use GestionBundle\Form\ventas\CiudadType;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/ventas")
 */

class GestionVentasController extends Controller
{

    ////////////ABM ciudad
    /**
     * @Route("/ciudades/alta", name="alta_ciudad", methods={"POST", "GET"})
     */
    public function altaCiudadAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $ciudades = $em->getRepository(Ciudad::class)->findBy([], ['nombre' => 'ASC']);

        $ciudad = new Ciudad();
        $form = $this->getFormAltaCiudad($ciudad);
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $em->persist($ciudad);
                $em->flush();
                $this->addFlash('success', 'Ciudad almacenada exitosamente!');
                return $this->redirectToRoute('alta_ciudad');
            }
        }

        return $this->render('@Gestion/ventas/altaCiudad.html.twig', ['form' => $form->createView(), 'ciudades' => $ciudades]);
    }

    private function getFormAltaCiudad($ciudad)
    {
        return $this->createForm(CiudadType::class, $ciudad, ['method' => 'POST']);
    }

    /**
     * @Route("/ciudades/altaproc", name="alta_ciudad_procesar", methods={"POST"})
     */
    public function procesarAltaCiudadAction(Request $request)
    {
        $ciudad = new Ciudad();
        $form = $this->getFormAltaCiudad($ciudad);

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ciudad);
            $em->flush();

            if( $request->isXmlHttpRequest()) 
            {
                return new JsonResponse(['status' => true, 
                                         'city' => [ 'id' => $ciudad->getId(), 
                                                     'ciudad' => strtoupper($ciudad->getNombre()), 
                                                     'provincia' => strtoupper($ciudad->getProvincia()->getNombre())
                                                    ]
                                        ]);
            }

            return $this->redirectToRoute('alta_ciudad');
        }

        if( $request->isXmlHttpRequest()) 
        {
            return new JsonResponse(['status' => false, 'errors' => $this->getErrorMessages($form)]);
        }

        return $this->render('@Gestion/ventas/altaCiudad.html.twig', ['form' => $form->createView()]);
    }


    protected function getErrorMessages(\Symfony\Component\Form\Form $form) 
    {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            $errors[] = $error->getMessage();
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }

        return $errors;
    }
    /////////////////////////

    /////////////////MANEJO DE CLIENTES///////////////////////////////////////////

    /**
     * @Route("/cliente/state/{id}", name="cliente_change_state")
     */
    public function changeStateCliente($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->find(Cliente::class, $id);

        if (!$cliente) 
        {
            return new JsonResponse(['status' => false, 'message' => 'Cliente inexistente']);
        }

        $state = $request->request->get('state');
        $cliente->setActivo($state);
        $em->flush();
        return new JsonResponse(['status' => true]);
    }

    /**
     * @Route("/cliente/alta", name="alta_cliente")
     */
    public function altaClienteAction()
    {
        $cliente = new Cliente();
        $action = $this->generateUrl('alta_cliente_procesar');
        $form = $this->getFormAltaCliente($cliente, $action);

        return $this->render('gestion/ventas/altaClienteV2.html.twig', ['form' => $form->createView(), 'label' => 'Nuevo Cliente']);
    }

    private function getFormAltaCliente($cliente, $action)
    {
 		return $this->createForm(ClienteType::class, 
                                $cliente, 
                                ['action' => $action,'method' => 'POST']);
    }

    /**
     * @Route("/cliente/altaproc", name="alta_cliente_procesar", methods={"POST"})
     */
    public function procesarAltaClienteAction(Request $request)
    {
        $cliente = new Cliente();
        $action = $this->generateUrl('alta_cliente_procesar');
        $form = $this->getFormAltaCliente($cliente, $action);
        $form->handleRequest($request);

        $validator = $this->get('validator');

        $groups = ['general'];
        $key = 'financial';

        if ($this->getUser()->getPerfil()->getPerfil() == 'PERFIL_SEGVIAL')
        {
            $groups = ['financial'];
            $key = 'financial';
        }

        $errors = $validator->validate($cliente, null, $groups);

        $details = [];

        if (count($errors))
        {
            
            foreach ($errors as $e)
            {
                $const = $e->getConstraint();
                $groups = $const->groups;

                    $details[$groups[0]][] = $const->message;
                          
            }
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();
            return $this->redirectToRoute('alta_cliente');
        }


        return $this->render('@Gestion/ventas/altaClienteV2.html.twig', ['form' => $form->createView(), 'errors' => $details, 'label' => 'Nuevo Cliente']);
    }

    /**
     * @Route("/cliente/listar", name="listado_clientes")
     */
    public function listadoClientesAction()
    {
        $clientes = $this->getDoctrine()->getRepository(Cliente::class)->getAllClientes();
        return $this->render('gestion/ventas/listadoClientesV2.html.twig', ['clientes' => $clientes]);
    }

    /**
     * @Route("/cliente/editar/{id}", name="editar_cliente")
     */
    public function editarClienteAction($id)
    {
        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);
        $action = $this->generateUrl('editar_cliente_procesar', ['id' => $id]);
        $form = $this->getFormAltaCliente($cliente, $action);
        return $this->render('gestion/ventas/altaClienteV2.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Cliente']);
    }

    /**
     * @Route("/cliente/editarproc/{id}", name="editar_cliente_procesar", methods={"POST"})
     */
    public function procesarEditarClienteAction($id, Request $request)
    {
        $cliente = $this->getDoctrine()->getRepository(Cliente::class)->find($id);
        $action = $this->generateUrl('editar_cliente_procesar', ['id' => $id]);
        $form = $this->getFormAltaCliente($cliente, $action);
        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('listado_clientes');
        }
        return $this->render('@Gestion/ventas/altaCliente.html.twig', ['form' => $form->createView(), 'label' => 'Modificar Cliente']);
    }
/////////////////////////FIN GESTION TRAFICO////////////////////////////////////////////////////////////////


///////////////////////CATALGOSO DE VENTAS/////////////////////////////////////////////////////////////////

    /**
     * @Route("/cliente/catalogs", name="gestion_catalogos")
     */
    public function gestionCatalogosVentas()
    {
        $em = $this->getDoctrine();
        $cityList = $em->getRepository(Ciudad::class)->getAllCiudades($this->get('session')->get('estructura'));
        $upCiudad = $this->getFormAltaCiudad(new Ciudad());
        return $this->render('@Gestion/ventas/catalogos.html.twig', ['cityList' => $cityList, 'fCiudad' => $upCiudad->createView()]);
    }
}
