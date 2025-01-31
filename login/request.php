<?php
$t = getMessage("login");

$session = getSession();

if ($session) {
  redirect("/dashboard");
}


$errors = [];

$username = form("username");
$password = form("password", false);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!Validation::string($username, 3, 30)) {
    $errors[] = $t("invalidPassword");
  }

  if (!Validation::string($password, 6, 100)) {
    $errors[] = $t("invalidPassword");
  }
}


return [
  "errors" => $errors,
  "username" => $username,
  "password" => $password,
];
