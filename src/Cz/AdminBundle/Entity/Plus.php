<?php

namespace Cz\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Carrousel
 *
 * @ORM\Table(name="cz_adminbundle_plus")
 * @ORM\Entity()
 */
class Plus
{
    use \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Cz\AdminBundle\Entity\MediaAdmin", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="boolean")
     */
    private $format;
    /**
     * @var string
     *
     * @ORM\Column(name="fleches", type="boolean")
     */
    private $fleches;


    /**
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="plus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $test;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return string
     */
    public function getFleches()
    {
        return $this->fleches;
    }

    /**
     * @param string $fleches
     */
    public function setFleches($fleches)
    {
        $this->fleches = $fleches;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $tes
     */
    public function setCarrousel($test)
    {
        $this->test = $test;
    }


    public function addCarrousel(Test $test)
    {
        $this->test = $test;
    }





}
