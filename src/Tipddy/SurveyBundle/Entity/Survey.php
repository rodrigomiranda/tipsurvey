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
	   */
	  protected $description;
	 
	 
	 /**
	  * @ORM\OneToMany(targetEntity="Question", mappedBy="survey", cascade={"all"})
	  *
	  */
	  protected $questions;
	 
	 
	 
	 public function __toString()
	 {
		 return $this->title;
		 
	 }
	 
	 
     /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Survey
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Survey
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
     * Add questions
     *
     * @param \Tipddy\SurveyBundle\Entity\Question $questions
     * @return Survey
     */
    public function addQuestion(\Tipddy\SurveyBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Tipddy\SurveyBundle\Entity\Question $questions
     */
    public function removeQuestion(\Tipddy\SurveyBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}