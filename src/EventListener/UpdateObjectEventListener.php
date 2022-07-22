<?php

namespace Millerdigital\EleqPimcore\EventListener;

use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UpdateObjectEventListener implements EventSubscriberInterface {

    public function __construct()
    {
        echo "test"; die;
    }
    public static function getSubscribedEvents()
    {
        return [
            DataObjectEvents::POST_UPDATE => 'onUpdate',
        ];
    }

    public function onUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        // $attribute = $object->get('attributes', 'en');
        
        file_put_contents(__DIR__ . '/class.json', print_r($object->get('attributes', 'en')->get('transmission'), true));
    }
}