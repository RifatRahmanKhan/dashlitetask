<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset("docs/images/favicon.png")}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("docs/assets/css/docs.css")}}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-91615293-4');
    </script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar">
    @auth
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="#" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{asset("docs/images/logo.png")}}" srcset="images/logo2x.png 2x" alt="DashLite">
                            <img class="logo-dark logo-img" src="{{asset("docs/images/logo-dark.png")}}" srcset="images/logo-dark2x.png 2x" alt="DashLite">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content mt-4">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Admin Panel</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('home')}}" class="nk-menu-link">
                                        <span class="nk-menu-text">Users</span>
                                    </a>
                                </li>            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed bg-white">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="#" class="logo-link">
                                    <img class="logo-light logo-img" src="{{asset("docs/images/logo.png")}}" srcset="{{asset("docs/images/logo2x.png 2x")}}" alt="logo">
                                    <img class="logo-dark logo-img" src="{{asset("docs/images/logo-dark.png")}}" srcset="{{asset("docs/images/logo-dark2x.png 2x")}}" alt="logo-dark">
                                </a>
                            </div>
                            <div class="nk-header-docs-nav">
                                <div class="dropdown dropdown-expand-lg">
                                    <a href="#" class="btn btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown">
                                        <em class="icon ni ni-more-h"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-inner">
                                            <p class="lead-text text-soft pt-4 mb-0 d-lg-none">View Dashboard</p>
                                            <ul class="docs-nav">
                                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="wide-md mx-auto">
                                    <!-- content @s -->
                                    
                                    
                                    

                                    @yield('content')
                                    <hr class="hr border-light mb-4">
                                        
                                    <!-- content @e -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    @endauth
    @guest
    @yield('content_without_auth')
    @endguest
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset("docs/assets/js/bundle.js?ver=1.0.0")}}"></script>
    <script src="{{asset("docs/assets/js/scripts.js?ver=1.0.0")}}"></script>
</body>

</html>