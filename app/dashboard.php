<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Payroll Dashboard</title>
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">Payroll Console</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="./logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            <span data-feather="users"></span>
                            Employees <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="ml-2 btn btn-outline-primary btn-sm" href="dashboard.php?increase_salary">
                            <span data-feather="briefcase"></span>
                            Increase Salary
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">
                    Dashboard | <?php echo isset($_GET['increase_salary']) ? "Increased" : "Current" ?> Salary
                </h1>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th><?php echo isset($_GET['increase_salary']) ? "Old Salary" : "Salary" ?></th>
                        <?php if (isset($_GET['increase_salary'])) { ?>
                            <th>New Salary</th>
                        <?php } ?>
                        <th>Department</th>
                        <th>Commission</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php include "utils/connection.php";
                    if (isset($_GET['increase_salary'])) {
                        $result = mysqli_query($db, "CALL increase_salary();");
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>${row['EmpId']}</td>
                                <td>${row['EmpName']}</td>
                                <td>${row['JobTitle']}</td>
                                <td>${row['OldSalary']}</td>
                                <td>${row['NewSalary']}</td>
                                <td>${row['DeptNo']}</td>
                                <td>${row['Commission']}</td>
                              </tr>";
                        }

                    }
                    $result = mysqli_query($db, "SELECT * FROM EmpTable");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>${row['EmpNo']}</td>
                                <td>${row['EmpName']}</td>
                                <td>${row['JobTitle']}</td>
                                <td>${row['Salary']}</td>
                                <td>${row['DeptNo']}</td>
                                <td>${row['Commission']}</td>
                              </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>feather.replace()</script>
</body>
</html>

