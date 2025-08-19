<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>@yield('title')| Lahomes - Real Estate Management Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="A fully responsive premium admin dashboard template, Real Estate Management Admin Template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets_admin/favicon.ico" type="image/x-icon">

    <!-- Vendor css (Require in all Page) -->
    <link href="/assets_admin/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="/assets_admin/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config js (Require in all Page) -->
    <script src="/assets_admin/js/config.min.js"></script>
</head>

<body class="authentication-bg">
    <div style="background-color: #ffdf2e;height: 5px;width: 100%;position: fixed;top: 0;left: 0;z-index: 5;"></div>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div> <!-- end row -->
        </div>
    </div>

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="/assets_admin/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="/assets_admin/js/app.js"></script>


</body>

</html>
