<?php

namespace FrontOfficeBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class AddEquipeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom',\Symfony\Component\Form\Extension\Core\Type\TextType::class)
            ->add('stade',\Symfony\Component\Form\Extension\Core\Type\TextType::class)
            ->add('file_upload_image', FileType::class, array('label' => 'Fichier image'))
            ->add('annuler',ResetType::class,array(
                'attr' => array(
                    'class' => 'btn-annuler')))

            ->add('ajouter',SubmitType::class,array(
                'attr' => array(
                    'class' => 'btn-ajouter')));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontOfficeBundle\Entity\Equipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontofficebundle_equipe';
    }


}
