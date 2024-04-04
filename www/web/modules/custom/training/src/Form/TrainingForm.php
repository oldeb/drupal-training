<?php

namespace Drupal\training\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * The training form.
 */
class TrainingForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() : string {
    return 'training_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) : array {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => 'Your name',
      '#required' => TRUE,
    ];

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => 'Your first name',
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => 'Your email address',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => 'Send',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!$form_state->isValueEmpty('email')) {
      if (!\Drupal::service('email.validator')->isValid($form_state->getValue('email'))) {
        $form_state->setErrorByName('email', 'invalid email address');
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    \Drupal::messenger()->addMessage("Hello $name");
  }

}
