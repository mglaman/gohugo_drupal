<?php

namespace Drupal\gohugo\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ConfigSubscriber.
 */
class ConfigSubscriber implements EventSubscriberInterface {

  /**
   * Symfony\Component\Serializer\SerializerInterface definition.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   */
  protected $serializer;

  /**
   * Constructs a new ConfigSubscriber object.
   */
  public function __construct(SerializerInterface $serializer) {
    $this->serializer = $serializer;
  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events['config.save'] = ['onConfigSave'];

    return $events;
  }

  /**
   * This method is called whenever the config.save event is
   * dispatched.
   *
   * @param GetResponseEvent $event
   */
  public function onConfigSave(Event $event) {
    drupal_set_message('Event config.save thrown by Subscriber in module gohugo.', 'status', TRUE);
  }

}
