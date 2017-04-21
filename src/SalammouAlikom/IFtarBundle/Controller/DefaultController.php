<?php

namespace SalammouAlikom\IFtarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
// entity
use SalammouAlikom\IFtarBundle\Entity\iftar_table;
// Form Type
use SalammouAlikom\IFtarBundle\Form\IftarType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Form;




class DefaultController extends Controller
{

    /**
     * @Route("/index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        //$container = $this->get('service_container');
        //$container->get('knp_snappy.pdf')->generate('http://www.google.fr', '/home/kourda/Desktop/google.pdf');

       $iftarEntity = new iftar_table();
       $form = $this->createIftarForm($iftarEntity);
       $data = $this->listeAllDonatedPeopleForRamdhanAction()->getContent();

        return $this->render('IFtarBundle:Default:IndexPage/index.html.twig', ['iftar_form' => $form->createView(), 'data' => $data]);
    }


    private function createIftarForm(iftar_table $entity)
    {
        $form = $this->createForm(IftarType::class, $entity, array(
            'action' => $this->generateUrl('i_ftar_add_new_donate'),
            'method' => 'POST',
        ));

        return $form;
    }



    public function addnewDonateAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $new_doante = new iftar_table();
        $form = $this->createForm(IftarType::class, $new_doante);
        $form->handleRequest($request);


        if (!$form->isValid()) {
            $array = array(
                'status' => '400',
                'message' => 'Invalid form',
                'data' => $this->getErrorMessagesForm($form)
            );
            $response =  new JsonResponse($array);
            return  new Response($response->getContent());
        }

        if($form->isValid()){
            $qte = $form->get('personFoodQte')->getData() + $form->get('personSoopeQte')->getData() + $form->get('personSaladQte')->getData()+ $form->get('dattelQte')->getData() + $form->get('watterQte')->getData() + $form->get('milkQte')->getData()+ $form->get('anotherDrink')->getData();
            if ($qte === 0 ){
                $data = [];
                $data = ['error_descrition' => 'In u must dontate 1..100 for food, .... Or 1.12 for drinks and Milk Or 1..4 for Dattel' ];

                $array = array(
                    'status' => '400',
                    'message' => 'Invalid Input',
                    'data' => $data
                );
                $response =  new JsonResponse($array);
                return  new Response($response->getContent());

            }
            $soope_qte = $form->get('personSoopeQte')->getData();
            $food_qte =  $form->get('personFoodQte')->getData();
            $salad_qte = $form->get('personSaladQte')->getData();
            $milk_qte = $form->get('milkQte')->getData();
            $drink_qte = $form->get('anotherDrinkQte')->getData();
            $water_qte = $form->get('watterQte')->getData();
            $dattel_qte = $form->get('dattelQte')->getData();



            $objects = $em->getRepository('IFtarBundle:iftar_table')->findBy(['startDate' => new \DateTime($form->get('startDate')->getData())]);
            $data = $this->getTheAvailabeFoodAndDrink($objects);
            $send_data = [];
            if (( $milk_qte > $data[ "milk_qte" ] ) || ( $water_qte > $data[ "water_qte" ] ) || ( $drink_qte > $data[ "drink_qte" ] ) || ( $dattel_qte > $data[ "dattel_qte" ] ) || ( $soope_qte > $data[ "soope_qte" ] ) || ( $food_qte > $data[ "food_qte" ] ) || ( $salad_qte > $data[ "salad_qte" ]) ){

                $send_data = $this->GiveMeTheRestQteOfResource($data, 'milk_qte', 'milkQte',$milk_qte ,$send_data );
                $send_data = $this->GiveMeTheRestQteOfResource($data, 'water_qte', 'watterQte' ,$water_qte ,$send_data );
                $send_data = $this->GiveMeTheRestQteOfResource($data, 'drink_qte', 'anotherDrinkQte',$drink_qte ,$send_data );
                $send_data = $this->GiveMeTheRestQteOfResource($data, 'dattel_qte', 'dattelQte',$dattel_qte ,$send_data );
                $send_data = $this->GiveMeTheRestQteOfResource($data, 'soope_qte', 'personSoopeQte',$soope_qte ,$send_data );
                $send_data = $this->GiveMeTheRestQteOfResource($data, 'food_qte', 'personFoodQte',$food_qte ,$send_data );
                $send_data = $this->GiveMeTheRestQteOfResource($data, 'salad_qte', 'personSaladQte',$salad_qte ,$send_data );


                $array = array(
                    'status' => '400',
                    'message' => 'Invalid Input',
                    'data' => $send_data
                );
                $response =  new JsonResponse($array);
                return  new Response($response->getContent());
            }


            $new_doante->setFirstName($form->get('firstName')->getData());
            $new_doante->setLastName($form->get('lastName')->getData());
            $new_doante->setTelefonnummer($form->get('telefonnummer')->getData());
            $new_doante->setSoope($form->get('soope')->getData());
            $new_doante->setPersonSoopeQte($form->get('personSoopeQte')->getData());
            $new_doante->setFood($form->get('food')->getData());
            $new_doante->setPersonFoodQte($form->get('personFoodQte')->getData());
            $new_doante->setSalad($form->get('salad')->getData());
            $new_doante->setPersonSaladQte($form->get('personSaladQte')->getData());
            $new_doante->setStartDate(new \DateTime($form->get('startDate')->getData()));
            $new_doante->setEndDate(new \DateTime($form->get('startDate')->getData()));
            $new_doante->setDattel($form->get('dattel')->getData());
            $new_doante->setDattelQte($form->get('dattelQte')->getData());
            $new_doante->setWatter($form->get('watter')->getData());
            $new_doante->setWatterQte($form->get('watterQte')->getData());
            $new_doante->setMilk($form->get('milk')->getData());
            $new_doante->setMilkQte($form->get('milkQte')->getData());
            $new_doante->setPsedoOn($form->get('psedoOn')->getData());
            $new_doante->setPsedoOf($form->get('psedoOf')->getData());
            $new_doante->setAnotherDrink($form->get('anotherDrink')->getData());
            $new_doante->setAnotherDrinkQte($form->get('anotherDrinkQte')->getData());
            // to do later enchala make somme Test for the Inputs:

            // save the new Donate in Datenbank:
            $em->persist($new_doante);
            $em->flush();

            // to do save the new date in the data base.
            $response = new Response(json_encode(['status' => '201','location' => ' write the location of the new Object']));
            $response->headers->set('Content-Type','application/json');
            return $response;
        }
        else{
            $response = new Response(json_encode(['status' => '500','erros' => ' not play with Formular please']));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }

    }


    public function listeAllDonatedPeopleForRamdhanAction(){

        $ramdhan_days =  $this->giveMeTheRamdahnManth();

        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository('IFtarBundle:iftar_table')->findAll();
        $info_all_tagsRamdahn = [];
        for($i = 0; $i < sizeof( $ramdhan_days ); $i++){
            $current_day = $ramdhan_days[$i];
            $current_day = $current_day->getTimestamp();
            $info_of_persons = [];
            $k = 0;
            foreach( $persons as $person ){

                $start_donate_day = $person->getStartDate()->getTimestamp();
                $end_donate_day = $person->getEndDate()->getTimestamp();

                if(($current_day<=$end_donate_day) && ($current_day>= $start_donate_day)){

                    $data = $this->giveMeInfoAboutPerson($person);

                    $label = 'person_'.$k;
                    $info_of_persons[] = [$label => $data];
                    $data = [];
                    $k++;

                }

            }

            $l= $i+1;
            $label = 'tag_'.$l;
            $info_all_tagsRamdahn[] = [$label => ['persons' => $info_of_persons]];
        }
        $ramdhan_days_info = ['tags' => $info_all_tagsRamdahn];

         $json = new JsonResponse($ramdhan_days_info);
        return  new Response($json->getContent());

    }


    private function giveMeInfoAboutPerson($person){

        if( $person->getPsedoOn() === true ){
            $name_person = $person->getFirstName().' '.$person->getLastName();
        }else{
            $name_person = 'pesudo';
        }

        $data = [
            'id' => $person->getId(),
            'pesudo' => $name_person,
            'food' => $person->getFood(),
            'qte_person_day_food' => $person->getPersonFoodQte(),
            'soope' => $person->getSoope(),
            'qte_person_day_soope' => $person->getPersonSoopeQte(),
            'salad' =>$person->getSalad(),
            'qte_person_day_salade' => $person->getPersonSaladQte(),
            'donte_water' => $person->getWatter(),
            'qte_water' => $person->getWatterQte(),
            'donate_milk' => $person->getMilk(),
            'qte_milk' => $person->getMilkQte(),
            'donate_another_drinks' => $person->getAnotherDrink(),
            'qte_another_drinks' =>$person->getAnotherDrinkQte(),
            'donate_dattel' => $person->getDattel(),
            'donate_dattel_qte' => $person->getDattelQte()
        ];

        return $data;
    }

    private function giveMeTheRamdahnManth(){
        $ramdhan_days = [];

        for($i=1; $i<31; $i++){
            $day = '2017-04-'.(string)$i;
            $date = new \DateTime($day);
            $date->format('Y-m-d');
            $ramdhan_days[] = $date;
        }

        return $ramdhan_days;
    }


    // Generate an array contains a key -> value with the errors where the key is the name of the form field
    protected function getErrorMessagesForm( Form $form)
    {
        $errors = array();
        foreach ( $form->getErrors(true, false) as $key){
            $errors[$key->getForm()->getName()] = $key->current()->getMessage();
        }
        return $errors;
      //  return new Response(json_encode($errors));
    }



    private function getTheAvailabeFoodAndDrink( $objects ){
        $arrayData = [];
        $milk_qte = 0;
        $water_qte = 0;
        $drink_qte = 0;
        $dattel_qte = 0;
        $salade_qte = 0;
        $food_qte = 0;
        $soope_qte = 0;
        foreach ( $objects as $object ){
            $milk_qte = $milk_qte + $object->getMilkQte();
            $water_qte = $water_qte + $object->getWatterQte();
            $drink_qte = $drink_qte + $object->getAnotherDrinkQte();
            $dattel_qte = $dattel_qte + $object->getDattelQte();
            $salade_qte = $salade_qte + $object->getPersonSaladQte();
            $food_qte = $food_qte + $object->getPersonFoodQte();
            $soope_qte = $soope_qte + $object->getPersonSoopeQte();
        }
        $total_person_day = $this->container->getParameter('Iftar_Bundle.number_person');
        $total_milk_day = $this->container->getParameter('Iftar_Bundle.total_milk');
        $total_drink_day = $this->container->getParameter('Iftar_Bundle.total_drink');
        $total_water_day = $this->container->getParameter('Iftar_Bundle.total_water');
        $total_dattel_day = $this->container->getParameter('Iftar_Bundle.total_dattel');

       $rest_milk = $this->checkIFWeHaveResourceByDay( $total_milk_day, $milk_qte );
       $rest_water = $this->checkIFWeHaveResourceByDay( $total_water_day, $water_qte );
       $rest_drink = $this->checkIFWeHaveResourceByDay( $total_drink_day, $drink_qte );
       $rest_dattel = $this->checkIFWeHaveResourceByDay( $total_dattel_day, $dattel_qte );
       $rest_soope = $this->checkIFWeHaveResourceByDay( $total_person_day, $soope_qte );
       $rest_food = $this->checkIFWeHaveResourceByDay( $total_person_day, $food_qte );
       $rest_salade = $this->checkIFWeHaveResourceByDay( $total_person_day, $salade_qte );

        $arrayData = [  'milk_qte' => $rest_milk,
                        'water_qte' => $rest_water,
                        'drink_qte' => $rest_drink,
                        'dattel_qte' => $rest_dattel,
                        'soope_qte' => $rest_soope,
                        'food_qte' => $rest_food,
                        'salad_qte' => $rest_salade
        ];
        return $arrayData;
    }


    public function listeMaxDataAction( Request $request ){

        $date_parameter = $request->request->get('date');
        if($date_parameter === null ){
            $date_parameter = '01.04.2017';
        }
        $em = $this->getDoctrine()->getManager();
        $array = explode('.', $date_parameter);
        $new_date = $array[2].'-'.$array[1].'-'.$array[0];
        $date = new \DateTime($new_date);

        $objects = $em->getRepository('IFtarBundle:iftar_table')->findBy(['startDate' => $date]);
        $data = $this->getTheAvailabeFoodAndDrink($objects);

        return new JsonResponse($data);
    }

    private function checkIFWeHaveResourceByDay( $total_resource, $avalaible_resource ){
        $rest = $total_resource - $avalaible_resource;
        if( $rest < 0){
            $rest = 0;
        }
        return $rest;
    }

    private function GiveMeTheRestQteOfResource($data, $index, $key,$submited_qte ,$result ){
        $rest_qte = $data[ $index ];
        $messge = '';
        if( $rest_qte > 0){
            if($submited_qte > $rest_qte ){
                $messge =  'You cannot type more then '. $rest_qte;
                $result[$key] = $messge;
            }

        }
        return $result;
    }

}
