
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">
    
    
    <meta name="robots" content="noindex, follow">
    <title>DbuPush</title>
</head>
  <body>
               <div class="container">
                       @yield('content')
                </div>
  
         <script src="js/jquery-3.3.1.min.js"></script>
         <script src="js/jquery.steps.js"></script>
         <script src="vendor/date-picker/js/datepicker.js"></script>
         <script src="vendor/date-picker/js/datepicker.en.js"></script>
         <script src="js/main.js"></script>
         <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
         <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"653534d9edce40c0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.5.1","si":10}'></script>
</body>
</html>