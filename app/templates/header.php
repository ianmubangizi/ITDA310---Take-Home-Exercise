<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Manager</title>
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-400">
<div>
    <nav class="flex items-center justify-between flex-wrap bg-gray-900 p-4">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <img class="fill-current h-8 w-8 mr-2" src="https://img.icons8.com/wired/64/FFFFFF/payroll.png"/>
            <span class="font-semibold text-xl tracking-tight hover:text-white"><a href="/">Payroll Console</a></span>
        </div>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-white border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex justify-end lg:w-auto">
            <div>
                <?php if ($_COOKIE['is-authenticated']) {
                    $auth = $_COOKIE['is-authenticated'];
                    if ($result = mysqli_query($db, "SELECT * FROM Users WHERE Id = '$auth';")) {
                        $user = $result->fetch_assoc();
                        echo "<a class=\"block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4\">
                                Hi, ${user['name']}
                              </a>";
                    }
                    echo "<a href=\"../dashboard.php\" class=\"block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white\">
                            Dashboard |
                          </a>
                          <a href=\"../logout.php\" class=\"block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white\">
                            Logout
                          </a>";
                } else {
                    echo "<a href=\"../login.php\" class=\"block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4\">
                            Login
                          </a>
                          <a href=\"../sign-up.php\" class=\"block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white\">
                            Register
                          </a>";
                }
                ?>
            </div>
        </div>
    </nav
</div>


