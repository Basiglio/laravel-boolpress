<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Document</title>
</head>
<body>

  <div class="container">
        <header>
            @yield('header_content')
        </header>

        <main>
            @yield('main_content')
        </main>

        <footer>
            @yield('footer_content')
        </footer>
  </div>

</body>
</html>
