<?php

namespace FrontOfficeBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddJourneeToChampionnatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('championnat', EntityType::class, array(
                'class' => 'FrontOfficeBundle:Championnat',
                'choice_label' => 'nom',
            ))
            ->add('nom', TextType::class)
            ->add('ajouter', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn-ajouter'
                )
            ))
            ->add('annuler', ResetType::class, array(
                'attr' => array(
                    'class' => 'btn-annuler'
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontOfficeBundle\Entity\Journee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_journee';
    }


}
