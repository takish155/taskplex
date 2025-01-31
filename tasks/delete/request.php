<?php


$session = getSession();

$id = $_GET["id"] ?? "";

if (!$session || !$id) {
  redirect("/login");
}

$task = query("SELECT * FROM tasks WHERE id = :id", [
  "id" => $id,
])->fetch();

if (!$task) {
  redirect("/dashboard");
}

if ($task->user_id !== $session["id"]) {
  redirect("/dashboard");
}

return [
  "session" => $session,
  "task" => $task,
];
