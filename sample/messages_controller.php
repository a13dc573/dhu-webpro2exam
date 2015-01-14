<?php
class RoomsController{
  public function index(){


    $model_data = array('部屋1', '部屋2', '部屋3');
    include('views/rooms/index.php');
  }
}
$controller = new RommsController();
$controller->index();