<?php

function basePath($path)
{
  return __DIR__ . "$path";
}


/**
 * Load the partials
 * 
 * @param string $partialName
 * @return void
 */

function loadPartials($partialName, $props = [])
{
  $path = basePath("/_includes/views/partials/$partialName.php");

  if (file_exists($path)) {
    extract($props);
    require $path;
  } else {
    echo "Path of $partialName doesn't exist!";
  }
}

/**
 * Load the Page
 * 
 * @param string $name
 * @param array $props = []
 * @return void
 */

function loadPage($name, $props = [])
{
  $path = basePath("/_includes/views/pages/$name-page.php");


  if (file_exists($path)) {
    // Makes the props available in the view
    extract($props);
    require $path;
  } else {
    echo "Path of $name doesn't exist!";
  }
}

/**
 * Redirects to given url
 * @param string $url
 * @return void
 */


function redirect($url)
{
  $lang = $_GET["lang"] ?? "";

  if ($lang && !str_contains($url, "lang")) {
    if (str_contains($url, "?")) {
      header("Location: " . url("$url&lang=$lang"));
      exit;
    }
    header("Location: " . url("/$url?lang=$lang"));
    exit;
  }

  header("Location: " . url($url));
  exit;
}

/**
 * Access the $_POST[]
 */
function form($key, $shouldClean = true)
{
  if (!$shouldClean) {
    return $_POST[$key] ?? "";
  }

  return htmlspecialchars($_POST[$key] ?? "");
}


/**
 * Get url
 * 
 */
function url($path, $abs = false)
{

  // Production
  // $url = "/takish155/omnitask";

  // Local
  $url = "/omnitask";

  if ($abs) {
    return "$url$path";
  }

  $lang = $_GET["lang"] ?? "";
  if ($lang && !str_contains($path, "lang")) {
    if (str_contains($path, "?")) {
      return basePath("$path&lang=$lang");
    }

    return "$url$path?lang=$lang";
  }

  return "$url$path";
}
