<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 10/01/17
 * Time: 10:12
 */

namespace AppBundle\Controller;

use Mailgun\Mailgun;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin", name="admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("", name="admin")
     */
    public function indexAction(Request $request)
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->findAll();
        $resultStructures = $this->getDoctrine()->getRepository('AppBundle:User')->findAllByStructure();
        $tournaments = $this->getDoctrine()->getRepository('AppBundle:Tournament')->findAll();
        
        $structures = [];
        foreach ($resultStructures as $resultStructure) {
            $structure = [];
            $numberOfUserByStructure = count($this->getDoctrine()->getRepository('AppBundle:User')->findBy(['structurename' => $resultStructure['userstructure']]));
            $structure['players'] = $resultStructure[1];
            $structure['name'] = $resultStructure['userstructure'];
            $structure['teams'] = $numberOfUserByStructure;

            array_push($structures, $structure);
        }

        return $this->render('admin/index.html.twig',[
            'players' => $players,
            'structures' => $structures,
            'users' => $users,
            'tournaments' => $tournaments
        ]);
    }
}