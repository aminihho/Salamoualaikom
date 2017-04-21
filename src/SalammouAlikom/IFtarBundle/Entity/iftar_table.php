<?php

namespace SalammouAlikom\IFtarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * iftar_table
 *
 * @ORM\Table(name="iftar_table")
 * @ORM\Entity(repositoryClass="SalammouAlikom\IFtarBundle\Repository\iftar_tableRepository")
 */
class iftar_table
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=60, nullable=false)
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=60,nullable=false)
     * @Assert\NotBlank()
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonnummer", type="string", length=60, nullable=false)
     * @Assert\NotBlank()
     */
    private $telefonnummer;

    /**
     * @var bool
     *
     * @ORM\Column(name="soope", type="boolean", nullable=true)
     */
    private $soope;




    /**
     * @var int
     *
     * @ORM\Column(name="person_soope_qte", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 100"
     * )
     */
    private $personSoopeQte;




    /**
     * @var bool
     *
     * @ORM\Column(name="food", type="boolean", nullable=false)
     */
    private $food;


    /**
     * @var int
     *
     * @ORM\Column(name="person_food_qte", type="integer", nullable=false)
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 100"
     * )
     */

    private $personFoodQte;


    /**
     * @var bool
     *
     * @ORM\Column(name="salad", type="boolean", nullable=true)
     */

    private $salad;




    /**
     * @var int
     *
     * @ORM\Column(name="person_salad_qte", type="integer",nullable=false)
     * @Assert\Type(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 100"
     * )
     */
    private $personSaladQte;

    /**
     * @var string
     *
     * @ORM\Column(name="start_date", type="date", length=40)
     */

    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="end_date", type="date", length=40)
     */
    private $endDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="dattel", type="boolean", nullable=true)
     */
    private $dattel;

    /**
     * @var int
     *
     * @ORM\Column(name="dattel_qte", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 4,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 4"
     * )
     */
    private $dattelQte;

    /**
     * @var bool
     *
     * @ORM\Column(name="watter", type="boolean", nullable=true)
     */
    private $watter;

    /**
     * @var int
     *
     * @ORM\Column(name="watter_qte", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 12,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 12"
     * )
     */
    private $watterQte;

    /**
     * @var bool
     *
     * @ORM\Column(name="milk", type="boolean", nullable=true)
     */
    private $milk;

    /**
     * @var int
     *
     * @ORM\Column(name="milk_qte", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 12,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 12"
     * )
     */
    private $milkQte;

    /**
     * @var bool
     *
     * @ORM\Column(name="psedo_on", type="boolean", nullable=true)
     */
    private $psedoOn;

    /**
     * @var bool
     *
     * @ORM\Column(name="psedo_of", type="boolean", nullable=true)
     */
    private $psedoOf;

    /**
     * @var bool
     *
     * @ORM\Column(name="another_drink", type="boolean", nullable=true)
     */
    private $anotherDrink;

    /**
     * @var int
     *
     * @ORM\Column(name="another_drink_qte", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 12,
     *      minMessage = "You must be at least 1 person ",
     *      maxMessage = "You cannot type more then 12"
     * )
     */
    private $anotherDrinkQte;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return iftar_table
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return iftar_table
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set telefonnummer
     *
     * @param string $telefonnummer
     *
     * @return iftar_table
     */
    public function setTelefonnummer($telefonnummer)
    {
        $this->telefonnummer = $telefonnummer;

        return $this;
    }

    /**
     * Get telefonnummer
     *
     * @return string
     */
    public function getTelefonnummer()
    {
        return $this->telefonnummer;
    }

    /**
     * Set soope
     *
     * @param boolean $soope
     *
     * @return iftar_table
     */
    public function setSoope($soope)
    {
        $this->soope = $soope;

        return $this;
    }

    /**
     * Get soope
     *
     * @return bool
     */
    public function getSoope()
    {
        return $this->soope;
    }

    /**
     * Set startDate
     *
     * @param string $startDate
     *
     * @return iftar_table
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return date
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param string $endDate
     *
     * @return iftar_table
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return date
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set dattel
     *
     * @param integer $dattel
     *
     * @return iftar_table
     */
    public function setDattel($dattel)
    {
        $this->dattel = $dattel;

        return $this;
    }

    /**
     * Get dattel
     *
     * @return int
     */
    public function getDattel()
    {
        return $this->dattel;
    }

    /**
     * Set dattelQte
     *
     * @param integer $dattelQte
     *
     * @return iftar_table
     */
    public function setDattelQte($dattelQte)
    {
        $this->dattelQte = $dattelQte;

        return $this;
    }

    /**
     * Get dattelQte
     *
     * @return int
     */
    public function getDattelQte()
    {
        return $this->dattelQte;
    }

    /**
     * Set watter
     *
     * @param boolean $watter
     *
     * @return iftar_table
     */
    public function setWatter($watter)
    {
        $this->watter = $watter;

        return $this;
    }

    /**
     * Get watter
     *
     * @return bool
     */
    public function getWatter()
    {
        return $this->watter;
    }

    /**
     * Set watterQte
     *
     * @param integer $watterQte
     *
     * @return iftar_table
     */
    public function setWatterQte($watterQte)
    {
        $this->watterQte = $watterQte;

        return $this;
    }

    /**
     * Get watterQte
     *
     * @return int
     */
    public function getWatterQte()
    {
        return $this->watterQte;
    }

    /**
     * Set milk
     *
     * @param boolean $milk
     *
     * @return iftar_table
     */
    public function setMilk($milk)
    {
        $this->milk = $milk;

        return $this;
    }

    /**
     * Get milk
     *
     * @return bool
     */
    public function getMilk()
    {
        return $this->milk;
    }

    /**
     * Set milkQte
     *
     * @param integer $milkQte
     *
     * @return iftar_table
     */
    public function setMilkQte($milkQte)
    {
        $this->milkQte = $milkQte;

        return $this;
    }

    /**
     * Get milkQte
     *
     * @return int
     */
    public function getMilkQte()
    {
        return $this->milkQte;
    }

    /**
     * Set psedoOn
     *
     * @param boolean $psedoOn
     *
     * @return iftar_table
     */
    public function setPsedoOn($psedoOn)
    {
        $this->psedoOn = $psedoOn;

        return $this;
    }

    /**
     * Get psedoOn
     *
     * @return bool
     */
    public function getPsedoOn()
    {
        return $this->psedoOn;
    }

    /**
     * Set psedoOf
     *
     * @param boolean $psedoOf
     *
     * @return iftar_table
     */
    public function setPsedoOf($psedoOf)
    {
        $this->psedoOf = $psedoOf;

        return $this;
    }

    /**
     * Get psedoOf
     *
     * @return bool
     */
    public function getPsedoOf()
    {
        return $this->psedoOf;
    }

    /**
     * Set anotherDrink
     *
     * @param boolean $anotherDrink
     *
     * @return iftar_table
     */
    public function setAnotherDrink($anotherDrink)
    {
        $this->anotherDrink = $anotherDrink;

        return $this;
    }

    /**
     * Get anotherDrink
     *
     * @return bool
     */
    public function getAnotherDrink()
    {
        return $this->anotherDrink;
    }

    /**
     * Set anotherDrinkQte
     *
     * @param integer $anotherDrinkQte
     *
     * @return iftar_table
     */
    public function setAnotherDrinkQte($anotherDrinkQte)
    {
        $this->anotherDrinkQte = $anotherDrinkQte;

        return $this;
    }

    /**
     * Get anotherDrinkQte
     *
     * @return int
     */
    public function getAnotherDrinkQte()
    {
        return $this->anotherDrinkQte;
    }

    /**
     * Set food
     *
     * @param boolean $food
     *
     * @return iftar_table
     */
    public function setFood($food)
    {
        $this->food = $food;

        return $this;
    }

    /**
     * Get food
     *
     * @return boolean
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Set salad
     *
     * @param boolean $salad
     *
     * @return iftar_table
     */
    public function setSalad($salad)
    {
        $this->salad = $salad;

        return $this;
    }

    /**
     * Get salad
     *
     * @return boolean
     */
    public function getSalad()
    {
        return $this->salad;
    }

    /**
     * Set personSoopeQte
     *
     * @param integer $personSoopeQte
     *
     * @return iftar_table
     */
    public function setPersonSoopeQte($personSoopeQte)
    {
        $this->personSoopeQte = $personSoopeQte;

        return $this;
    }

    /**
     * Get personSoopeQte
     *
     * @return integer
     */
    public function getPersonSoopeQte()
    {
        return $this->personSoopeQte;
    }

    /**
     * Set personFoodQte
     *
     * @param integer $personFoodQte
     *
     * @return iftar_table
     */
    public function setPersonFoodQte($personFoodQte)
    {
        $this->personFoodQte = $personFoodQte;

        return $this;
    }

    /**
     * Get personFoodQte
     *
     * @return integer
     */
    public function getPersonFoodQte()
    {
        return $this->personFoodQte;
    }

    /**
     * Set personSaladQte
     *
     * @param integer $personSaladQte
     *
     * @return iftar_table
     */
    public function setPersonSaladQte($personSaladQte)
    {
        $this->personSaladQte = $personSaladQte;

        return $this;
    }

    /**
     * Get personSaladQte
     *
     * @return integer
     */
    public function getPersonSaladQte()
    {
        return $this->personSaladQte;
    }
}
