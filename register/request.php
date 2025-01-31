<?php
$session = getSession();

if ($session) {
  redirect("/dashboard");
}

$t = getMessage("register");

$username = form("username");
$password = form("password", false);
$password_verify = form("password_verify", false);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (!Validation::string($username, 3, 15)) {
    $errors["username"] = $t("usernameError");
  }

  if (!Validation::string($password, 6, 100)) {
    $errors["password"] = $t("passwordError");
  }

  if (!Validation::match($password, $password_verify)) {
    $errors["password_verify"] = $t("passwordVerifyError");
  }
}

return [
  "errors" => $errors,
  "username" => $username,
  "password" => $password,
  "password_verify" => $password_verify,
];
