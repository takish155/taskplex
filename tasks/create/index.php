<?php

require "./../../_includes/views/partials/layout.php";

$req = require "request.php";
$t = $req["t"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($req["errors"])) {
  query("INSERT INTO tasks (title, description, user_id, is_finished) VALUES (:title, :description, :user_id, false)", [
    ":title" => $req["title"],
    ":description" => $req["description"],
    ":user_id" => $req["session"]["id"],
  ]);

  $id = query("SELECT id FROM tasks WHERE title = :title", [":title" => $req["title"]])->fetch()->id;

  setFlashMessage("success", $t("taskCreated"));
  redirect("/tasks?id=$id");
  exit;
}

loadPage("create-task", [
  "t" => $req["t"],
  "errors" => $req["errors"] ?? [],
]);
