<?php
//include Config
require('config.php');
require('classes/Bootstrap.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
