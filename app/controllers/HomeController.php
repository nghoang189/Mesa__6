<?php
require_once('../app/models/User.php');

class HomeController
{
  public function index()
  {
    require_once('../app/views/home.php');
  }
}
