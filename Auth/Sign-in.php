<?php
session_start();
if (isset($_SESSION['auth']['userType'])) {
    // Zaten giriş yapılmışsa rolüne göre ana sayfaya yönlendir
    $userType = $_SESSION['auth']['userType'];
    if ($userType === 'admin') {
        header('Location: /ClassroomScheduling/Pages/Admin/Home.php');
    } else {
        header('Location: /ClassroomScheduling/Pages/User/Home.php');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Space Sign In</title>

  <!-- Orbitron Font -->
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

  <style>
    /* Stil kodlarını olduğu gibi bırakıyorum */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: url('../assets/images/arkaplan2.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Orbitron', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      color: #cdd3e7;
    }
    
    h2 {
        text-align: center;
        margin: 20px 0;
        color: #c8c1ecff;
        text-shadow: 2px 2px 4px rgba(244, 238, 246, 0.5);
    }

    .signin-container {
      background: rgba(19, 20, 66, 0.85);
      padding: 60px 40px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(138, 180, 255, 0.15);
      backdrop-filter: blur(8px);
      width: 100%;
      max-width: 450px;
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 1.8rem;
      color: #a40d6a;
      text-shadow: 0 0 8px #240634;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #cc0fadff;
      font-weight: 500;
    }

    .text {
      width: 100%;
      padding: 12px;
      margin-bottom: 18px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 6px;
      background-color: rgba(255, 255, 255, 0.1);
      color: #100808;
      transition: all 0.3s ease;
      font-family: 'Orbitron', sans-serif;
    }

    .text:focus {
      outline: none;
      background-color: rgba(255, 255, 255, 0.2);
      border-color: #8ab4ff;
      box-shadow: 0 0 10px #8ab4ff;
      color: white;
    }

    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #780a3bff, #741059ff);
      color: #c479c7;
      font-weight: 700;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      box-shadow: 0 0 12px #ff6fd8;
      transition: all 0.3s ease-in-out;
      font-family: 'Orbitron', sans-serif;
    }

    button:hover {
      background: linear-gradient(135deg, #d61a6f, #e255c5);
      box-shadow: 0 0 16px #bca1ffff;
      color: #fff;
      transform: translateY(-2px);
    }

    .form-check {
      display: flex;
      align-items: center;
      margin-right:10px;
      margin-bottom: 18px;
      gap: 10px;
    }

    .form-check label {
      margin-bottom: 0;
      font-size: 0.9rem;
    }

    p {
      text-align: center;
      color: #ff69b4;
      margin-top: 1rem;
    }

    a {
      color: #d61a6f;
      font-weight: bold;
      text-decoration: none;
    }

    .error, .success {
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }
  </style>
</head>
<body>
  <div class="signin-container">
    <h1>Welcome to Space Academy</h1>

    <form id="signInForm" action="../_management/data-bridge/auth-login-ajax.php" method="post">
      <label>Email</label>
      <input class="text" type="email" name="email" required>

      <label>Password</label>
      <input class="text" type="password" name="password" required>

      <input class="form-check" type="checkbox" id="rememberMe" name="remember" style="float:left">
      <label for="rememberMe">Remember Me</label>

      <button type="submit" style="color:rgba(237, 231, 237, 1);" >Sign In</button>

      <h2> ** Have a Good Journey **</h2>

      <p>
        If this is your first time in space:
        <a href="Register.php">Register</a>
      </p>

      <div id="responseMessage" class="text-center mt-2 small"></div>
    </form>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $('#signInForm').on('submit', function (e) {
      e.preventDefault();

      $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        dataType: 'json',  // JSON olarak alıyoruz
        data: $(this).serialize(),
        success: function (response) {
          const messageDiv = $('#responseMessage');
          messageDiv.removeClass('error success').text(response.message);

          if (response.status === 'success') {
            messageDiv.addClass('success');

            setTimeout(() => {
              window.location.href = response.redirect || '/ClassroomScheduling/Pages/User/Home.php';
            }, 1000);
          } else {
            messageDiv.addClass('error');
          }
        },
        error: function () {
          $('#responseMessage').removeClass('success').addClass('error').text('An error occurred.');
        }
      });
    });
  </script>
</body>
</html>
