<?php

namespace FrontOfficeBundle\Form;

use FrontOfficeBundle\Form\EventListener\AddJournee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class JourneeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('championnat',EntityType::class,array(
            'class'=>'FrontOfficeBundle:Championnat',
            'choice_label'=>'nom'
            ))

            /*
            ->add('nom',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Journee',
                'choice_label'=>'nom'));
            */
            ->addEventSubscriber(new AddJournee());

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
