<main class="min-h-screen">
  <section class="w-[95%] max-w-[400px] mx-auto mt-[5rem]">
    <div class="mb-8">
      <h2 class="text-center font-bold text-2xl"><?= $t("title") ?></h2>
      <p class="text-center mb-4 text-sm"><?= $t("description") ?></p>
      <?= loadPartials("flash-message") ?>
    </div>

    <form method="POST">
      <div class="mb-4">
        <input value="<?= $username ?? "" ?>" min="3" max="30" required class="<?= $errors["username"] ?? "" ? "border-error" : "" ?> input input-bordered w-full input-md mx-auto" type="text" name="username" placeholder="<?= $t("username") ?>">
        <?php if ($errors["username"] ?? "") : ?>
          <p class="text-xs text-error"><?= $errors["username"] ?></p>
        <?php endif; ?>
      </div>
      <div class="mb-6">
        <input value="<?= $password ?? "" ?>" min="6" max="100" required class="<?= $errors["password"] ?? "" ? "border-error" : "" ?> input input-bordered w-full input-md mx-auto" type="password" name="password" placeholder="<?= $t("password") ?>">
        <?php if ($errors["password"] ?? "") : ?>
          <p class="text-xs text-error"><?= $errors["password"] ?></p>
        <?php endif; ?>
      </div>

      <button class="btn btn-primary w-full btn-sm"><?= $t("signIn") ?></button>
      <div class="divider text-xs">OR</div>
      <a href="<?= url("/register") ?>" class="btn btn-outline w-full btn-sm"><?= $t("createAccount") ?></a>
    </form>
  </section>
</main>

<?= loadPartials("footer") ?>