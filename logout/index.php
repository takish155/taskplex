<?php
require " ./../../_includes/views/partials/layout.php";

$t = getMessage("login");

$session = getSession();

if ($session) {
  destroySession();

  setFlashMessage("success", $t("logoutSuccess"));

  $lang = $_GET["lang"] ?? "";

  redirect("/login");
  exit();
}

redirect("/");
