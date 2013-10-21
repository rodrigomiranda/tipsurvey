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
 * Tipddy\SurveyBundle\Entity\Question
 *
 * @ORM\Table(name="tipsurvey_question")
 * @ORM\Entity
 */
 class Question
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
        * @ORM\Column(name="question", type="text")
        *
        * @Assert\NotBlank()
        * @Assert\Length(
        *    min = "5",
        *    minMessage = "Your first name must be at least {{ limit }} characters length"  
        * )
        */
       protected $question;
       
       
       /**
        * @ORM\Column(name="description", type="text")
        *
        * @Assert\NotBlank()
        */
       protected $description;
       
       
       /**
        * @ORM\Column(name="random_order", type="boolean")
        *
        * @Assert\Type(type="bool")
        */
        protected $randomOrder;  //respuestas en orden randomico.
        
        
       /**
        * @ORM\Column(name="question_required", type="boolean")
        *
        * @Assert\Type(type="bool")
        */
       protected $questionRequired;    
       
       
       /**
        * 
        * @ORM\ManyToOne(targetEntity="Survey")
        * @ORM\JoinColumns({
        * @ORM\JoinColumn(name="survey_id",  referencedColumnName="id")
        * })
        */
        protected $survey;
        
        
        /**
         * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"all"})
         *
         */
         protected $answers;
        
        
    public function __toString() 
    {
	    return $this->question;
	    
    }   
        
        
     /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Question
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set randomOrder
     *
     * @param boolean $randomOrder
     * @return Question
     */
    public function setRandomOrder($randomOrder)
    {
        $this->randomOrder = $randomOrder;
    
        return $this;
    }

    /**
     * Get randomOrder
     *
     * @return boolean 
     */
    public function getRandomOrder()
    {
        return $this->randomOrder;
    }

    /**
     * Set questionRequired
     *
     * @param boolean $questionRequired
     * @return Question
     */
    public function setQuestionRequired($questionRequired)
    {
        $this->questionRequired = $questionRequired;
    
        return $this;
    }

    /**
     * Get questionRequired
     *
     * @return boolean 
     */
    public function getQuestionRequired()
    {
        return $this->questionRequired;
    }

    /**
     * Set survey
     *
     * @param \Tipddy\SurveyBundle\Entity\Survey $survey
     * @return Question
     */
    public function setSurvey(\Tipddy\SurveyBundle\Entity\Survey $survey = null)
    {
        $this->survey = $survey;
    
        return $this;
    }

    /**
     * Get survey
     *
     * @return \Tipddy\SurveyBundle\Entity\Survey 
     */
    public function getSurvey()
    {
        return $this->survey;
    }

    /**
     * Add answers
     *
     * @param \Tipddy\SurveyBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\Tipddy\SurveyBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;
        
        //lineas especiales
        $answers->setQuestion($this);  //revistar posteriormente
    
        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Tipddy\SurveyBundle\Entity\Answer $answers
     */
    public function removeAnswer(\Tipddy\SurveyBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}