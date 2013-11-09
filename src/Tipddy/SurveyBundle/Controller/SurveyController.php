<?php

namespace Tipddy\SurveyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tipddy\SurveyBundle\Entity\Survey;
use Tipddy\SurveyBundle\Form\SurveyType;

/**
 * Survey controller.
 *
 */
class SurveyController extends Controller
{

    /**
     * Lists all Survey entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TipddySurveyBundle:Survey')->findAll();

        return $this->render('TipddySurveyBundle:Survey:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Survey entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Survey();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('survey_show', array('id' => $entity->getId())));
        }

        return $this->render('TipddySurveyBundle:Survey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Survey entity.
    *
    * @param Survey $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Survey $entity)
    {
        $form = $this->createForm(new SurveyType(), $entity, array(
            'action' => $this->generateUrl('survey_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Survey entity.
     *
     */
    public function newAction()
    {
        $entity = new Survey();
        $form   = $this->createCreateForm($entity);

        return $this->render('TipddySurveyBundle:Survey:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Survey entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TipddySurveyBundle:Survey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Survey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TipddySurveyBundle:Survey:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Survey entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TipddySurveyBundle:Survey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Survey entity.');
        }
        
        //create session menu left
        $session = $request->getSession();
        $session->set('survey', $entity->getId());

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TipddySurveyBundle:Survey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Survey entity.
    *
    * @param Survey $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Survey $entity)
    {
        $form = $this->createForm(new SurveyType(), $entity, array(
            'action' => $this->generateUrl('survey_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Survey entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TipddySurveyBundle:Survey')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Survey entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('survey_edit', array('id' => $id)));
        }

        return $this->render('TipddySurveyBundle:Survey:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Survey entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TipddySurveyBundle:Survey')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Survey entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('survey'));
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
            ->setAction($this->generateUrl('survey_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
