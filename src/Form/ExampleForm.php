<?php
/**
 * Created by IntelliJ IDEA.
 * User: smordi
 * Date: 1/17/2018
 * Time: 6:48 PM
 */

namespace Drupal\len_custom\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class ExampleForm extends FormBase {
  public function getFormId() {

    // Unique ID of the form.
    return 'example_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['First_Name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your First name'),
    );
    $form['Last_Name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Your Last Name'),
    );
    // Create a $form API array.
    $form['phone_number'] = array(
      '#type' => 'tel',
      '#title' => $this->t('Your phone number'),
    );

    $form['save'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {

    // Validate submitted form data.
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Handle submitted form data.
  }

}


