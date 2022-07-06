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

    if (!empty($nids)) {
      $markup = '<ul>';

      foreach ($nids as $nid) {
        $node = Node::load($nid);
        $markup .= '<li>' . $node->getTitle() . '</li>';
      }

      $markup .= '</ul>';
    }

    return [
      '#type' => 'markup',
      '#markup' => $markup ?? '',
    ];
  }

}
