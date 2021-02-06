<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\AuthoredEntityInterface;
use App\Entity\PublishedDateEntityInterface;
use Doctrine\DBAL\Schema\View;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class PublishedDateEntitySubscriber implements EventSubscriberInterface
{


    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['publishedDate', EventPriorities::PRE_WRITE]
        ];
    }

    public function publishedDate(GetResponseForControllerResultEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        $now = new \DateTime();
        if (!$entity instanceof PublishedDateEntityInterface || Request::METHOD_POST != $method) {
            return;
        }

        $entity->setPublished($now);
    }
}