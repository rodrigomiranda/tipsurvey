<?php

namespace Tipddy\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TipddyBackendBundle:Default:index.html.twig');
    }
}
