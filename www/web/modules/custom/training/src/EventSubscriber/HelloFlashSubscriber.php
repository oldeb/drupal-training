<?php

namespace Drupal\training\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * The Hello Flash event subscriber.
 */
class HelloFlashSubscriber implements EventSubscriberInterface {

  /**
   * The current route match service.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  private $routeMatch;

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  private $messenger;

  /**
   * The class constructor.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $routeMatch
   *   The current route match service.
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   */
  public function __construct(RouteMatchInterface $routeMatch, MessengerInterface $messenger) {
    $this->routeMatch = $routeMatch;
    $this->messenger = $messenger;
  }

  /**
   * Display a message on the training.hello route.
   */
  public function showFlash() {
    if ($this->routeMatch->getRouteName() == 'training.hello') {
      $this->messenger->addMessage("Coucou toi !");
    }
  }

  /**
   * Define events we subscribe to.
   */
  public static function getSubscribedEvents() {
    $events['kernel.request'][] = ['showFlash'];
    return $events;
  }

}
