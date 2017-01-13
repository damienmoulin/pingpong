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
        return $this->render('default/index.html.twig', [
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/timer/{user}", name="timer")
     */
    public function timerAction(User $user)
    {
        return $this->render('default/timer.html.twig', [
            'user' => $user
        ]);
    }
}
