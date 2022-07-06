<?php

namespace Drupal\training\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * EventSubscriber that display a message on a specific page.
 */
class TrainingSubscriber implements EventSubscriberInterface {

  /**
   * RouteMatch service.
   *
   * @var Drupal\Core\Routing\RouteMatchInterface
   */
  private $routeMatch;

  /**
   * Messenger service.
   *
   * @var Drupal\Core\Messenger\MessengerInterface
   */
  private $messenger;

  /**
   * Class constructor.
   *
   * @param Drupal\Core\Routing\RouteMatchInterface $routeMatch
   *   RouteMatch service from the container.
   * @param Drupal\Core\Messenger\MessengerInterface $messenger
   *   Messenger service from the container.
   */
  public function __construct(
    RouteMatchInterface $routeMatch,
    MessengerInterface $messenger
  ) {
    $this->routeMatch = $routeMatch;
    $this->messenger = $messenger;
  }

  /**
   * Display a flash message on a specific route.
   */
  public function displayFlash() {

    $routeName = $this->routeMatch->getRouteName();

    if ($routeName == 'training.hello') {
      $this->messenger->addMessage('Coucou !');
    }
  }

  /**
   * Define events subscribed to.
   */
  public static function getSubscribedEvents() {
    $events['kernel.request'][] = ['displayFlash'];
    return $events;
  }

}
