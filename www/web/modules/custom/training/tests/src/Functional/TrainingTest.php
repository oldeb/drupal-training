<?php

namespace Drupal\Tests\training\Functional;

use Drupal\Tests\BrowserTestBase;

class TrainingTest extends BrowserTestBase {

  protected static $modules = ['node', 'training'];

  protected $defaultTheme = 'training_theme';

  public function setUp() : void {
    parent::setUp();

    $user = $this->drupalCreateUser(['access content']);
    $this->drupalLogin($user);
  }

  public function testTrainingFoobar() : void {
    $this->drupalCreateNode([
      'type' => 'article',
      'title' => 'My published article',
      'status' => 1,
    ]);

    $this->drupalCreateNode([
      'type' => 'article',
      'title' => 'My unpublished article',
      'status' => 0,
    ]);

    $this->drupalGet('/training/foobar');
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains('FooBar');
    $this->assertSession()->pageTextContains('My published article');
    $this->assertSession()->pageTextNotContains('My unpublished article');
  }

}
