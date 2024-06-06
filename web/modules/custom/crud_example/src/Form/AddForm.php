<?php

namespace Drupal\crud_example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;

class AddForm extends FormBase {

  public function getFormId() {
    return 'crud_example_add_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add Item'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $connection = Database::getConnection();
    $connection->insert('crud_example')
      ->fields([
        'name' => $form_state->getValue('name'),
        'description' => $form_state->getValue('description'),
      ])
      ->execute();

    \Drupal::messenger()->addMessage($this->t('Item added successfully.'));
  }

}
