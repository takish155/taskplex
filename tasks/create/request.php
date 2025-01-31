<?php

$session = getSession();
$t = getMessage("tasks");

if (!$session) {
  redirect("/login");
  exit;
}

$title = form("title");
$description = form("description");

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!Validation::string($title, 3, 100)) {
    $errors["title"] = $t("invalidTitle");
  }

  if (!Validation::string($description, 3, 5000)) {
    $errors["description"] = $t("invalidDescription");
  }
}


return [
  "session" => $session,
  "t" => $t,
  "title" => $title,
  "description" => $description,
];
