<?php
require " ./../../_includes/views/partials/layout.php";

$t = getMessage("login");

$session = getSession();

if ($session) {
  destroySession();

  return redirect("/login");
} else {
  return redirect("/");
}
