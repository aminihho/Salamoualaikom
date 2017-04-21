<?php
/**
 * Created by PhpStorm.
 * User: kourda
 * Date: 4/19/17
 * Time: 10:45 PM
 */

namespace SalammouAlikom\IFtarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

// Form Type
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PrayerController extends Controller
{

    public function indexAction( Request $request ) {
        return $this->render('IFtarBundle:Default:/Prayer/base.html.twig');
    }


}