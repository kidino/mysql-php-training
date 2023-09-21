<?php
require_once '../autoload.php';
session_start();

$templates = new League\Plates\Engine('../templates');

require_once '../database.php';
require_once '../routes.php';

