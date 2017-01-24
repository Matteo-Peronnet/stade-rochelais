<?php

namespace FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddChampionnatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('description', TextType::class)
            ->add('submitFile', FileType::class, array(
                'label' => 'Liste des équipes ',
                'allow_extra_fields' => true,
                'mapped'=> false
            ))
//            ->add('equipe', CollectionType::class, array(
//                'entry_type' => FileType::class,
//                'mapped' => false,
//                'label' => 'Liste des équipes'
//            ))
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
            'data_class' => 'FrontOfficeBundle\Entity\Championnat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_championnat';
    }


}
