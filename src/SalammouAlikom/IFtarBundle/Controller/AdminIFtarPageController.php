<?php
/**
 * Created by PhpStorm.
 * User: kourda
 * Date: 4/15/17
 * Time: 6:36 PM
 */
namespace SalammouAlikom\IFtarBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminIFtarPageController extends Controller {

    public function createPdfForIftar(Request $request, $data){
        //$pdfGenerator = $this->get('knp_snappy.pdf');
        //$pdfGenerator->getInternalGenerator()->setTimeout(3);



    }

    public function createTableIFtarAction(Request $request){

        /*
         *    <th></th>
            <th>الاكل</th>
            <th>الشربة</th>
            <th>السلطة</th>
            <th>الحليب</th>
            <th>الماء</th>
            <th>عصير</th>

            <th>تمور</th>
         */



        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
        $html = $this->renderView('IFtarBundle:Admin:IftarTable.html.twig', ['data' => $data]);
       // return $this->render('IFtarBundle:Admin:IftarTable.html.twig', ['data' => $data]);

        $filename = sprintf('IftarTable-%s.pdf', date('Y-m-d'));
       return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
        //$this->createPdfForIftar($request, $data);
        //die();


    }

}