<?php

namespace FrontOfficeBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use FrontOfficeBundle\Form\EventListener\AddMatchListenerChampionnat;
use FrontOfficeBundle\Form\EventListener\FindMatchListenerChampionnat;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
use FrontOfficeBundle\Entity\Equipe;
use FrontOfficeBundle\Form\JourneeType;

class FindMatchByChampionnatJourneeType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipe',EntityType::class,array(
        'class'=>'FrontOfficeBundle:Equipe',
        'choice_label'=>'nom',
        'mapped'=>false
         ))


            ->add('championnat',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Championnat',
                'choice_label'=>'nom',
                'mapped'=>false
            ))

            ->addEventSubscriber(new FindMatchListenerChampionnat())

            /*
            ->add('journee',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Journee',
                'choice_label'=>'nom',
                'mapped'=>false
            ))
            */
            ->add('filtre', CheckboxType::class, array(
                'label'    => 'Afficher uniquement les matchs à remplir ',
                'required' => false,
                'mapped'=>false
            ))
            ->add("submit", SubmitType::class, ["label"=>"Chercher"]);

        /*
        ->add('equipe',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Equipe',
                'mapped'=>false
            ))
            ->add('championnat',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Championnat'
            ))
        -add('journee',EntityType::class,array(
            'class'=>'FrontOfficeBundle:Journee'
        ));
        */
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

}
