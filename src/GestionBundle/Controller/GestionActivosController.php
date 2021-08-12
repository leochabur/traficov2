<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use GestionBundle\Entity\ventas\Cliente;
use GestionBundle\Form\ventas\ClienteType;
use Symfony\Component\HttpFoundation\Request;
use GestionBundle\Entity\ventas\Ciudad;
use GestionBundle\Form\ventas\CiudadType;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
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
use GestionBundle\Entity\segVial\opciones\TipoUnidad;
use GestionBundle\Form\segVial\opciones\TipoUnidadType;
use GestionBundle\Entity\segVial\Unidad;
use GestionBundle\Form\segVial\UnidadType;
use DH\Auditor\Provider\Doctrine\Persistence\Reader\Reader;
use DH\Auditor\Provider\Doctrine\DoctrineProvider;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use GestionBundle\Entity\opciones\DocumentoAdjunto;
use GestionBundle\Form\opciones\DocumentoAdjuntoType;

/**
 * @Route("/ventas")
 */

class GestionActivosController extends AbstractController
{

    private $provider, $validator, $params;

    public function __construct(DoctrineProvider $dp, ValidatorInterface $validator, ParameterBagInterface $params)
    {
        $this->provider = $dp;
        $this->validator = $validator;
        $this->params = $params;
    }


    /**
     * @Route("/catalogs", name="activos_gestion_catalogos")
     */
    public function gestionCatalogosVentas()
    {
        $em = $this->getDoctrine();
        $abmTipoUnidad = $this->getFormListAltaTipoUnidad(true);

        return $this->render('gestion/activos/catalogos.html.twig');
    }


    private function getFormAltaTipoUnidad($tipo, $url)
    {
        return $this->createForm(TipoUnidadType::class, $tipo, ['action' => $url,'method' => 'POST']);
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

    /**
     * @Route("/catalogs/tiposunidad/procesar", name="activos_gestion_catalogos_tipo_unidad_procesar", methods={"POST"})
     */
    public function prcesarAltaTipoUnidad(Request $request)
    {
        $tipo = new TipoUnidad();
        $form = $this->getFormAltaTipoUnidad($tipo, $this->generateUrl('activos_gestion_catalogos_tipo_unidad_procesar'));

        $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipo);
            $em->flush();

            if( $request->isXmlHttpRequest()) 
            {
                return new JsonResponse(['status' => true]);
            }
        }

        if( $request->isXmlHttpRequest()) 
        {
            return new JsonResponse(['status' => false, 'errors' => $this->getErrorMessages($form)]);
        }
    }

    /**
     * @Route("/catalogs/tiposunidad/alta", name="activos_gestion_catalogos_tipo_unidad")
     */
    public function getFormListAltaTipoUnidad($response = false)
    {
         $tipos = $this->getDoctrine()->getRepository(TipoUnidad::class)->findBy(array(), array('tipo' => 'ASC'));
         $form = $this->getFormAltaTipoUnidad(new TipoUnidad(), $this->generateUrl('activos_gestion_catalogos_tipo_unidad_procesar'));
         $content = $this->render('gestion/segVial/opciones/altaTipoUnidad.html.twig', ['tipos' => $tipos, 'label' => 'Nuevo', 'form' => $form->createView()]);
         if ($response)
         {
            $response = new Response($content);
            $response->headers->set('X-Robots-Tag','noindex');
            return $response;
         }

         return $content;
    }


