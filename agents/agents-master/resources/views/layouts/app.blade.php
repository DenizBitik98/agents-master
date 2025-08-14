<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Портал агентов ЭкоБраво</title>
    <link href="img/favicon.jpg" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/fonts/fontawesome/css/all.css" rel="stylesheet">
    <link href="/css/offcanvas.css" rel="stylesheet">
    <link href="/css/doka.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/js/jquery-ui/jquery-ui.css" rel="stylesheet">
	<link href="/css/jquery-ui-timepicker-addon.css" rel="stylesheet">

    <style type="text/css">
        #load{
            width:100%;
            height:100%;
            position:fixed;
            z-index:9999;
            background:url("/img/spinner.gif") no-repeat center center rgba(0,0,0,0.25)
        }
    </style>
</head>
<body>
<nav class="container-fluid navbar navbar-expand-lg fixed-top navbar-dark bg-projects" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><strong>EchoBravo</strong></a>
        <div class="flex-grow-1 mobbtnmenu">

        </div>

        <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse offcanvas-collapse bg-projects" id="mainNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item" id="liclosetoptop">
                    <a class="btn btn-dark float-end mt-1" href="#" id="closesidetop"><i
                            class="fas fa-times-circle"></i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active borderbot" href="{{route('searchTrain')}}" id="main_prjs">
                        <i class="fa-solid fa-train"></i> {{trans('menu.main.ktj')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/docs" id="main_regs">
                        <i class="fa-solid fa-plane"></i> {{trans('menu.main.avia')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/docs" id="main_regs">
                        <i class="fa-solid fa-hotel"></i> {{trans('menu.main.hotel')}}</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" aria-current="page" href="#" id="main_pers"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i><span class="menuhide"> {{--{{persname}}--}}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown02">
                        <li><a class="dropdown-item" href="#">{{@Auth::user()->name}}</a></li>
                        <li><a class="dropdown-item" href="{{ route('changePassword') }}">{{trans('menu.user.personal space')}}</a></li>
                        <li><a class="dropdown-item" href="{{ route('changeSettings') }}">{{trans('settings.menu')}}</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">{{trans('menu.user.log out')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm btn-teal mt-1" href='https://api.whatsapp.com/send?phone=77750471247'><i class="fa-brands fa-whatsapp"></i> Поддержка</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid nav-scroller bg-body shadow-sm">
    <div id="load"></div>
    <nav class="nav nav-underline" aria-label="Secondary navigation">
        <a class="nav-link" aria-current="page" href="{{route('searchTrain')}}" id="inmenu_prmain">
            {{trans('menu.main.ktj')}} &gt;
        </a>
        @if(Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('agents')}}">
                    <i class="fa-solid fa-user"></i> {{trans('menu.ktj.agents')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('exportOrders')}}">
                    <i class="fa-solid fa-file-export"></i> {{trans('menu.ktj.export')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('orders')}}">
                    <i class="fa-solid fa-check-circle"></i> {{trans('menu.ktj.orders')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('getAnnouncement')}}">
                    <i class="fa-solid fa-scroll"></i> {{trans('menu.ktj.announcement')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('stations.index') }}">
                    <i class="fa-solid fa-tag"></i> Станции
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('mreturns.index')}}">
                    <i class="fa-solid fa-arrow-up"></i> Возвраты
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('exporttoftp.index')}}">
                    <i class="fa-solid fa-file-export"></i> Выгрузка xml
                </a>
            </li>			
            {{--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('returnList')}}">
                    <i class="fa-solid fa-arrow-rotate-back"></i> {{trans('menu.ktj.returns')}}
                </a>
            </li>--}}
        @endif
        @if(Auth::user()->isAgent())
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('orders')}}">
                    <i class="fa-solid fa-check-circle"></i> {{trans('menu.ktj.orders')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('exportOrders')}}">
                    <i class="fa-solid fa-file-export"></i> {{trans('menu.ktj.export')}}
                </a>
            </li>
{{--            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('returnList')}}">
                    <i class="fa-solid fa-arrow-rotate-back"></i> {{trans('menu.ktj.returns')}}
                </a>
            </li>--}}
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('agentBalanceList')}}">
                    <i class="fa-solid fa-list"></i> {{trans('menu.ktj.transactions')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('profileList')}}">
                    <i class="fa-solid fa-users"></i> {{trans('menu.ktj.profiles')}}
                </a>
            </li>
            @if(Auth::user()->isAgentAdmin())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('userList')}}">
                        <i class="fa-solid fa-user"></i> {{trans('menu.ktj.usersList')}}
                    </a>
                </li>
            @endif
        @endif
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('rules')}}">
                <i class="fa-solid fa-book"></i> {{trans('menu.ktj.rules')}}
            </a>
        </li>

    </nav>
</div>
<div class="container-fluid" style="margin-top: 20px">
    @yield('content')
</div>

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>--}}

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="/js/popper.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery-ui-timepicker-addon.js"></script>

<script type="text/javascript">
    document.onreadystatechange = function () {
        var state = document.readyState
        if (state == 'interactive') {
           // document.getElementById('contents').style.visibility="hidden";
        } else if (state == 'complete') {
            setTimeout(function(){
                document.getElementById('interactive');
                document.getElementById('load').style.visibility="hidden";
                //document.getElementById('contents').style.visibility="visible";
            },10);
        }
    }
</script>

@yield('pageScript')
</body>
</html>
