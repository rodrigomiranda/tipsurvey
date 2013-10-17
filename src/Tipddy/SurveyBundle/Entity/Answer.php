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
 * Tipddy\SuveryBundle\Entity\Answer
 *
 * @ORM\Table(name="tipsurvey_answer")
 * @ORM\Entity
 */
 class Answer
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
        * @ORM\Column(name="answer", type="text")
        *
        * @Assert\NotBlank()
        */
        protected $answer;
        
        /** 
         * @ORM\Column(name="type", type="integer")
         *
         * @Assert\Type(type="integer")
         */
         protected $type;
         
         
         /**
          * @ORM\Column(name="photo", type="string", length=255, nullable=false)
          *
          * @Assert\Range(min="2")
          */
          protected $photo;
          
          /**
           * @ORM\Column(name="video", type="text")
           *
           * @Assert\Range(min="2")
           */
          protected $video;
          	 
 }
 
