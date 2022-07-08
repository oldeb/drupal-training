<?php

namespace Drupal\training\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;

/**
 * @Block(
 *   id = "training_block",
 *   admin_label = @Translation("Training block")
 * )
 */
class TrainingBlock extends BlockBase {

  public function build() {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'training')
      ->condition('status', Node::PUBLISHED)
      ->range(0, 3);

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
