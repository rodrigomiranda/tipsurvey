<?php

/*
* (c) Rodrigo Miranda <rmg.contacto@gmail.com>
*
* This file is part of the TipSurvey application.
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
* Este archivo pertenece a la aplicación TipSurvey.
* El código fuente de la aplicación incluye un archivo llamado LICENSE
* con toda la información sobre el copyright y la licencia.
*/

namespace Tipddy\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tipddy\SurveyBundle\Entity\QuestionType
 *
 * @ORM\Table(name="tipsurvey_questiontype")
 * @ORM\Entity
 */
 class QuestionType
 {
     /**
      * @var bigint $id
      *
      * @ORM\Column(name="id", type="smallint", nullable=false)
      * @ORM\Id
      * @ORM\GeneratedValue(strategy="IDENTITY")
      */
  	 private $id;
	 
	 /**
	  * @ORM\Column(name="etiqueta", type="string", length=255, nullable=false)
	  *
	  * @Assert\NotBlank()
	  * @Assert\Length(
	  *       min = "2",
	  *       minMessage = "Your first name must be at least {{ limit }} characters length",
	  *       maxMessage = "Your first name cannot be longer than {{ limit }} characters length") 
	  */
	 private $etiqueta;
	 
 
 
    public function __toString()
    {
	    return $this->etiqueta;
	    
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
     * Set etiqueta
     *
     * @param string $etiqueta
     * @return QuestionType
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    
        return $this;
    }

    /**
     * Get etiqueta
     *
     * @return string 
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }
}