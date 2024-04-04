<?php

namespace Drupal\training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\training\Manager\TimeManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * The training controller.
 */
class TrainingController extends ControllerBase {

  /**
   * The time manager service.
   *
   * @var \Drupal\training\Manager\TimeManager
   */
  protected $timeManager;

  /**
   * Class constructor.
   *
   * @param \Drupal\training\Manager\TimeManager $timeManager
   *   The time manager service.
   */
  public function __construct(TimeManager $timeManager) {
    $this->timeManager = $timeManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('training.time_manager')
    );
  }

  /**
   * Say hello to the visitor.
   *
   * @param string $name
   *   A name from the router.
   *
   * @return array
   *   A render array
   */
  public function hello($name) : array {
    $name = $name ?? "there";

    // $timeManager = \Drupal::service('training.time_manager');
    // $text = $timeManager->isMorning() ? 'Good morning' : 'Good afternoon';
    $text = $this->timeManager->isMorning() ? 'Good morning' : 'Good afternoon';

    return [
      '#type' => 'markup',
      '#markup' => "<h3>$text $name</h3>",
    ];
  }

  /**
   * Custom title for the hello route.
   *
   * @param string $name
   *   A name from the router.
   *
   * @return string
   *   The custom title.
   */
  public function helloTitle($name) : string {
    $name = $name ?? "world";
    return "Hello $name !";
  }

  /**
   * Display foobar.
   *
   * @return array
   *   A render array
   */
  public function foobar() : array {
    $titles = [];
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'article')
      ->condition('status', 1)
      ->accessCheck(TRUE)
      ->execute();
    foreach ($nids as $nid) {
      $node = Node::load($nid);
      $titles[] = $node->getTitle();
    }

    return [
      '#theme' => 'training_nodes',
      '#titles' => $titles,
    ];
  }

}
