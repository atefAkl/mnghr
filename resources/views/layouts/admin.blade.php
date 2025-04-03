<!doctype html>
<html lang="en" dir="rtl" data-bs-theme="auto">
<head>
    <script src="http://www.project.four/assets/admin/js/color.modes.js"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>@yield('title', 'AQL | HR Moderation')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.rtl.css" integrity="sha512-LIzot1avVrhKs2lUjmdVfuIItY6lbKNrtbHGHdYENyQIhHolU/mWvjbIdgHLPKvndeFacrgEwqntP74tDgZLVA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="{{ asset('assets/admin/css/rtl/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/rtl/admin-layout.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/rtl/my-custom-styles.css') }}" rel="stylesheet">
{{--     
    @if (App::getLocale() == 'en')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    @else
    <link href="{{ asset('assets/admin/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/my-custom-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin-layout.css') }}" rel="stylesheet">
    @endif --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @yield('extra-links')
</head>

<body>
    
    <div class="admin-wrapper">
        @include('inc.sidebar')
        <div id="content">
            
            <header id="main-header">
                <nav --bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"  aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">{{__('layout.dashboard')}}</a></li>
                        @yield('header-links')
                    </ul>
                </nav>
            </header>
            <div class="container-fluid">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-sm alert-success py-1 mt-3 mb-0">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-sm alert-danger py-1 mt-3 mb-0">
                            {{ session('error') }}
                        </div>
                    @endif
                    @yield('contents')
                  

                </div>
            </div>
        </div>
        
    </div>

    {{-- ========== Theme Color Toggler  ======================== --}}
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <i class="fa fa-moon"></i>
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
        </button>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="{{ asset('assets/admin/js/app.main.js') }}"></script>
    <script src="{{ asset('assets/admin/js/color.modes.js') }}"></script>
    <script>
        $(document).ready(() => {

            $('.sidebar-toggle').click(() => {
                $('.sidebar').toggleClass('mini-sidebar');
                $('.sidebar-toggle').toggleClass('turn-90')
            });
        })


    </script>
</body>

</html>
