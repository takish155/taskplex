<?php
$session = getSession();
$t = getMessage("dashboard");

$tasks = query("
SELECT id, title, is_finished FROM tasks 
WHERE user_id = :user_id 
ORDER BY is_finished ASC, created_at DESC
", [
  "user_id" => $session["id"],
])->fetchAll();
?>


<div class="w-[25%] max-lg:hidden">
  <ul class="menu rounded-box w-full">
    <li>
      <h2 class="menu-title"><?= $t("tasks") ?></h2>
      <ul>
        <?php foreach ($tasks as $task): ?>
          <li><a href="<?= url("/tasks?id=$task->id") ?>"><?= $task->is_finished ? "&#9989;"   : "" ?><?= $task->title ?></a></li>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
</div>