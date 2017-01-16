<?php

namespace FrontOfficeBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use FrontOfficeBundle\Form\EventListener\AddMatchListenerChampionnat;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
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

class AddScoreMatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scoreDomicile',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'data_class' => null,
                'label' => false,
                'required' => false))
            ->add('scoreExterieur',\Symfony\Component\Form\Extension\Core\Type\TextType::class,array(
                'data_class' => null,
                'label' => false,
                'required' => false))
            ->add('ajouter',ButtonType::class,array(
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
            'data_class' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_matchs_add_score';
    }

}
