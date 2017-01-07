<?php

namespace FrontOfficeBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class MatchsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*
            ->add('championnat',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Championnat',
                'multiple'=>true,
                'query_builder'=>function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.nom', 'ASC');
                }
            ))
            */
            ->add('equipeDomicile',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Equipe',
                'choice_label'=>'nom',
            ))
            ->add('equipeExterieur',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Equipe',
                'choice_label'=>'nom',
            ))
            ->add('journee',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Journee',
                'choice_label'=>'nom',
            ))
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
