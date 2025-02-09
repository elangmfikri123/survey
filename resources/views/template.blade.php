<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Honda Survey &mdash; @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  @yield('content')

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/auth-register.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script>
    // Mencegah klik kanan
    document.addEventListener("contextmenu", function (event) {
        event.preventDefault();
    });

    // Mencegah penggunaan shortcut Inspect Element
    document.addEventListener("keydown", function (event) {
        if (event.ctrlKey && (event.key === "u" || event.key === "U")) {
            event.preventDefault(); // Ctrl + U (View Source)
        }
        if (event.ctrlKey && event.shiftKey && (event.key === "i" || event.key === "I")) {
            event.preventDefault(); // Ctrl + Shift + I (DevTools)
        }
        if (event.ctrlKey && event.shiftKey && (event.key === "c" || event.key === "C")) {
            event.preventDefault(); // Ctrl + Shift + C (Inspect)
        }
        if (event.ctrlKey && event.shiftKey && (event.key === "j" || event.key === "J")) {
            event.preventDefault(); // Ctrl + Shift + J (Console)
        }
        if (event.key === "F12") {
            event.preventDefault();
        }
    });

    (function() {
        var devtools = /./;
        devtools.toString = function() {
            throw new Error("Inspect Element is disabled!");
        };
        console.log("%cStop! Inspecting is not allowed!", "color: red; font-size: 20px; font-weight: bold;");
    })();
</script>

</body>
</html>