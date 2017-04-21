<?php
/**
 * Created by PhpStorm.
 * User: kourda
 * Date: 4/7/17
 * Time: 4:33 PM
 */

namespace SalammouAlikom\IFtarBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class IftarType extends AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder
            // first name.
            ->add('firstName', TextType::class, ['attr' => [
                                                            'name' => 'firstName',
                                                            'label' => 'fdfs',
                                                            'style' => 'width: 130px'
            ]])
            // last name.
            ->add('lastName', TextType::class, ['attr' => [
                                                            'name' => 'lastName',
                                                            'style' => 'width: 130px'
            ]])
            //telefonnummer.
            ->add('telefonnummer', TextType::class, ['attr' => [
                'name' => 'telefonnummer',
                'style' => 'width: 130px'
            ]])
            // soope.
            ->add('soope', CheckboxType::class, ['attr' => [
                                                             'name' => 'soope',

            ]])
            // soope Qte:
            ->add('personSoopeQte', IntegerType::class, ['attr' => [
                'name' => 'personSoopeQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 100
            ]])

            // food.
            ->add('food', CheckboxType::class, ['attr' => [
                'name' => 'food'
            ]])
            // food Qte:
            ->add('personFoodQte', IntegerType::class, ['attr' => [
                'name' => 'personFoodQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 100
            ]])

            // Salad.
            ->add('salad', CheckboxType::class, ['attr' => [
                'name' => 'salad'
            ]])
            // salad Qte:
            ->add('personSaladQte', IntegerType::class, ['attr' => [
                'name' => 'personSaladQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 100

            ]])
            // start Date of Donate.
            ->add('startDate', TextType::class, ['attr' => [
                'name' => 'startDate'
            ]])
            // end Date of Donate.
            ->add('endDate', TextType::class, ['attr' => [
                'name' => 'endDate',
                'style' => 'display:none'
            ]])
            // if some one donate dattel.
            ->add('dattel', CheckboxType::class, ['attr' => [
                'name' => 'dattel'
            ]])
            // qte of donated dattel.
            ->add('dattelQte', IntegerType::class, ['attr' => [
                'name' => 'dattelQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 4
            ]])
            // if someone donate watter.
            ->add('watter', CheckboxType::class, ['attr' => [
                'name' => 'watter'
            ]])
            // Qte of donated Water.
            ->add('watterQte', IntegerType::class, ['attr' => [
                'name' => 'watterQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 12
            ]])
            // if some one donate milk for ramdathan.
            ->add('milk', CheckboxType::class, ['attr' => [
                'name' => 'milk'
            ]])
            // Qte of donated Milk.
            ->add('milkQte', IntegerType::class, ['attr' => [
                'name' => 'milkQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 12
            ]])
            // if somme one want to write his name in the index Table of person who donated for ramathan.
            ->add('psedoOn', CheckboxType::class, ['attr' => [
                'name' => 'psedoOn',

            ]])

            ->add('psedoOf', CheckboxType::class, ['attr' => [
                'name' => 'psedoOf',
                'style' => 'display:none'
            ]])
            // if someone want to donate another drink .
            ->add('anotherDrink', CheckboxType::class, ['attr' => [
                'name' => 'anotherDrink'
            ]])
            // Qte of the donated drink.
            ->add('anotherDrinkQte', IntegerType::class, ['attr' => [
                'name' => 'anotherDrinkQte',
                'style' => 'width: 50px',
                'style' => 'display: none',
                'min' => 0,
                'max' => 12
            ]])
        ->getForm();




    }
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SalammouAlikom\IFtarBundle\Entity\iftar_table'
        ));
    }

    public function getName(){
        return 'iftar_table';
    }


}