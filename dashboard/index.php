<?php

require " ./../../_includes/views/partials/layout.php";

$req = require "request.php";
$t = getMessage("dashboard");

$userId = $req["session"]["id"];

$data = query("SELECT id, title, is_finished FROM tasks WHERE user_id = :user_id", [
  "user_id" => $userId,
])->fetchAll();

loadPage("dashboard", [
  "t" => $t,
  "data" => $data,
]);
