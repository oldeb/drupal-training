<?php

namespace Drupal\training\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

/**
 * My training block.
 *
 * @Block(
 *  id = "training_block",
 *  admin_label = @Translation("Training block"),
 *  category = "Training"
 * )
 */
class TrainingBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() : array {
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
      '#cache' => [
        'max_age' => 600,
      ]
    ];
  }

}
