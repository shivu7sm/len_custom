<?php
/**
 * Created by IntelliJ IDEA.
 * User: smordi
 * Date: 1/17/2018
 * Time: 5:43 PM
 */

namespace Drupal\len_custom\Controller;

use  Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\NodeType;
use Drupal\node\NodeInterface;


class PageViewController extends ControllerBase
{
  public function displayRelations(NodeInterface $node, $delta){
    echo "Hello". " " . "Welcome";
    $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
    $str = "Hello".$node->getTitle();
// If you need to display them in a drop down:
    $options = [];

    $myobj= new \stdClass();
    $myobj->firstName= 'Shiva';
    $myobj->lastName= 'Mordi';


    foreach ($node_types as $node_type) {
      $options[$node_type->id()] = $node_type->label();
      $str .= "<br>".$node_type->label(). "<br>";
    }

    $url = "<br> URL: ".$node->getEntityTypeId()."/".$node->id()." : ".$node->getType();
    $response = file_get_contents('http://api.fixer.io/latest');
    $response .= $url;
    //$response = json_decode($response);
    /*$client = new \HttpRequest('http://localhost:8000/latest/USD','GET');
    $response = $client ->getResponseBody();*/

    $comp = $node->get('field_context')->get(0)->getString();
    $response .= $comp;
    $response .= "<br><h2>". $myobj->firstName." ".$myobj->lastName."</h2>";
    $render_array['data'] = array(
      '#show_messages' => TRUE,
      '#type' => 'markup',
      '#attached' => array(
        'library' => array(
          'lenovo_content/lenovo-content',
        ),
      ),
      '#markup' => $this->t($str."<br>".$response, array('@title' => $node->title->value, '@delta' => $delta)),
    );
    $element=array(
      '#markup' => '<h1> HELLOOOOO</h1>',
      '#attached' => array(
        'library' => array(
          'lenovo_content/lenovo-content',
        ),
      ),
    );
    return $render_array;
  }
}
