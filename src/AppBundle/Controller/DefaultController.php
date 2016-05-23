<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(RegistrationType::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()
                ->persist($form->getData());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/success", name="task_success")
     */
    public function successAction(Request $request)
    {
        return $this->render('default/success.html.twig');
    }
}