////////////////////////manejo de unidades ///////////////////////////////

    /**
     * @Route("/unidades/listar", name="activos_listado_unidades")
     */
    public function listadoUnidadesAction()
    {
        $unidades = $this->getDoctrine()->getRepository(Unidad::class)->getListaUnidades($this->getUser());
        return $this->render('gestion/activos/listadoUnidades.html.twig', ['unidades' => $unidades]);
    }


    /**
     * @Route("/unidades/alta", name="activos_alta_unidad")
     */
    public function getAltaUnidad()
    {
        $unidad = new Unidad();
        $action = $this->generateUrl('activos_procesar_alta_unidad');
        $form = $this->getFormAltaUnidad($unidad, $action);
        return $this->render('gestion/activos/altaUnidad.html.twig', ['form' => $form->createView(), 'label' => 'Nueva Unidad']);
    }

    /**
     * @Route("/unidades/actualizar/{id}", name="activos_actualizar_unidad")
     */
    public function getActualizarUnidad($id)
    {
        $unidad = $this->getDoctrine()->getManager()->find(Unidad::class, $id);
        $action = $this->generateUrl('activos_procesar_alta_unidad', ['id' => $id]);
        $form = $this->getFormAltaUnidad($unidad, $action);
        $image = $unidad->getImagen();


        $reader = new Reader($this->provider);
     /*   $query = $reader->createQuery(Unidad::class, [
            'object_id' => $id,
        ])->execute();*/

        $pager = $reader->paginate($reader->createQuery(Unidad::class, [
            'object_id' => $id,
            'page' => 1,
            'page_size' => Reader::PAGE_SIZE,
        ]), 1, Reader::PAGE_SIZE);

        return $this->render('gestion/activos/altaUnidad.html.twig', ['paginator' => $pager,'image' => $image, 'edit' => true, 'form' => $form->createView(), 'label' => 'Actualizar Unidad']);
    }

    private function getFormAltaUnidad($unidad, $action)
    {
        return $this->createForm(UnidadType::class, 
                                $unidad, 
                                ['action' => $action,'method' => 'POST']);
    }



    /**
     * @Route("/unidades/altaproc/{id}", name="activos_procesar_alta_unidad", methods={"POST"})
     */
    public function procesarAltaUnidadAction($id = 0, Request $request)
    {
        $parameters = [];
        $label = 'Nueva Unidad';
        $unidad = $action = null;
        if ($id)
        {
            $label = 'Actualizar Unidad';
            $parameters['edit'] = true;

            $unidad = $this->getDoctrine()->getManager()->find(Unidad::class, $id);
            $action = $this->generateUrl('activos_procesar_alta_unidad', ['id' => $id]);
          //  $parameters['image'] = $unidad->getImagen();
        }
        else
        {
            $unidad = new Unidad();
            $action = $this->generateUrl('activos_procesar_alta_unidad');
        }
        
        $form = $this->getFormAltaUnidad($unidad, $action);
        $form->handleRequest($request);

        $validator = $this->validator;//get('validator');

        $groups = ['general'];

        if ($this->getUser()->getPerfil()->getPerfil() != 'PERFIL_SEG_VIAL')
        {
            $groups[] = 'tecnical';
            $groups[] = 'inscription';
        }

        $errors = $validator->validate($unidad, null, $groups);

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
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile)
            {
               // $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);

               // $safeFilename = \Transliterator::transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                try
                {
                    $path = $this->params->get('imagesUnidades').'/'.$form->get('interno')->getData()."-".$form->get('propietario')->getData()->getId();
                    $imageFile->move(
                        $path,
                        $newFilename
                    );
                    $unidad->setImagen($path.'/'.$newFilename);
                } 
                catch (\Exception $e) {
                    throw new \Exception($e->getMessage);

                }
            }

            $em = $this->getDoctrine()->getManager();
            if (!$id) //quiere decir que esta dando de ata debe realizar un persist
            {
                $em->persist($unidad);
            }
            $em->flush();
            return $this->redirectToRoute('activos_listado_unidades');
        }

        $parameters['form'] = $form->createView();
        $parameters['errors'] = $details;
        $parameters['label'] = $label;
        return $this->render('gestion/activos/altaUnidad.html.twig', $parameters);
    }

    /**
     * @Route("/unidades/documentacion/{id}", name="activos_documentacion_unidades")
     */
    public function documentacionUnidadesAction($id)
    {
        $unidad = $this->getDoctrine()->getManager()->find(Unidad::class, $id);
        $documento = new DocumentoAdjunto();
        $documentoType = $this->createForm(DocumentoAdjuntoType::class, 
                                           $documento, 
                                           ['method' => 'POST', 'action' => $this->generateUrl('activos_documentacion_unidades_procesar', ['id' => $id])]);
        return $this->render('gestion/activos/documentosUnidades.html.twig', ['unidad' => $unidad, 'docForm' => $documentoType->createView()]);
    }

    /**
     * @Route("/unidades/docproc/{id}", name="activos_documentacion_unidades_procesar", methods={"POST"})
     */
    public function documentacionUnidadesProcesarAction($id, Request $request)
    {
        $unidad = $this->getDoctrine()->getManager()->find(Unidad::class, $id);
        $documento = new DocumentoAdjunto();
        $documentoType = $this->createForm(DocumentoAdjuntoType::class, 
                                           $documento, 
                                           ['method' => 'POST', 'action' => $this->generateUrl('activos_documentacion_unidades_procesar', ['id' => $id])]);
        $documentoType->handleRequest($request);
        $documento->setUnidad($unidad);
        $documento->setImagen($documentoType->get('imageFile')->getData());


        $errors = $this->validator->validate($documento);

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

            $imageFile = $documentoType->get('imageFile')->getData();
            if ($imageFile)
            {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                try
                {
                    $path = $this->params->get('imagesUnidades').'/'.$unidad->getInterno()."-".$unidad->getPropietario()->getId()."/documentos";
                    $imageFile->move(
                        $path,
                        $newFilename
                    );
                    $documento->setImagen($path.'/'.$newFilename);
                } 
                catch (\Exception $e) {
                    throw new \Exception($e->getMessage);

                }
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($documento);
            $em->flush();
            return $this->redirectToRoute('activos_documentacion_unidades', ['id' => $id]);

        }

        return $this->render('gestion/activos/documentosUnidades.html.twig', ['unidad' => $unidad, 'docForm' => $documentoType->createView()]);
    }

}
