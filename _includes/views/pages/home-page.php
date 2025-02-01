  <main class="w-[95%] mx-auto min-h-[70vh]">
    <section class="mt-[15vh]">
      <h2 class="text-center font-bold mb-2 text-6xl max-lg:text-4xl max-sm:text-xl">
        <?= $t("title") ?>&#9989;
      </h2>
      <p class="text-center max-sm:text-xs">
        <?= $t("description") ?>
      </p>
      <div class="flex justify-center mb-10">
        <a href="<?= url("/register") ?>" class="btn btn-primary btn-sm mt-4">
          <?= $t("getStarted") ?>
        </a>
      </div>
      <div class="card bg-base-200 w-[95%] mx-auto max-w-[500px] p-3 rounded-sm">
        <p class="mb-2 text-center text-sm max-sm:text-xs"><?= $t("quote") ?></p>
        <p class="text-end text-xs">- A Wise Man</p>
      </div>
    </section>
  </main>

  <?= loadPartials("footer") ?>