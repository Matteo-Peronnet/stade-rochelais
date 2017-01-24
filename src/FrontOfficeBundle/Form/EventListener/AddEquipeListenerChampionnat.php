<?php
namespace FrontOfficeBundle\Form\EventListener;
use FrontOfficeBundle\Entity\Equipe;
use FrontOfficeBundle\Entity\Championnat;
use FrontOfficeBundle\Entity\Journee;
use Doctrine\ORM\EntityRepository;
use FrontOfficeBundle\Entity\Matchs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddEquipeListenerChampionnat implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            FormEvents::POST_SET_DATA => 'onPreSetData',
            FormEvents::PRE_SUBMIT=> 'onPreSubmit',
        ];
    }

    public function onPreSetData(FormEvent $event)
    {
        //$id = $event->getData()->getId();
        //var_dump($id);
        $id = 22;
        $this->addModifier($event->getForm(), $id);
    }
    public function onPreSubmit(FormEvent $event)
    {
        $this->addModifier($event->getForm(), $event->getData()["championnat"]);
    }
    public function addModifier(FormInterface $form, $championnat_id = null)
    {
        $form
            ->add('equipe', EntityType::class, array(
                'class' => Equipe::class,
                'query_builder'=>function(EntityRepository $er) use ($championnat_id)
                {
                    $qb = $er->createQueryBuilder("e");
                    return $qb
                        ->innerJoin('e.championnat', 'c')
                        ->andWhere($qb->expr()->notIn("c.id", ":championnat"))
                        ->setParameter("championnat",$championnat_id);

                }
            ));
    }

}
