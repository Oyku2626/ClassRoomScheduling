<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Mürettebat Kayıt</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background:url('../images/arkaplan2.jpg') no-repeat center center fixed;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: rgb(139, 160, 214);
            padding: 70px;
            border-radius: 400px;
            box-shadow: 0 0 15px rgba(143, 10, 21, 0.1);
            width: 130%;
            max-width: 600px;
            
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color:rgb(103, 49, 91);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(101, 23, 137);
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
<img class="mb-4" src="../assets/images/logo2.png" alt="" width="300" height="180"
     style="display: block; margin-left: auto; margin-right: auto;">
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
