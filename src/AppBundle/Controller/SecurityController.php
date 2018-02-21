<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/admin")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function administrationAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}
