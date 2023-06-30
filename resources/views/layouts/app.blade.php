<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>BudgetTracker: Free Online Money Management</title>
</head>
    <body>

        <nav class="navbar is-spaced" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>
        
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
            </div>
        
            <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="#">
                <span class="icon is-medium">
                    <i class="fas fa-home fa-lg"></i>
                </span>
                <span>Home</span>
                </a>
                <a class="navbar-item" href="#">
                <span class="icon is-medium">
                    <i class="fas fa-arrow-down fa-lg"></i>
                </span>
                <span>Income</span>
                </a>
                <a class="navbar-item" href="#">
                <span class="icon is-medium">
                    <i class="fas fa-arrow-up fa-lg"></i>
                </span>
                <span>Expenses</span>
                </a>
                <a class="navbar-item" href="#">
                <span class="icon is-medium">
                    <i class="fas fa-chart-pie fa-lg"></i>
                </span>
                <span>Summary</span>
                </a>
            </div>
            <div class="navbar-end">
                <a class="navbar-item" href="#">
                <span class="icon is-medium">
                    <i class="fas fa-plus fa-lg"></i>
                </span>
                <span></span>
                </a>
            </div>
        </nav>

        <div class="container is-fluid">
            @yield('content')
        </div>
    </body>
</html>