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
        
        <div class="modal" id="modal-form">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                <form action="{{ route('transaction.store') }}" id="form_transaction" method="POST" enctype="multipart/form-data">
                    @csrf @method('POST')
                    <div class="field">
                        <label class="label" for="type">Income/Expense</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                            <select name="type_id" id="type" data-url="{{ route('json.getdata') }}" required>
                                @if ($types)
                                    <option value="">Choose...</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                    
                                @endif
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="category">Category</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                            <select name="category_id" id="category" data-url="{{ route('json.getdata') }}" required>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="subcategory">Subcategory</label>
                        <div class="control is-expanded">
                            <div class="select is-fullwidth">
                            <select name="subcategory_id" id="subcategory" required>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="amount">Amount</label>
                        <div class="control">
                            <input class="input" type="number" name="amount" id="amount" placeholder="9999.00" step="0.01" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="about">About</label>
                        <div class="control">
                            <textarea class="textarea" name="about" id="about" rows="2" maxlength="140" placeholder="Write something..."></textarea>
                        </div>
                    </div>

                    <button class="button is-link" id="submit-form">Save</button>
                    <button class="button is-link is-light" id="close-modal">Cancel</button>
                </form>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" id="modal-close"></button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>