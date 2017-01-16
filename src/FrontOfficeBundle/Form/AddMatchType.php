<?php

namespace FrontOfficeBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use FrontOfficeBundle\Form\EventListener\AddMatchListenerChampionnat;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use FrontOfficeBundle\Form\JourneeType;

class AddMatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('championnat',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Championnat',
                'choice_label'=>'nom',
                'mapped'=>false
            ))
            ->addEventSubscriber(new AddMatchListenerChampionnat())
            ->add('date',\Symfony\Component\Form\Extension\Core\Type\DateTimeType::class)
            ->add('diffuseur',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Diffuseur',
                'choice_label'=>'nom',
                'required'  => false,
                'empty_data' => null
            ))
            ->add('annuler',ResetType::class,array(
                'attr' => array(
                    'class' => 'btn-annuler'
                )
            ))
            ->add('ajouter',SubmitType::class,array(
                'attr' => array(
                    'class' => 'btn-ajouter'
                )
            ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontOfficeBundle\Entity\Matchs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_matchs';
    }

}
