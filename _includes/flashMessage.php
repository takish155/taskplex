<?php


function setFlashMessage($key, $message)
{
  $_SESSION['flashMessage'][$key] = $message;
}

function getFlashMessage($key)
{
  if (isset($_SESSION['flashMessage'][$key])) {
    $message = $_SESSION['flashMessage'][$key];
    unset($_SESSION['flashMessage'][$key]);

    return $message;
  }

  return null;
}
