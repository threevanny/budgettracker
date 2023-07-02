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
            <a class="navbar-item" href="{{ route('transaction.index') }}">
                <img src="{{ asset('assets/images/logo.png') }}" width="112" height="28">
            </a>
        
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
            </div>
        
            <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="{{ route('transaction.index') }}">
                <span class="icon is-medium">
                    <i class="fas fa-wallet fa-lg"></i>
                </span>
                <span>Transactions</span>
                </a>
                <a class="navbar-item" href="{{ route('transaction.income') }}">
                <span class="icon is-medium">
                    <i class="fas fa-arrow-down fa-lg"></i>
                </span>
                <span>Income</span>
                </a>
                <a class="navbar-item" href="{{ route('transaction.expense') }}">
                <span class="icon is-medium">
                    <i class="fas fa-arrow-up fa-lg"></i>
                </span>
                <span>Expenses</span>
                </a>
                <a class="navbar-item" href="{{ route('transaction.summary') }}">
                <span class="icon is-medium">
                    <i class="fas fa-chart-pie fa-lg"></i>
                </span>
                <span>Summary</span>
                </a>
            </div>
            <div class="navbar-end">
                <a class="navbar-item" href="javascript:void(0);" data-target="modal-form" id="open-modal">
                <span class="icon is-medium">
                    <i class="fas fa-plus fa-lg"></i>
                </span>
                <span></span>
                </a>
            </div>
        </nav>

        @yield('content')

        @include('transaction.modal.create')
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>