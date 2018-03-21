<?php
/**
 * Created by IntelliJ IDEA.
 * User: smordi
 * Date: 3/15/2018
 * Time: 5:23 PM
 */

namespace Drupal\len_custom\ContentPublisher;

use \Drupal\node\Entity\Node;

class RestCallTrigger
{

  private $restEndpointUrl;
  //private $updatetype;
  /**
   * RestCallTrigger constructor.
   * @param array $restEndpointConfig
   */
  public function __construct($restEndpointUrl)
  {
    $this->restEndpointUrl = $restEndpointUrl;
    //$this->updatetype = $updatetype;
  }

  public function triggerApiCall(Node $node, bool $newNode){
    $t_args = ['@type' => node_get_type_label($node), '%title' => $node->link($node->label())];


    $url = $this->restEndpointUrl;
    if($node->id() ===null){

    }else {
      $url .= $node->id();
      //$guz=0;
      if ($node->isPublished()) {
        $client = new \GuzzleHttp\Client();
        try {
          $res = $client->get($url, ['http_errors' => false]);

        } catch (Exception $e) {
          drupal_set_message("Publish Failed: Unable to find publisher service:".nl2br($e->getMessage()), 'error');
          return ;
        }
        $guz = $res->getStatusCode();
        //$url = "http://contentservice.lenovo.com/node/";

        //$response = file_get_contents('http://localhost:8000/latest/USD');
        if ($guz == 200) {
          drupal_set_message("Request has been triggered to: " . $url . " (STATUS: SUCCESS)");
        } else {
          drupal_set_message("Request has been triggered to: " . $url . " (STATUS: FAILED, Error code: " . $guz . ")", 'error');
        }
      }
    }
  }
}
