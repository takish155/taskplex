<?php

require "./_includes/views/partials/layout.php";

$t = getMessage("home");

loadPage("home", [
  "t" => $t,
]);
