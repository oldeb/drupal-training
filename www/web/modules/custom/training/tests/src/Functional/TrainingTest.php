<?php

namespace Drupal\Tests\training\Functional;

use Drupal\Tests\BrowserTestBase;

class TrainingTest extends BrowserTestBase {
  protected static $modules = ['training'];

  protected $defaultTheme = 'stark';

  protected function setUp(): void {
    parent::setUp();

    $user = $this->drupalCreateUser(['access content']);
    $this->drupalLogin($user);
  }

  public function testTraingModule() {
    $this->drupalGet('/training/hello');
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('My training controller');
  }

}
