<?php

namespace Drupal\len_custom\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LenovoCustomConfig.
 */
class LenovoCustomConfig extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'len_custom.lenovocustomconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'lenovo_custom_config';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('len_custom.lenovocustomconfig');
    $form['content_publisher_update_url'] = [
      '#type' => 'url',
      '#title' => $this->t('Content Publisher Update URL'),
      '#description' => $this->t('Content publisher update URL to be triggered from drupal. Used by update and create actions'),
      '#default_value' => $config->get('content_publisher_update_url'),
    ];
    $form['content_publisher_delete_url'] = [
      '#type' => 'url',
      '#title' => $this->t('Content Publisher Delete URL'),
      '#description' => $this->t('Content publisher rest endpoint URL for delete actions on nodes'),
      '#default_value' => $config->get('content_publisher_delete_url'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('len_custom.lenovocustomconfig')
      ->set('content_publisher_update_url', $form_state->getValue('content_publisher_update_url'))
      ->set('content_publisher_delete_url', $form_state->getValue('content_publisher_delete_url'))
      ->save();
  }

}
