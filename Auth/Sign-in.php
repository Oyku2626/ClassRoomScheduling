<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>

    <!-- Bootstrap & Custom CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/custom.css">
  </head>

 

  <body class="d-flex align-items-center py-4">
    <!-- SVG Icons -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <!-- (All SVG symbols remain unchanged) -->
      <!-- ... -->
    </svg>

    <!-- Theme Switcher -->
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" aria-hidden="true"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" aria-hidden="true"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" aria-hidden="true"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" aria-hidden="true"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" aria-hidden="true"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" aria-hidden="true"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" aria-hidden="true"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    <!-- Main Sign In Area -->
    <main class="form-signin w-100 m-auto">
      <div class="card shadow p-4 space-card">
        <form id="sign-in-form" action="../_management/data-bridge/auth-login-ajax.php" method="post">
         
          <h1 class="h4 mb-4 fw-bold text-center" style="color:rgb(222, 29, 196);">Welcome to Space Academy</h1>


          <div class="form-floating">
  <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" style="color: black;">
  <label for="floatingInput" style="color: rgb(222, 29, 196);">Email</label>
</div>


        <div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" style="color: black;">
  <label for="floatingPassword" style="color: rgb(222, 29, 196);">Password</label>
</div>


          <div class="form-check text-start my-3">
              <input class="form-check-input" type="checkbox" value="Remember me" id="checkDefault">
              <label class="form-check-label" for="checkDefault" style="color: rgb(222, 29, 196);">Remember Me</label>
          </div>


          <button class="btn btn-primary  w-100 py-2" type="submit" style="background-color:rgb(29, 7, 127);border-color:#fff !important":>Sign In</button>


          <p class="mt-3 mb-0 text-body-secondary text-center">
  If this is your first time in space => 
  <a href="Register.php" style="color:rgb(222, 29, 196); font-weight: bold;">"Register"</a>
</p>


          <div id="responseMessage" class="text-center mt-2 small"></div>
          <p class="mt-5 mb-3 text-body-secondary text-center">&copy; 4045–4050</p>
        </form>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/Auth.js"></script>
  </body>
</html>
