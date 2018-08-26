<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class DefaultController extends Controller
    {
        /**
         * @Route("/get/messagse")
         * @Method({"GET"})
         */
        public function index()
        {
            return $this->json(array('message' => 'success'));
        }
    }
?>