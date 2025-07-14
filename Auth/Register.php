<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Crew Register</title>

    <!-- Orbitron Font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">

    <style>
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

        .register-container {
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

        h2 {
            text-align: center;
            margin: 20px 0;
            color: #c8c1ecff;
            text-shadow: 2px 2px 4px rgba(244, 238, 246, 0.5);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #cc0fadff;
            font-weight: 500;
        }

        input {
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

        input:focus {
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
            box-shadow: 0 0 16px #ffa1dd;
            color: #fff;
            transform: translateY(-2px);
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
    <div class="register-container">
        <h1>Space Crew Registration</h1>

        <form id="registerForm">
            <label>Name Surname</label>
            <input type="text" name="name" required>

            <label>E-posta</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" style="color:rgba(237, 231, 237, 1);">Register</button>

            <h2>*** Let's Go Crew ***</h2>

            <p>
                If you have been to space before: 
                <a href="Sign-in.php">"Sign In"</a>
            </p>

            <div id="responseMessage" class="text-center mt-2 small"></div>
        </form>
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
