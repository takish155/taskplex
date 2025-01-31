<?php

$success = getFlashMessage("success");
$error = getFlashMessage("error");

?>

<?php if ($success) : ?>
  <div class="w-full text-xs alert alert-success">
    <p><?= $success ?></p>
  </div>
<?php endif ?>

<?php if ($error) : ?>
  <div class="w-full text-xs alert alert-error">
    <?= $error ?>
  </div>
<?php endif ?>