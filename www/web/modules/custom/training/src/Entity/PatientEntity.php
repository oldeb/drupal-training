<?php

namespace Drupal\training\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * The Patient entity.
 *
 * @ingroup training
 *
 * @ContentEntityType(
 *  id = "patient",
 *  label = @Translation("Patient"),
 *  base_table = "patient",
 *  entity_keys = {
 *    "id" = "id",
 *    "uuid" = "uuid",
 *  },
 * )
 */
class PatientEntity extends ContentEntityBase {

  /**
   * Undocumented function.
   *
   * @param Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   No comment.
   *
   * @return array
   *   The fields definition.
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel('id')
      ->setDescription('The identifier of the entity Patient.')
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel('uuid')
      ->setDescription('The universal identifier of the entity Patient.')
      ->setReadOnly(TRUE);

    return $fields;
  }

}
