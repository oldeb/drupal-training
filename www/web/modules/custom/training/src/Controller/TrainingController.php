<?php

namespace Drupal\training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Training controller.
 */
class TrainingController extends ControllerBase {

  /**
   * Print the parameter or 'hello world' if empty.
   *
   * @param string|null $myparam
   *   The parameter to display.
   *
   * @return array
   *   A render array.
   */
  public function hello($myparam) {
    return [
      '#type' => 'markup',
      '#markup' => empty($myparam) ? 'Hello world' : $myparam,
    ];
  }

  /**
   * Print some random text.
   *
   * @return array
   *   A render array.
   */
  public function pouet() {


    $query = \Drupal::entityQuery('node')
      ->condition('type', 'training')
      ->condition('status', Node::PUBLISHED);

    $nids = $query->execute();

    $ntitles = [];

    foreach ($nids as $nid) {
      $node = Node::load($nid);
      $ntitles[] = $node->getTitle();
    }

    return [
      '#type' => 'theme',
      '#theme' => 'node_title_list',
      '#titles' => $ntitles,
    ];
  }

}
