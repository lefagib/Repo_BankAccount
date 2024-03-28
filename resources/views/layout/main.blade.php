<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Gestion Compte</a>
          <div class="collapse navbar-collapse" id="navbarNav">

        </div>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('client.list') }}"><i class="fas fa-user"></i> Client</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('account.index') }}"><i class="fas fa-spinner fa-spin"></i>  Account</a>
              </li>
        </div>
    </nav>
   <div class="container">
      @yield('content')
   </div>
</body>
</html>
