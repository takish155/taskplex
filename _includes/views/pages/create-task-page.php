<main class="min-h-screen w-[95%] mx-auto">
  <section class="w-[95%] max-w-[600px] mx-auto mt-[5rem] mb-[10rem]">
    <div class="mb-8">
      <h2 class="text-center font-bold text-2xl"><?= $t("createTask") ?></h2>
      <p class="text-center mb-4 text-sm"><?= $t("createTaskDescription") ?></p>
      <?= loadPartials("flash-message") ?>
    </div>
    <form method="POST">
      <div class="mb-4">
        <input min="3" max="100" value="<?= $title ?? "" ?>" min="3" max="100" required class="<?= $errors["title"] ?? "" ? "border-error" : "" ?> input input-bordered w-full input-md mx-auto" type="text" name="title" placeholder="<?= $t("title") ?>">
        <?php if ($errors["title"] ?? "") : ?>
          <p class="text-xs text-error"><?= $errors["title"] ?></p>
        <?php endif; ?>
      </div>
      <div class="mb-4">
        <textarea min="3" max="3000" required class="<?= $errors["description"] ?? "" ? "border-error" : "" ?> textarea input-bordered min-h-[300px] w-full input-md mx-auto" type="text" name="description" placeholder="<?= $t("description") ?>"><?= $description ?? "" ?></textarea>
        <?php if ($errors["description"] ?? "") : ?>
          <p class="text-xs text-error"><?= $errors["description"] ?></p>
        <?php endif; ?>
      </div>

      <button class="btn btn-primary w-full btn-sm"><?= $t("createTask") ?></button>
    </form>
  </section>
</main>

<?= loadPartials("footer") ?>