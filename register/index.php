<?php

require " ./../../_includes/views/partials/layout.php";

$t = getMessage("register");

$username = "";
$password = "";
$password_verify = "";

$errors = [];

$req = require "request.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $req["username"];
  $password = $req["password"];
  $password_verify = $req["password_verify"];

  $errors = $req["errors"];

  if (!$errors) {
    $usernameExist = query("SELECT * FROM users WHERE username = :username", [":username" => $username])->fetch();

    if ($usernameExist) {
      setFlashMessage("error", $t("usernameExist"));
    } else {
      query("INSERT INTO users (username, password) VALUES (:username, :password)", [
        ":username" => $username,
        ":password" => password_hash($password, PASSWORD_DEFAULT)
      ]);

      $id = query("SELECT id FROM users WHERE username = :username", [":username" => $username])->fetch()->id;

      setFlashMessage("success", $t("accountCreated"));
      setSession($id, $username);

      redirect("/dashboard");

      exit;
    }
  };
}


loadPage("register", [
  "t" => $t,
  "username" => $username,
  "password" => $password,
  "password_verify" => $password_verify,
  "errors" => $errors,
]);
