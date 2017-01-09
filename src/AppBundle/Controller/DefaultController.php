<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user = new User();

        $register = $this->get('form.factory')->create('AppBundle\Form\RegistrationType', $user);

        dump($register);
        return $this->render('default/index.html.twig', [
            'register' => $register->createView()
        ]);
    }
}
