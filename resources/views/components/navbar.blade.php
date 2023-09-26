<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>NavBar</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap');

  *
  {
    font-family: 'Poppins', sans-serif;
  }

  .navbar-collapse {
    flex-grow: 0;
  }


  .dropdown-menu[data-bs-popper] {
    left: -80px;
  }

  .dropdown-item:hover {
    background-color: rgba(85, 76, 76, 0.404);

  }

  .dropdown-item:focus {
    background-color: rgba(85, 76, 76, 0.404);

  }

  .foto_p {
    border-radius: 20px 20px;
  }

  @media screen and (max-width: 767px) {
    .dropdown-menu {
      margin-left: 0px;
    }
  }



</style>

<body>

  <div id="number" hidden></div>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">

      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="" width="30" alt="">
        <span class="text-white">ClassPage</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        @auth

        <ul class="navbar-nav  flex-row flex-wrap text-light">
          <li><a class="nav-link  text-white" href="#">Clases<small class="d-md-none ms-2"></small></a></li>
            <li class="nav-item col-6 col-md-auto  dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">{{Auth::user()->name}}<small class="d-md-none ms-2"></small>
              </a>
              <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown2">
                <li><a class="dropdown-item text-light uil uil-user" href="{{route('consulta')}}">Usuarios</a></li>
                <li><a class="dropdown-item text-light uil uil-10-plus" href="">Perfil</a></li>
                <li><a class="dropdown-item text-light  uil uil-signout" href="{{ route('logout') }}">Logout</a>
                <li>
              </ul>
            </li>
          </ul>

         @else
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link text-white margen uil uil-user-square" href="{{ route('register') }}">SignIn</a>
                </li>
            </ul>

            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white margen uil uil-user-square" href="{{ route('login') }}">Login</a>
            </li>
            </ul>

        @endauth

      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>


</body>

</html>