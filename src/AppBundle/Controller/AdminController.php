<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 10/01/17
 * Time: 10:12
 */

namespace AppBundle\Controller;

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
        return $this->render('admin/index.html.twig',[

        ]);
    }
}