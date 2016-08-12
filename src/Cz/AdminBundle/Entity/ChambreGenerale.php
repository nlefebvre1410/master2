<?php

namespace Cz\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ChambreGenerale
 *
 * @ORM\Table(name="cz_adminbundle_chambre_generale")
 * @ORM\Entity
 */
class ChambreGenerale extends \Cz\ManagerBundle\Entity\AbstractEntity
{
    use \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;

    protected $translations;

    /**
     * Constructor
     */
    public function __construct()
    {

        $this->translations = new ArrayCollection();
    }

}