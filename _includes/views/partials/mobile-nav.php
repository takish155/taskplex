<?php

$t = getMessage("header");
$session = getSession();

?>

<div x-data="{ open: false }" class="lg:hidden">
  <svg
    x-on:click="open = true"
    class="swap-off fill-current"
    xmlns="http://www.w3.org/2000/svg"
    width="32"
    height="32"
    viewBox="0 0 512 512">
    <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
  </svg>

  <nav x-show="open" class="fixed overflow-y-scroll w-full z-50 top-0 left-0 bg-base-200 h-[100vh]">
    <svg
      x-on:click="open = false"
      class="swap-on fill-current ml-auto m-4"
      xmlns="http://www.w3.org/2000/svg"
      width="32"
      height="32"
      viewBox="0 0 512 512">
      <polygon
        points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
    </svg>
    <ul class="menu rounded-box w-full">
      <li class="menu-title flex mb-3">Omnitask</li>
      <li><a href="<?= url("/") ?>"><?= $t("home") ?></a></li>
      <?php if (!$session): ?>
        <li><a href="<?= url("/login") ?>"><?= $t("signIn") ?></a></li>
        <li><a href="<?= url("/register") ?>"><?= $t("signUp") ?></a></li>
      <?php else: ?>
        <?php

        $tasks = query("
        SELECT id, title, is_finished FROM tasks 
        WHERE user_id = :user_id 
        ORDER BY is_finished ASC, created_at DESC
        ", [
          "user_id" => $session["id"],
        ])->fetchAll();

        ?>
        <li><a href="<?= url("/dashboard") ?>"><?= $t("dashboard") ?></a></li>
        <li><a href="<?= url("/tasks/create") ?>"><?= $t("createTask") ?></a></li>
        <li class="mb-10">
          <details open>
            <summary><?= $t("tasks") ?></summary>
            <ul>
              <?php foreach ($tasks as $task): ?>
                <li><a class="<?= $id === $task->id ? "active" : ""  ?>" href="<?= url("/tasks?id=$task->id") ?>"><?= $task->is_finished ? "&#9989;"   : "" ?><?= $task->title ?></a></li>
              <?php endforeach; ?>
            </ul>
          </details>
        </li>
        <li class="px-2 py-4 w-full bg-base-100 overflow-hidden mb-4">
          <p class="text-xs"><?= $t("yourCurrently") ?></p>
          <p class="font-bold"><?= $session["username"] ?></p>
        </li>
        <li class="text-error mb-20">
          <form action="<?= url("/logout") ?>" method="POST" class="w-full">
            <button class="w-full"><?= $t("signOut") ?></button>
          </form>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>