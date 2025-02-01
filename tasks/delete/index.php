<?php

$req = require "request.php";
$t = getMessage("tasks");

query("DELETE FROM tasks WHERE id = :id", [
  "id" => $req["task"]->id,
]);

setFlashMessage("success", $t("taskDeleted"));

redirect("/dashboard");
exit;
