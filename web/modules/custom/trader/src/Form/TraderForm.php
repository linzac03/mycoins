<?php

namespace Drupal\trader\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\trader\Controller\AccountController;

class TraderForm extends ConfigFormBase {

  protected function getEditableConfigNames() {
    return [
      'trader.settings',
    ];
  }

  public function getFormId() {
    return 'trader_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('trader.settings');
   
    $form['buy_in'] = [
      '#type' => 'number',
      '#title' => 'Amount to buy in with (USD)',
      '#default_value' => $config->get('buy_in')
    ];
    
    $form['split'] = [
      '#type' => 'number',
      '#title' => 'Split buy in amount',
      '#description' => 'Defaults to 1, any number higher than 1 is the total amount of buys made (Buy in = $100, Split = 2, results in 2 buys of $50)',
      '#min' => 1,
      '#step' => 1,
      '#default_value' => $config->get('split')
    ];
    
    $form['stop_loss'] = [
      '#type' => 'number',
      '#title' => 'Stop loss at (%)',
      '#min' => 1,
      '#step' => 1,
      '#default_value' => $config->get('stop_loss')
    ];

    

    return parent::buildForm($form, $form_state);
  }
//Not needed?
/*
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('connected_accounts.settings')
      ->set('twitter.username', $form_state->getValue('twitter.username'))
      ->set('twitter.password', $form_state->getValue('twitter.password'))
      ->save();
  }
*/

}
