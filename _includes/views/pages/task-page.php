<main class="w-[95%] mx-auto">
  <div class="flex justify-between">
    <?= loadPartials("task-list", [
      "data" => $taskList,
      "t" => $t,
    ]) ?>
    <section class="w-[70%] max-lg:w-full">
      <div class="mb-5 w-[90%]">
        <?= loadPartials("flash-message") ?>
      </div>
      <form method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-4">
          <p>
            <label for="title" class="text-xs"><?= $t("title") ?></label>
          </p>
          <input value="<?= $data->title ?? "" ?>" required class="<?= $errors["title"] ?? "" ? "border-error" : "" ?> input input-bordered w-[90%] input-md mx-auto mb-4" type="text" name="title" id="title" placeholder="<?= $t("title") ?>">
          <?php if ($errors["title"] ?? "") : ?>
            <p class="text-xs text-error"><?= $errors["title"] ?></p>
          <?php endif; ?>
        </div>
        <div class="mb-4">
          <p>
            <label for="description" class="text-xs"><?= $t("note") ?></label>
          </p>
          <textarea value="<?= $data->title ?? "" ?>" required class="<?= $errors["title"] ?? "" ? "border-error" : "" ?> min-h-[60vh] textarea input-bordered w-[90%] input-md mx-auto mb-4" type="text" name="description" id="description" placeholder="<?= $t("title") ?>"><?= $data->description ?></textarea>
          <?php if ($errors["title"] ?? "") : ?>
            <p class="text-xs text-error"><?= $errors["title"] ?></p>
          <?php endif; ?>
          <div class="flex justify-end w-[90%] mt-6">
            <button class="btn btn-primary btn-sm">
              <?= $t("updateTask") ?>
            </button>
          </div>
        </div>
      </form>
      <div class="flex gap-4 justify-end w-[90%]">
        <form method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <button class="btn btn-error btn-sm">
            <?= $t("deleteTask") ?>
          </button>
        </form>
        <form method="POST">
          <input type="hidden" name="_method" value="PATCH">
          <button class="btn btn-outline btn-sm">
            <?= $data->is_finished ? $t("markIncomplete") : $t("markComplete") ?>
          </button>
        </form>
      </div>
    </section>
  </div>
</main>