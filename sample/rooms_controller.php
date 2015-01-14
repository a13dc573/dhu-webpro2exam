<?php
class RoomsController{
  function index(){
    rooms = Room.all();

    $model_data = array('部屋1', '部屋2', '部屋3');
    include('views/rooms/index.php');
  }
}


$controller = new RoomsController($_POST);
$controller->index();