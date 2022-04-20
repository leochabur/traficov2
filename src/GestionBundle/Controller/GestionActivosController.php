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
use GestionBundle\Entity\segVial\opciones\HabilitacionUnidad;
use GestionBundle\Form\segVial\opciones\HabilitacionType;
use GestionBundle\Entity\segVial\opciones\MarcaChasis;
use GestionBundle\Form\segVial\opciones\MarcaChasisType;
use GestionBundle\Entity\segVial\opciones\UbicacionMotor;
use GestionBundle\Form\segVial\opciones\UbicacionMotorType;


/**
 * @Route("/activos")
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

    ////////////////UTILS///////////////////

    private function validateEntity($entity)
    {
        $validator = $this->validator;//get('validator');

        $groups = ['general'];


        $errors = $validator->validate($entity, null, $groups);

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
        return $details;
    }

    private function gestonarRequest(Request $request, $class, $classType, $id)
    {
        $em = $this->getDoctrine()->getManager();
        if ($id)
        {
            $entity = $em->find($class, $id);
        }
        else
        {
            $entity = new $class();
        }
        $form = $this->createForm($classType, $entity); //$this->getFormAltaMarcaChasis($entity);
        $form->handleRequest($request);
        $errors = $this->validateEntity($entity);
        if (count($errors))
        {
            return new JsonResponse(['ok' => false, 'errors' => $errors]);
        }    
        try
        {
            if (!$id)
            {
                $em->persist($entity);
            }
            $em->flush();
            return new JsonResponse(['ok' => true]);
        }
        catch (\Exception $e) { return new JsonResponse(['ok' => false]);}
    }

    /////CALIDAD UNIDAD
    /**
     * @Route("/catalogs/calidaduda", name="activos_gestion_catalogos_calidad_unidad")
     */
    public function gestionCatalogosCalidadUnidad()
    {
        $em = $this->getDoctrine();

        $data = $em->getRepository(CalidadUnidad::class)->findAll();

        $form = $this->createForm(CalidadUnidadType::class, new CalidadUnidad());

        return $this->render('gestion/activos/opciones/abmCalidadUnidad.html.twig', ['form' => $form->createView() ,'calidades' => $data]);
    }

    /**
     * @Route("/catalogs/calidaduda/procesar/{id}", name="activos_gestion_catalogos_calidad_unidad_procesar")
     */
    public function gestionCatalogosCalidadUnidadProcesar($id = 0, Request $request)
    {
        return $this->gestonarRequest($request, CalidadUnidad::class, CalidadUnidadType::class, $id);
    }

    ///////////////

    //////////////Ubicacion Motor
    /**
     * @Route("/catalogs/ubicacion", name="activos_gestion_catalogos_ubicacion_motor")
     */
    public function gestionCatalogosUbicacionMotor()
    {
        $em = $this->getDoctrine();

        $data = $em->getRepository(UbicacionMotor::class)->findAll();

        $form = $this->createForm(UbicacionMotorType::class, new UbicacionMotor());

        return $this->render('gestion/activos/opciones/ubicacionMotor.html.twig', ['form' => $form->createView() ,'ubicaciones' => $data]);
    }

    /**
     * @Route("/catalogs/ubicacion/procesar/{id}", name="activos_gestion_catalogos_ubicacion_procesar")
     */
    public function gestionCatalogosUbicacionProcesar($id = 0, Request $request)
    {
        return $this->gestonarRequest($request, UbicacionMotor::class, UbicacionMotorType::class, $id);
    }

    /////////////////////
    //////////////TIPO MOTOR
    /**
     * @Route("/catalogs/tipomotor", name="activos_gestion_catalogos_tipo_motor")
     */
    public function gestionCatalogosTipoMotor()
    {
        $em = $this->getDoctrine();

        $data = $em->getRepository(TipoMotor::class)->findAll();

        $form = $this->createForm(TipoMotorType::class, new TipoMotor());

        return $this->render('gestion/activos/opciones/abmTipoMotor.html.twig', ['form' => $form->createView() ,'tipos' => $data]);
    }

    /**
     * @Route("/catalogs/tipomotor/procesar/{id}", name="activos_gestion_catalogos_tipo_motor_procesar")
     */
    public function gestionCatalogosTipoMotorProcesar($id = 0, Request $request)
    {
        return $this->gestonarRequest($request, TipoMotor::class, TipoMotorType::class, $id);
    }

    ///////////////////////

    //////////////////MARCA CHASIS

    /**
     * @Route("/catalogs/marcaschasis", name="activos_gestion_catalogos_marcas_chasis")
     */
    public function gestionCatalogosMarcasChasis(Request $request)
    {
        $em = $this->getDoctrine();
        $data = $em->getRepository(MarcaChasis::class)->getAllMarcas();

        $form = $this->createForm(MarcaChasisType::class, new MarcaChasis());

        return $this->render('gestion/activos/opciones/marcasChasis.html.twig', ['form' => $form->createView() ,'marcas' => $data]);
    }

    /**
     * @Route("/catalogs/marcaschasis/procesar/{id}", name="activos_gestion_catalogos_marcas_chasis_procesar")
     */
    public function gestionCatalogosMarcasChasisProcesar($id = 0, Request $request)
    {
        return $this->gestonarRequest($request, MarcaChasis::class, MarcaChasisType::class, $id);
    }
    ///////////////FIN MARCA CHASUS


    //////administrar tipos habilitaciones
    /**
     * @Route("/catalogs/tipohab", name="activos_gestion_catalogos_tipos_habilitacion_cnrt")
     */
    public function gestionCatalogosTipoHabCNRT(Request $request)
    {
        $em = $this->getDoctrine();
        $data = $em->getRepository(HabilitacionUnidad::class)->findAll();

        $form = $this->createForm(HabilitacionType::class, new HabilitacionUnidad());

        return $this->render('gestion/activos/opciones/ambHabilitacionesUnidades.html.twig', ['form' => $form->createView() ,'habilitaciones' => $data]);
    }

    /**
     * @Route("/catalogs/tipohab/procesar/{id}", name="activos_gestion_catalogos_tipos_habilitacion_cnrt_procesar")
     */
    public function gestionCatalogosTipoHabCNRTProcesar($id = 0, Request $request)
    {
        return $this->gestonarRequest($request, HabilitacionUnidad::class, HabilitacionType::class, $id);
    }



    //////////////////////
    /////////CATALOGOS CIUDADES

    private function getFormAltaCiudad($ciudad)
    {
        return $this->createForm(CiudadType::class, $ciudad);
    }

    /**
     * @Route("/catalogs/ciudades", name="activos_gestion_catalogos_ciudades")
     */
    public function gestionCatalogosCiudades(Request $request)
    {
        $em = $this->getDoctrine();
        $data = $em->getRepository(Ciudad::class)->getAllCiudades();

        $form = $this->getFormAltaCiudad(new Ciudad());

        return $this->render('gestion/activos/opciones/abmCiudades.html.twig', ['form' => $form->createView() ,'ciudades' => $data]);
    }


    /**
     * @Route("/catalogs/ciudades/procesar/{id}", name="activos_gestion_catalogos_ciudades_procesar")
     */
    public function gestionCatalogosCiudadesProcesar($id = 0, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($id)
        {
            $ciudad = $em->find(Ciudad::class, $id);
        }
        else
        {
            $ciudad = new Ciudad();
        }

        $form = $this->getFormAltaCiudad($ciudad);
        $form->handleRequest($request);

        $errors = $this->validateEntity($ciudad);

        if (count($errors))
        {
            return new JsonResponse(['ok' => false, 'errors' => $errors]);
        }
        

        try
        {
            if (!$id)
            {
                $em->persist($ciudad);
            }

            $em->flush();
            return new JsonResponse(['ok' => true]);
        }
        catch (\Exception $e) { return new JsonResponse(['ok' => false]);}
    }


    //////////////////////CIUDADES
    /**
     * @Route("/catalogs", name="activos_gestion_catalogos")
     */
    public function gestionCatalogosVentas()
    {
       // $em = $this->getDoctrine();
       // $abmTipoUnidad = $this->getFormListAltaTipoUnidad(true);

        return $this->render('gestion/activos/catalogos.html.twig');
    }


    ///////////////////TIPOS UNIDADES

    private function getFormAltaTipoUnidad($tipo)
    {
        return $this->createForm(TipoUnidadType::class, $tipo);
    }


    /**
     * @Route("/catalogs/tiposunidad", name="activos_gestion_catalogos_tipo_unidad")
     */
    public function gestionCatalogosTiposUnidades(Request $request)
    {
        $em = $this->getDoctrine();
        $data = $em->getRepository(TipoUnidad::class)->getTiposUnidades();

        $form = $this->getFormAltaTipoUnidad(new TipoUnidad());

        return $this->render('gestion/activos/opciones/abmTipoUnidades.html.twig', ['form' => $form->createView() ,'tipos' => $data]);
    }


   /* protected function getErrorMessages(\Symfony\Component\Form\Form $form) 
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
    }*/

    /**
     * @Route("/catalogs/tiposunidad/procesar/{id}", name="activos_gestion_catalogos_tipo_unidad_procesar", methods={"POST"})
     */
    public function gestionCatalogosTipoUnidadProcesar($id = 0, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($id)
        {
            $tipo = $em->find(TipoUnidad::class, $id);
        }
        else
        {
            $tipo = new TipoUnidad();
        }

        $form = $this->getFormAltaTipoUnidad($tipo);
        $form->handleRequest($request);

        $errors = $this->validateEntity($tipo);

        if (count($errors))
        {
            return new JsonResponse(['ok' => false, 'errors' => $errors]);
        }
        

        try
        {
            if (!$id)
            {
                $em->persist($tipo);
            }

            $em->flush();
            return new JsonResponse(['ok' => true]);
        }
        catch (\Exception $e) { return new JsonResponse(['ok' => false]);}
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
        if ((!$id) || (!is_numeric($id)))
        {
            return $this->redirectToRoute('activos_listado_unidades');
        }

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

        return $this->render('gestion/activos/altaUnidad.html.twig', ['paginator' => $pager, 'image' => $image, 'edit' => true, 'form' => $form->createView(), 'label' => 'Actualizar Unidad']);
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
            if (!$id) //quiere decir que esta dando de alta debe realizar un persist
            {
                $em->persist($unidad);
            }
            $em->flush();

            if (!$id)
            {
                //return $this->redirect($this->generateUrl('activos_documentacion_unidades', ['id' => $unidad->getId()]));
            }
            
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

    /**
     * @Route("/unidades/deletedoc/{id}", name="activos_delete_documento")
     */
    public function deleteDocumentoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $documento = $em->find(DocumentoAdjunto::class, $id);
        try
        {
            $path = $documento->getImagen();
            $em->remove($documento);
            $em->flush();
            unlink($path);
            return new JsonResponse(['ok' => true]);
        }
        catch (\Exception $e){
                                return new JsonResponse(['ok' => false, 'message' => $e->getMessage()]);
        }
    }

}
