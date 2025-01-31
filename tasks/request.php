<?php

$session = getSession();
$t = getMessage("tasks");

if (!$session) {
  redirect("/login");
}

$id = $_GET["id"] ?? "";

if (!$id) {
  redirect("/dashboard");
}

$taskList = query("SELECT id, title, is_finished FROM tasks WHERE user_id = :user_id", [
  "user_id" => $session["id"],
])->fetchAll();

$data = query("SELECT * FROM tasks WHERE id = :id", [
  "id" => $id,
])->fetch();

if (!$data) {
  redirect("/dashboard");
}

if ($data->user_id !== $session["id"]) {
  redirect("/dashboard");
}

$method = form("_method") ?? "POST";

$errors = [];

if ($method === "PUT") {
  $title = form("title");
  $description = form("description");

  if (!Validation::string($title, 3, 100)) {
    $errors["title"] = $t("invalidTitle");
  }

  if (!Validation::string($description, 3, 5000)) {
    $errors["description"] = $t("invalidDescription");
  }
}


return [
  "session" => $session,
  "taskList" => $taskList,
  "method" => $method,
  "errors" => $errors,
  "data" => $data,
];
