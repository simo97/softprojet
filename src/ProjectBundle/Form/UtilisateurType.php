<?php

namespace ProjectBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('login','text',array(
            'attr'=> array(
                'class'=>'form-control'
            )
        ))->add('pass','password',array(
            'attr'=> array(
                'class'=>'form-control'
            )
        ))->add('salt','text',array(
            'attr'=> array(
                'class'=>'form-control',
                'value'=>'gvrewg758gre58957fer6g7v'
            )
        ))->add('nom','text',array(
            'attr'=> array(
                'class'=>'form-control'
            )
        ))->add('prenom','text',array(
            'attr'=> array(
                'class'=>'form-control'
            )
        ))->add('mail','email',array(
            'attr'=> array(
                'class'=>'form-control'
            )
        ))->add('telephone','number',array(
            'attr'=> array(
                'class'=>'form-control'
            )
        ))
        ->add('service',EntityType::class, array(
            'class'=>'ProjectBundle:Service',
            'choice_label'=> "nom",
            'attr'=>array(
                'class'=>'form-control'
            )
            ))
        ->add('role',EntityType::class, array(
            'class'=>'ProjectBundle:Role',
            'choice_label'=> "intuler",
            'attr'=>array(
                'class'=>'form-control'
            )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjectBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projectbundle_utilisateur';
    }


}
