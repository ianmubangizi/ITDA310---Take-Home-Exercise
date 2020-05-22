<?php
include "utils/connection.php";
include "templates/header.php";
if ($_COOKIE['is-authenticated']) {
    header('Location: index.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['full-name'];
        $email = $_POST['email'];
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        if(mysqli_query($db, "INSERT INTO Users (name, email, password) VALUES ('$name', '$email', '$hash');")){
            header('Location: login.php');
        }
    }
}
?>
<section class="w-full max-w-xs m-auto pt-32">

    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" onsubmit="return validate(this, {min: 0, max: 4})"
          action="sign-up.php" method="post">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="full-name">
                Full Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                focus:outline-none focus:shadow-outline"
                   name="full-name" id="full-name" type="text" placeholder="Joe Connor">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email Address
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                focus:outline-none focus:shadow-outline"
                   name="email" id="email" type="email" placeholder="you@example.com">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight
                focus:outline-none focus:shadow-outline"
                   name="password" id="password" type="password" placeholder="************">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm">
                Confirm Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight
                focus:outline-none focus:shadow-outline"
                   name="confirm" id="confirm" type="password" placeholder="************">
        </div>
        <div class="flex items-center justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none
                focus:shadow-outline"
                    type="submit" name="submit">
                Submit
            </button>
        </div>
    </form>
</section>
<?php include "templates/footer.php"; ?>

