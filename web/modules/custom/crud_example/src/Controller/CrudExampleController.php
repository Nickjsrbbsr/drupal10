<?php

namespace Drupal\crud_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;

class CrudExampleController extends ControllerBase {

//   public function listItems() {
//     $connection = Database::getConnection();
//     $query = $connection->select('crud_example', 'ce')
//       ->fields('ce', ['id', 'name', 'description']);
//     $results = $query->execute()->fetchAll();

//     $output = [];
//     foreach ($results as $record) {
//       $output[] = [
//         'id' => $record->id,
//         'name' => $record->name,
//         'description' => $record->description,
//       ];
//     }

//     return [
//       '#theme' => 'item_list',
//       '#items' => $output,
//     ];
//   }

public function listItems() {
    $connection = Database::getConnection();
    $query = $connection->select('crud_example', 'ce')
      ->fields('ce', ['id', 'name', 'description']);
    $results = $query->execute()->fetchAll();
  
    $items = [];
    foreach ($results as $record) {
      $items[] = [
        'id' => $record->id,
        'name' => $record->name,
        'description' => $record->description,
      ];
    }
  
    return [
      '#theme' => 'crud_example_list',
      '#items' => $items,
    ];
  }
  
}
