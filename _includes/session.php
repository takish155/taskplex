<?php

function getSession()
{
  if (isset($_SESSION['user'])) {
    return $_SESSION['user'];
  }

  return null;
}


function setSession($id, $username)
{
  $_SESSION['user'] = [
    'id' => $id,
    'username' => $username,
  ];
}

function destroySession()
{
  unset($_SESSION['user']);
  session_destroy();
}
