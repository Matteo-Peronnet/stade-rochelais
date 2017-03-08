<?php
namespace FrontOfficeBundle\Form\EventListener;
use FrontOfficeBundle\Entity\Equipe;
use FrontOfficeBundle\Entity\Journee;
use Doctrine\ORM\EntityRepository;
use FrontOfficeBundle\Entity\Matchs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FindMatchListenerChampionnat implements EventSubscriberInterface
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

        //$id = $event->getData()->getChampionnat() !== null ? $event->getData()->getChampionnat()->getId(): null;
        $id = 146;
        $this->addModifier($event->getForm(), $id);

    }
    public function onPreSubmit(FormEvent $event)
    {
        $this->addModifier($event->getForm(), $event->getData()["championnat"]);
    }
    public function addModifier(FormInterface $form, $championnat_id = null)
    {
        $form->add('journee', EntityType::class, array(
            'class'       => Journee::class,
            "query_builder"=>function(EntityRepository $repo) use ($championnat_id) {
                return
                    $repo->createQueryBuilder("j")
                        ->innerJoin("j.championnat", "c")
                        ->andWhere("c.id = :championnat_id")
                        ->setParameter("championnat_id", $championnat_id);
            },
            'mapped'=>false
        ));
    }
}