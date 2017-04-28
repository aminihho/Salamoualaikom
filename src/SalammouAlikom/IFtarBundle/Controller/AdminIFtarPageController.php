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

class AdminIFtarPageController extends Controller
{

    public function indexAction(Request $request){


        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
        return $this->render('IFtarBundle:Admin:Admin.html.twig', ['data' => $data]);

    }


    /**
     * This Function set the Quantity of The Resource Of 0
     * @param Request $request
     * @param $id
     */
   public function deleteAction (Request $request , $id, $resource ){
        // switch Resource do  the Action set qte of the Resource 0
       $data = null;
        if( $request->isXmlHttpRequest() ){
            $em = $this->getDoctrine()->getManager();
            $iftar_table = $em->getRepository('IFtarBundle:iftar_table');

            $update_object = $iftar_table->findOneBy( ['id' => $id] );

            if( $update_object !== null ){
                switch( $resource ){
                    case 'food':
                        $update_object->setFood(false);
                        $update_object->setPersonFoodQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'soope':
                        $update_object->setSoope(false);
                        $update_object->setPersonSoopeQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'salade':
                        $update_object->setSalad(false);
                        $update_object->setPersonSaladQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'milk':
                        $update_object->setMilk(false);
                        $update_object->setMilkQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'water':
                        $update_object->setWatter(false);
                        $update_object->setWatterQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'drink':
                        $update_object->setAnotherDrink(false);
                        $update_object->setAnotherDrinkQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'dattel':
                        $update_object->setDattel(false);
                        $update_object->setDattelQte(0);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;


                }
            }


        }

   }

    /**
     * This Function update the Quantity of The Resource  Of x
     * @param Request $request
     * @param $id, $resource
     */
    public function updateAction (Request $request , $id, $resource, $new_val ){
        // switch Resource do  the Action set qte of the Resource of x and x>0
        if($request->isXmlHttpRequest()){
            $new_val = (int)$new_val;

            $em = $this->getDoctrine()->getManager();
            $iftar_table = $em->getRepository('IFtarBundle:iftar_table');

            $update_object = $iftar_table->findOneBy( ['id' => $id] );

            if( $update_object !== null ){
                switch( $resource ){
                    case 'food':

                        $update_object->setPersonFoodQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'soope':
                        $update_object->setPersonSoopeQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'salade':
                        $update_object->setPersonSaladQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'milk':
                        $update_object->setMilkQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'water':
                        $update_object->setWatterQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'drink':
                        $update_object->setAnotherDrinkQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;
                    case 'dattel':
                        $update_object->setDattelQte($new_val);
                        $em->persist($update_object);
                        $em->flush();
                        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
                        return new Response($data);
                        break;


                }
            }


            $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
            return new Response($data);

        }

    }


    public function createPdfForIftar(Request $request, $data){
        //$pdfGenerator = $this->get('knp_snappy.pdf');
        //$pdfGenerator->getInternalGenerator()->setTimeout(3);



    }

    public function createTableIFtarAction(Request $request){





        $data = $this->forward('IFtarBundle:Default:listeAllDonatedPeopleForRamdhan')->getContent();
        $html = $this->renderView('IFtarBundle:Admin:IftarTable.html.twig', ['data' => $data]);
        return $this->render('IFtarBundle:Admin:IftarTable.html.twig', ['data' => $data]);

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