<?php

$session = getSession();
$t = getMessage("header");

?>

<header class="py-4 flex justify-around items-center">
  <h1 class="font-bold text-2xl font-poppins"><a href="<?= url("/") ?>">Omnitask</a></h1>
  <nav>
    <ul class="flex items-center gap-6 font-medium text-sm max-lg:hidden">
      <?php if (isset($session)): ?>
        <li><a href="<?= url("/") ?>"><?= $t("home") ?></a></li>
        <li><a href="<?= url("/dashboard") ?>"><?= $t("dashboard") ?></a></li>
        <li><a href="<?= url("/tasks/create") ?>"><?= $t("createTask") ?></a></li>
      <?php else: ?>
        <li><a href="<?= url("/") ?>"><?= $t("home") ?></a></li>
        <li><a href="<?= url("/login") ?>"><?= $t("signIn") ?></a></li>
        <li><a href="<?= url("/register") ?>"><?= $t("signUp") ?></a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <!-- <p>wdadwadwadwa</p> -->
  <details class="max-lg:hidden dropdown dropdown-end">
    <summary class="btn btn-ghost m-1"><img src="<?= url("/public/images/profile.png") ?>" class="w-10 brightness-0 invert" /></summary>
    <ul class="menu dropdown-content rounded-box z-[1] w-[300px] p-2 bg-base-200 text-sm">
      <?php if ($session): ?>
        <div class="px-2 py-4 w-full overflow-hidden mb-4">
          <p class="text-xs"><?= $t("yourCurrently") ?></p>
          <p class="font-bold"><?= $session["username"] ?></p>
        </div>
        <li class="text-error">
          <form action="<?= url("/logout") ?>" method="POST" class="w-full">
            <button class="w-full"><?= $t("signOut") ?></button>
          </form>
        </li>
      <?php else: ?>
        <li><a href="<?= url("/login") ?>"> <?= $t("signIn") ?></a></li>
        <li><a href="<?= url("/register") ?>"><?= $t("signUp") ?></a></li>
      <?php endif; ?>
    </ul>
  </details>
  <?= loadPartials("mobile-nav") ?>
</header>