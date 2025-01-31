<?php

$NAME = "omnilist";

session_start();

require_once __DIR__ . "./../../../helpers.php";

require_once basePath("/_includes/session.php");
require_once basePath("/_includes/db.php");
require_once basePath("/_includes/message.php");
require_once basePath("/_includes/validation.php");
require_once basePath("/_includes/flashMessage.php");
require_once basePath("./_includes/validation.php");

$lang = $_GET["lang"] ?? "en";

?>


<html data-theme="business" lang="<?= $lang ?>" class="<?= $lang === "ja" ? "font-japanese" : "font-poppins" ?>">

<head>
  <link rel="stylesheet" href="/<?= $NAME ?>/public/css/output.css?v=<?= time() ?>" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Omnitask</title>

</head>

<?= loadPartials("/header") ?>

</html>