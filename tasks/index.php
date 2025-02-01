<?php

require " ./../../_includes/views/partials/layout.php";

$req = require "request.php";

$t = getMessage("tasks");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $method = $req["method"];

  switch ($method) {
    case "PUT":
      $errors = [];

      $title = form("title");
      $description = form("description");

      query("UPDATE tasks SET title = :title, description = :description WHERE id = :id", [
        "title" => $title,
        "description" => $description,
        "id" => $req["data"]->id,
      ]);

      setFlashMessage("success", $t("taskUpdated"));

      break;

    case "DELETE":
      query("DELETE FROM tasks WHERE id = :id", [
        "id" => $req["data"]->id,
      ]);

      setFlashMessage("success", $t("taskDeleted"));
      redirect("/dashboard");

      exit;

      break;

    case "PATCH":
      query("UPDATE tasks SET is_finished = :is_finished WHERE id = :id", [
        "is_finished" => $req["data"]->is_finished ? 0 : 1,
        "id" => $req["data"]->id,
      ]);

      setFlashMessage("success", $req["data"]->completed ? $t("markIncompleteSuccess") : $t("markCompleteSuccess"));
      redirect("/dashboard");

      break;
  }

  // Reload the data after the update
  $req["data"] = query("SELECT * FROM tasks WHERE id = :id", [
    "id" => $req["data"]->id,
  ])->fetch();
}

loadPage("task", [
  "t" => $t,
  "data" => $req["data"],
  "taskList" => $req["taskList"],
  "errors" => $req["errors"] ?? [],
]);
