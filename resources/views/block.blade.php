<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Book Review</title>
    <style type="text/css">
      .navbar {
        min-height: 100px;
        font-size: 25px;
      }
      .navbar-brand {
        font-size: 25px;
      }
    </style>
  </head>
<body>
<body>
<nav id="nav" class="navbar navbar-expand-sm sticky-top">
          <a class="navbar-brand text-dark" href="/private">Главная</a>
          <a class="navbar-brand text-dark" href="/private/users">Пользователи</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link text-dark" href="/private/products">Продукты<span class="sr-only">(current)</span></a>
              </li>
                <li class="nav-item active">
                <a class="nav-link text-dark" href="/private/categories">Категории<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-dark" href="/private/orders">Заказы<span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <span class = "btn">{{Auth::user()->name}}</span>
              <a href="/logout" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
            </div>
          </div>
        </nav>
        @yield('content')

        

</body>
</html>