<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Портал агентов ЭкоБраво</title>
    <link href="img/favicon.jpg" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="/css/bootstrap.min.css?v=1" rel="stylesheet">
    <link href="/css/doka.css?v=1.6" rel="stylesheet">
    <link href="/fonts/fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-projects" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><strong>EchoBravo</strong></a>

        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="mainNav">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            </ul>
        </div>
    </div>
</nav>

<div class="container">


    @yield('content')

</div>

<div class="container-fluid">
    <div class="row">

    </div>
</div>


<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

@yield('pageScript')


</body>
</html>
