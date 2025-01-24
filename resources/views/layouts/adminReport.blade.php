<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="{{ asset('assets/admin/js/color.modes.js') }}"></script>
    {{-- ADMIN TEMPLATE BLADE --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>@yield('title', 'AYERP | Software Development')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/assets/admin/css/report.style.css') }}"> 

    @yield('extra-links')
</head>
<body>
    
        <div id="content">
        @yield('contents')
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>