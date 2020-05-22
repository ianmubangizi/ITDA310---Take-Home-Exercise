<?php
include "utils/connection.php";
include "templates/header.php";
if ($_COOKIE['is-authenticated']) {
    header('Location: dashboard.php');
} else {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($result = mysqli_query($db, "SELECT * FROM Users WHERE email = '$email';")) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                setcookie('is-authenticated', $user['Id'], 0, '/');
                header('Location: dashboard.php');
            }
        }
    }
}
?>
<section class="w-full max-w-xs m-auto pt-32">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="login.php" method="post"
          onsubmit="return validate(this, {min: 0, max: 2})">
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
        <div class="flex items-center justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none
                focus:shadow-outline"
                    type="submit" name="submit">
                Sign In
            </button>
        </div>
    </form>
</section>
<?php include "templates/footer.php"; ?>
