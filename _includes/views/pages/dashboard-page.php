<?php

$totalTask = count($data) ?? 0;
$completedTask = count(array_filter(
  $data,
  fn($task) => $task->is_finished
)) ?? 0;
$incompleteTask = count(array_filter(
  $data,
  fn($task) => !$task->is_finished
)) ?? 0;



?>

<main class="w-[95%] mx-auto min-h-screen">
  <?= loadPartials("flash-message") ?>
  <div class="flex justify-between">
    <?= loadPartials("task-list", [
      "data" => $data,
      "t" => $t,
    ]) ?>
    <section class="w-[70%] max-lg:w-full flex justify-between mt-6 flex-wrap">
      <div class="w-full card bg-base-100 mx-auto  shadow-md mb-10 p-2 py-10 max-w-[400px]">
        <h3 class="mb-4"><?= $t("totalTask") ?></h3>
        <p class="font-extrabold text-2xl text-center"><?= $totalTask ?></p>
      </div>
      <div class="w-full card bg-base-100 mx-auto  shadow-md mb-10 p-2 py-10 max-w-[400px]">
        <h3 class="mb-4"><?= $t("completedTask") ?></h3>
        <p class="font-extrabold text-2xl text-center"><?= $completedTask ?></p>
      </div>
      <div class="w-full card bg-base-100 mx-auto  shadow-md mb-10 p-2 py-10 max-w-[400px]">
        <h3 class="mb-4"><?= $t("incompleteTask") ?></h3>
        <p class="font-extrabold text-2xl text-center"><?= $incompleteTask ?></p>
      </div>
    </section>
  </div>
</main>

<?= loadPartials("footer") ?>