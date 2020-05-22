<?php
require_once "./utils/connection.php";
include "templates/header.php";
?>
<div class="my-auto mx-auto max-w-lg overflow-hidden self-center">
    <?php include_once "utils/alert.php" ?>
    <img class="w-full pt-5"
         src="https://images.unsplash.com/photo-1556155092-490a1ba16284?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1080&q=80"
         alt="Sunset in the mountains">
    <div class="px-6 py-4 text-center">
        <div class="font-bold text-xl mb-2">Welcome to Payroll Admin Console</div>
        <p class="my-auto mx-auto text-gray-700 text-base">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis
            eaque, exercitationem praesentium nihil.
        </p>
    </div>
</div>
<?php include "templates/footer.php"; ?>
