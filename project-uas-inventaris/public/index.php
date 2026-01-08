<?php
if( !session_id() ) session_start();


define('BASEURL', 'http://localhost/project-uas-inventaris/public');

require_once '../app/config/Database.php';
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';

$app = new App;