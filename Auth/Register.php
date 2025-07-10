<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Crew Register</title>
    <style>
        * {
            box-sizing: border-box;
        }

      body {
    background: url('../assets/images/arkaplan2.jpg') no-repeat center center fixed;
    background-size: cover;  /* Ekranı kaplaması için eklendi */
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}


     .register-container {
    background: linear-gradient(135deg, #1a1a40, #3b2f5c); /* Koyu gece mavisi ve mor geçiş */
    padding: 60px 40px;
    border-radius: 40px; /* Çok büyük radius'u biraz küçülttüm */
    box-shadow: 0 0 20px rgba(138, 180, 255, 0.5); /* Uzay temalı mavi parıltı */
    width: 100%;
    max-width: 600px;
    color: #cdd3e7; /* Açık mor-mavi yazı rengi */
    font-family: 'Orbitron', sans-serif;
}

h2 {
    text-align: center;
    margin-bottom: 25px
    color: #bb89ae; /* Uzay pembesi */
    text-shadow: 0 0 8px #d61a6f;
    font-weight: 700;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #99a9c9; /* Açık soğuk mavi-mor ton */
    font-weight: 500;
}

input {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border: 2px solid rgba(171, 106, 142, 0.7);
    border-radius: 8px;
    background-color: rgba(93, 124, 236, 0.15);
    color: #cdd3e7;
    font-family: 'Orbitron', sans-serif;
    transition: all 0.3s ease;
}

input:focus {
    outline: none;
    border-color: #d61a6f;
    box-shadow: 0 0 8px #ff6fd8;
    background-color: rgba(93, 124, 236, 0.3);
    color: #fff;
}

button {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #a3768a, #bb89ae); /* Uzay pembesi gradyan */
    color: #c479c7;
    font-weight: 700;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 4px 0 #8b3e8f;
    transition: all 0.3s ease-in-out;
    font-family: 'Orbitron', sans-serif;
}

button:hover {
    background: linear-gradient(135deg, #d61a6f, #e255c5);
    box-shadow: 0 6px 10px rgba(255, 105, 210, 0.6);
    color: #fff;
    transform: translateY(-2px);
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
    <div class="register-container">

        <h2>Space Crew Registration</h2>
        <form id="registerForm">
            <label>Name Surname</label>
            <input type="text" name="name" required>

            <label>E-posta</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Register</button>
            <h2>***Let's Go Crew***</h2>
        <p class="mt-3 mb-0 text-body-secondary text-center" style="text-align:center"> If you have been to space before=> <a href="Sign-in.php">"Sign In"</a></p>
        <div id="responseMessage" class="text-center mt-2 small"></div>

        </form>
        <div id="responseMessage"></div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            const response = await fetch('/room-scheduler/register-lecturer.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            const messageDiv = document.getElementById('responseMessage');
            messageDiv.className = '';
            messageDiv.textContent = result.message;

            if (result.status === 'success') {
                messageDiv.classList.add('success');
                setTimeout(() => {
                    window.location.href = '/ClassroomScheduling/Pages/User/Home.php';
                }, 1000);
            } else {
                messageDiv.classList.add('error');
            }
        });
    </script>
</body>
</html>
