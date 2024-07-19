<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="EduZone - Bootstrap Admin Dashboard" />
    <meta property="og:title" content="EduZone - Bootstrap Admin Dashboard" />
    <meta property="og:description" content="EduZone - Bootstrap Admin Dashboard" />
    <meta name="format-detection" content="telephone=no">
    <title>CodeZone - Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('client_assets/images/logo/logo-vector.png') }}"/>
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">

</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-5">
                <div class="form-input-content text-center error-page">
                    <h1 class="error-text font-weight-bold">404</h1>
                    <h4><i class="fas fa-exclamation-triangle text-warning"></i> The page you were looking for is not found!</h4>
                    <p>You may have mistyped the address or the page may have moved.</p>
                    <div>
                        <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
