<?php

$session = getSession();

if (!$session) {
  redirect("/login");
}

return [
  "session" => $session
];
