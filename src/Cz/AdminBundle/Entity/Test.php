<?php

namespace Cz\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="cz_adminbundle_test")
 * @ORM\Entity()
 */
class Test
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
     * @ORM\OneToMany(targetEntity="Slide", mappedBy="test", cascade={"persist","remove"})
     */
    private $plus;

    public function __construct()
    {
        $this->plus = new ArrayCollection();
    }

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
     * @return mixed
     */
    public function getPlus()
    {
        return $this->plus;
    }

    /**
     * @param mixed $plus
     */
    public function setPlus($plus)
    {
        $this->plus = $plus;
    }

    public function addSlide(Plus $plus)
    {
        $plus->addPlus($this);

        $this->plus->add($plus);
    }

    public function removeSlide(Plus $plus)
    {
        $this->plus->removeElement($plus);
    }


}
