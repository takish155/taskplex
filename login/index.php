<?php

require " ./../../_includes/views/partials/layout.php";

$t = getMessage("login");

$req = require basePath("./login/request.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $errors = $req["errors"] ?? [];

  if (!$errors) {
    $result = query("SELECT * FROM users WHERE username = :username", [
      ":username" => $req["username"]
    ])->fetch();

    if ($result) {
      if (password_verify($req["password"], $result->password)) {
        setSession($result->id, $result->username);
        redirect("/dashboard");
        exit;
      }
    }

    setFlashMessage("error", $t("invalidCredentials"));
  }
}
?>

<?php

loadPage("login", [
  "t" => $t,
  "username" => $req["username"] ?? "",
  "password" => $req["password"] ?? "",
  "errors" => $req["errors"] ?? []
]);
