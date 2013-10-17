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
 * Tipddy\SurveyBundle\Entity\Survey
 *
 * @ORM\Table(name="tipsurvey_survey")
 * @ORM\Entity
 */
 class Survey 
 {
	 /**
	  * @var bigint $id
	  *
	  * @ORM\Column(name="id", type="bigint", nullable=false)
	  * @ORM\Id
	  * @ORM\GeneratedValue(strategy="IDENTITY")
	  */
	 protected $id;

	 /**
	  * @ORM\Column(name="title", type="string", length=255, nullable=false)
	  *
	  * @Assert\NotBlank()
	  */
	  protected $title;
	  
	  /**
	   * @ORM\Column(name="description", type="text")
	   *
	   * @Assert\NotBlank()
	   * @Assert\Range(min="30")
	   */
	  protected $description;
	 
 }
 
