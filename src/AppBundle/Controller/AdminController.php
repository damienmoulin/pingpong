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

        $structures = [];
        foreach ($resultStructures as $resultStructure) {
            $structure = [];
            $numberOfUserByStructure = count($this->getDoctrine()->getRepository('AppBundle:User')->findBy(['structurename' => $resultStructure['userstructure']]));
            $structure['players'] = $resultStructure[1];
            $structure['name'] = $resultStructure['userstructure'];
            $structure['teams'] = $numberOfUserByStructure;

            array_push($structures, $structure);
        }

        dump($structures);

        return $this->render('admin/index.html.twig',[
            'players' => $players,
            'structures' => $structures,
            'users' => $users
        ]);
    }

    /**
     * @Route("/mailer", name="admin_mail")
     */
    public function mailAction()
    {
        $message = new Mailgun('key-669533d09c44f75f332c453fb8cdf700');
        $domain = "sandbox9d6a022a47aa440d8c03ee8ac68aa807.mailgun.org";

        $message->sendMessage($domain, array('from'    => 'bob@example.com',
            'to'      => 'zabaradjan@gmail.com',
            'subject' => 'Test Email',
            'text'    => 'Success ?'));
        dump($message);
    }
}