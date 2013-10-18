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
          */
          protected $photo;
          
          /**
           * @ORM\Column(name="video", type="text")
           *
           */
          protected $video;
          	 
          	 
          /**
           * 
           * @ORM\ManyToOne(targetEntity="Question")
           * @ORM\JoinColumns({
           * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
           * })
           */
          protected $question;	 
 
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
     * Set answer
     *
     * @param string $answer
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    
        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Answer
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Answer
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Answer
     */
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set question
     *
     * @param \Tipddy\SurveyBundle\Entity\Question $question
     * @return Answer
     */
    public function setQuestion(\Tipddy\SurveyBundle\Entity\Question $question = null)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return \Tipddy\SurveyBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}