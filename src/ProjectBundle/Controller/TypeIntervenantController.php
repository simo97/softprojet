<?php

namespace ProjectBundle\Controller;

use ProjectBundle\Entity\TypeIntervenant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typeintervenant controller.
 *
 * @Route("typeintervenant")
 */
class TypeIntervenantController extends Controller
{
    /**
     * Lists all typeIntervenant entities.
     *
     * @Route("/", name="typeintervenant_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeIntervenants = $em->getRepository('ProjectBundle:TypeIntervenant')->findAll();

        return $this->render('typeintervenant/index.html.twig', array(
            'typeIntervenants' => $typeIntervenants,
        ));
    }

    /**
     * Creates a new typeIntervenant entity.
     *
     * @Route("/new", name="typeintervenant_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeIntervenant = new Typeintervenant();
        $form = $this->createForm('ProjectBundle\Form\TypeIntervenantType', $typeIntervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeIntervenant);
            $em->flush($typeIntervenant);

            return $this->redirectToRoute('typeintervenant_show', array('id' => $typeIntervenant->getId()));
        }

        return $this->render('typeintervenant/new.html.twig', array(
            'typeIntervenant' => $typeIntervenant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeIntervenant entity.
     *
     * @Route("/{id}", name="typeintervenant_show")
     * @Method("GET")
     */
    public function showAction(TypeIntervenant $typeIntervenant)
    {
        $deleteForm = $this->createDeleteForm($typeIntervenant);

        return $this->render('typeintervenant/show.html.twig', array(
            'typeIntervenant' => $typeIntervenant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeIntervenant entity.
     *
     * @Route("/{id}/edit", name="typeintervenant_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeIntervenant $typeIntervenant)
    {
        $deleteForm = $this->createDeleteForm($typeIntervenant);
        $editForm = $this->createForm('ProjectBundle\Form\TypeIntervenantType', $typeIntervenant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeintervenant_edit', array('id' => $typeIntervenant->getId()));
        }

        return $this->render('typeintervenant/edit.html.twig', array(
            'typeIntervenant' => $typeIntervenant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeIntervenant entity.
     *
     * @Route("/{id}", name="typeintervenant_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeIntervenant $typeIntervenant)
    {
        $form = $this->createDeleteForm($typeIntervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeIntervenant);
            $em->flush($typeIntervenant);
        }

        return $this->redirectToRoute('typeintervenant_index');
    }

    /**
     * Creates a form to delete a typeIntervenant entity.
     *
     * @param TypeIntervenant $typeIntervenant The typeIntervenant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeIntervenant $typeIntervenant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeintervenant_delete', array('id' => $typeIntervenant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
