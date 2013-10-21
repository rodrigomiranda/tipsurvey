<?php

namespace Tipddy\SurveyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tipddy\SurveyBundle\Entity\Question;
use Tipddy\SurveyBundle\Form\QuestionType;

/**
 * Question controller.
 *
 */
class QuestionController extends Controller
{
       public function indexAction()
       {
	       $em = $this->getDoctrine()->getManager();
	       $entities = $em->getRepository('TipddySurveyBundle:Question')->findAll();
	       
	       return $this->render('TipddySurveyBundle:Question:index.html.twig', array(
	                  'entities' => $entities,
	       ));
	       
       }
       
       
       public function newAction()
       {
	       $entity = new Question();
	       $form = $this->createCreateForm($entity);
	       
	       return $this->render('TipddySurveyBundle:Question:new.html.twig', array(
	                   'entity' => $entity,
	                   'form'   => $form->createView(),
	       ));
	       
       }
       
       
       public function createAction(Request $request)
       {
            $entity = new Question();
            $form = $this->createCreateForm($entity);
            
            $form->handleRequest($request);
            
            if ($form->isValid()) {
	            $em = $this->getDoctrine()->getManager();
	            $em->persist($entity);
	            $em->flush();
	            
	            return $this->redirect($this->generateUrl('question_show', array('id' => $entity->getId())));
            }
            
            return $this->render('TipddySurveyBundle:Question:new.html.twig', array(
                   'entity' => $entity,
                   'form'   => $form->createView()
              ));
	       
       }
       
       public function showAction($id)
       {
           $em = $this->getDoctrine()->getManager();
           $entity = $em->getRepository('TipddySurveyBundle:Question')->find($id);
           
           if (!$entity) {
	           throw $this->createNotFoundException('Unable to find Register entity.');
           }
           
           $deleteForm = $this->createDeleteForm($id);
           
           
           return $this->render('TipddySurveyBundle:Question:show.html.twig', array(
                        'entity' => $entity,
                        'delete_form' => $deleteForm->createView()));
           
       }
       
       
       
       public function editAction($id)
       {
           $em = $this->getDoctrine()->getManager();
           $entity = $em->getRepository('TipddySurveyBundle:Question')->find($id);
           
           if (!$entity) {
              throw $this->createNotFoundException('Unable to find Register entity.');
           }
                 
          $editForm = $this->createEditForm($entity);
          $deleteForm = $this->createDeleteForm($id);
         
          return $this->render('TipddySurveyBundle:Question:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
             
           ));
       }
       
       
       public function updateAction(Request $request, $id)
       {
	        $em = $this->getDoctrine()->getManager();
	        $entity = $em->getRepository('TipddySurveyBundle:Question')->find($id);
	        
	        if (!$entity) {
		        throw $this->createNotFoundException('Unable to find Register entity');
	        }    
	        
	        $editForm = $this->createEditForm($entity);
	        $deleteForm = $this->createDeleteForm($id);
	        
	        $editForm->handleRequest($request);
	        
	        if ($editForm->isValid()) {
		        $em->flush();
		        
		        return $this->redirect($this->generateUrl('question_edit', array(
		               'id' => $id)));
	        } 
	        
	        
	        return $this->render('TipddySurveyBundle:Question:edit.html.twig', array(
	                 'entity' => $entity,
	                 'edit_form' => $editForm->createView(),
	                 'delete_form' => $deleteForm->createView()));
       }
       
       
       public function deleteAction(Request $request, $id)
       {
           $form = $this->createDeleteForm($id);
           $form->handleRequest($request);
           
           if ($form->isValid()) {
	           $em = $this->getDoctrine()->getManager();
	           $entity = $em->getRepository('TipddySurveyBundle:Question')->find($id);
	           
	           if (!$entity) {
		           throw $this->createNotFoundException('Unable to find Register entity');
	           }
	           
	           $em->remove($entity);
	           $em->flush();
           }
           
           return $this->redirect($this->generateUrl('question'));
           
       }
       
       
       private function createCreateForm(Question $entity)
       {
            $form = $this->createForm(new QuestionType(), $entity, array(
                 'action' => $this->generateUrl('question_create'),
            ));
            
            $form->add('submit', 'submit', array('label' => 'Create'));
            
            return $form;
	       
       }
       
       
          /**
           * Creates a form to edit a Survey entity.
           *
           * @param Survey $entity The entity
           *
           * @return \Symfony\Component\Form\Form The form
         */
        private function createEditForm(Question $entity)
        {
           $form = $this->createForm(new QuestionType(), $entity, array(
            'action' => $this->generateUrl('question_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            ));

            $form->add('submit', 'submit', array('label' => 'Update'));

            return $form;
        }
        
         /**
         * Creates a form to delete a Survey entity by id.
		 *
		 * @param mixed $id The entity id
		 *
		 * @return \Symfony\Component\Form\Form The form
		 */
		 private function createDeleteForm($id)
         {
            return $this->createFormBuilder()
            ->setAction($this->generateUrl('question_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }


}