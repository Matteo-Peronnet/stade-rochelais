<?php

namespace FrontOfficeBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use FrontOfficeBundle\Form\EventListener\AddJournee;
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

class MatchsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            /*->add('championnat',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Championnat',
                'multiple'=>true,
                'expanded' => true,
                'query_builder'=>function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.nom', 'ASC');
                }
            ))*/
            /*
            ->add('journee',EntityType::class,array(
        'class'=>'FrontOfficeBundle:Journee',
        'multiple'=>true,
        'query_builder'=>function(EntityRepository $er) {
            return $er->createQueryBuilder('j')
                      ->Join('FrontOfficeBundle:Championnat','c')
                      ->where('j.championnat = c.id');
                }
            ))
            */
            /*
            ->add('journee', EntityType::class, array(
                'class' => 'FrontOfficeBundle:Journee',
                'query_builder'=>function(EntityRepository $er) {
                    return $er->createQueryBuilder('j')
                        ->Join('FrontOfficeBundle:Championnat','c')
                        ->where('j.championnat = c.id')
                        ->groupBy('j.nom,j.id,j.numero,j.championnat,c.nom');
                },
                'choice_label' => 'championnat.nom',
            ))
            */


            ->add('journee', JourneeType::class)



           /* ->add('journee',EntityType::class,array(
                'class'=>'FrontOfficeBundle:Journee',
                'choice_label'=>'nom',

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
