<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use GestionBundle\Entity\rrhh\TipoVencimientoPersonal;
use GestionBundle\Form\rrhh\TipoVencimientoPersonalType;


/**
 * @Route("/rrhh")
 */

class GestionRRHHController extends AbstractController
{

    private function getFormAltaTipoLicencia($tipo, $url)
    {
        return $this->createForm(TipoVencimientoPersonalType::class, $tipo, ['action' => $url,'method' => 'POST']);
    }

    /**
     * @Route("/opciones/newtpovto", name="rrhh_nuevo_tipo_vencimiento", methods={"POST", "GET"})
     */
    public function altaTipoVencimientoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tipos = $em->getRepository(TipoVencimientoPersonal::class)->findBy([], ['tipo' => 'ASC']);

        $tipo = new TipoVencimientoPersonal();
        $form = $this->getFormAltaTipoLicencia($tipo, '');

        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $em->persist($tipo);
                $em->flush();
                $this->addFlash('success', 'Tipo de Vencimiento generado exitosamente!');
                return $this->redirectToRoute('rrhh_nuevo_tipo_vencimiento');
            }
        }
        return $this->render('@Gestion/rrhh/opciones/altaTipoVencimiento.html.twig', 
                            ['tipos' => $tipos, 'label' => 'Alta', 'form' => $form->createView()]);
    }

}
