<?php

namespace Drupal\training\Manager;

use Drupal\Core\Datetime\DrupalDateTime;

/**
 * The time manager service.
 */
class TimeManager {

  /**
   * Check if it's the morning or not.
   *
   * @return bool
   *   True if it's the morning, false otherwise.
   */
  public function isMorning() : bool {
    $time = new DrupalDateTime();
    return $time->format('a') == 'am' ? TRUE : FALSE;
  }

}
