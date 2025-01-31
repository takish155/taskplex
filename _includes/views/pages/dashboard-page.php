<?php
?>

<main class="w-[95%] mx-auto">
  <?= loadPartials("flash-message") ?>
  <div class="flex justify-between">
    <?= loadPartials("task-list", [
      "data" => $data,
      "t" => $t,
    ]) ?>
    <section class="w-[70%]">a</section>
  </div>
</main>