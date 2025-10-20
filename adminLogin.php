<?php
    $fullName =$passwords ="";
    $fullNameErr = $passwordsErr = "";
    if (empty($_POST["fullName"])){
        $fullNameErr="FullName is required";
    }else{
        $fullName= test_input($_POST["fullName"]);
    }

    if(empty($_POST["passwords"])){
        $passwordsErr="Password is not correct";
    } else{
        $passwords=test_input($_POST["passwords"]);
    }

    function test_input($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }

    if (!empty($_POST)){
         $servername= "localhost";
        $username= "root";
        $password= "";
        $dbname= "alumni";
        $conn= mysqli_connect($servername,$username,$password,$dbname);
        $sql= "SELECT * FROM `admin` WHERE fullName  LIKE '$fullName' AND passwords LIKE '$passwords'";
    if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}else{
    
}
                if($conn->query($sql) == TRUE){
                    $sql= "SELECT * FROM `admin` WHERE fullName  LIKE '$fullName' AND passwords LIKE '$passwords'";
                    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Login Successful for :<br>"."Line ". $row["id"]."<br>". " - Name: " . $row["fullName"];
                    setcookie('admin', $row["fullName"], time() + (3000), "/");
                    header('location: adminDash.php');
                    exit;
                }
            }else{
                echo " Invalid Full Name and Password";
            }
            
        }else{
            echo "Error: " .$sql."<br>".$conn->error;
        }
        $conn->close();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - APU Alumni</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" xintegrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0V4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom font - Inter */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #e2e8f0; /* Light gray background */
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md">
        <div class="text-center mb-8">
            <img src="../alumni/Ahman.webp" alt="APU Logo" class="h-20 w-20 rounded-full mx-auto mb-4">
            <h2 class="text-3xl font-bold text-purple-900">Admin Login</h2>
            <p class="text-gray-600 mt-2">Access the Alumni Management Dashboard</p>
        </div>

        <form  class="space-y-6" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="fullName" name="fullName" required
                       class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-900 focus:border-purple-900 sm:text-base"
                       placeholder="Enter your FullName">
            </div>
            <div>
                <label for="passwords" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="passwords" name="passwords" required
                       class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-purple-900 focus:border-purple-900 sm:text-base"
                       placeholder="Enter your passwords">
            </div>
            <div id="errorMessage" class="text-red-600 text-sm text-center hidden">
                Invalid Full Name or passwords.
            </div>
            <button type="submit" class="w-full bg-purple-900 text-white hover:bg-purple-900 px-6 py-3 rounded-md text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                <i class="fas fa-sign-in-alt mr-2"></i> Login
            </button>
        </form>

        <p class="mt-8 text-center text-gray-500 text-sm">
            &copy; 2025 Ahman Pategi University Alumni. All rights reserved.
        </p>
                        <p class="text-sm text-gray-600">Developed by: Muhammad Abdullahi Shaaba (21/02/CY/2/006)</p>

    </div>

    <!--<script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const fullNameInput = document.getElementById('fullName');
            const passwordInput = document.getElementById('passwords');
            const errorMessage = document.getElementById('errorMessage');

            const fullName = usernameInput.value;
            const passwords = passwordInput.value;

            // Simple dummy authentication
            if (fullName === 'admin' && passwords === 'passwords') {
                // Store a simple flag in session storage to indicate login
                sessionStorage.setItem('isAdminLoggedIn', 'true');
                window.location.href = 'adminDash.php'; // Redirect to dashboard
            } else {
                errorMessage.classList.remove('hidden'); // Show error message
                fullNameInput.value = ''; // Clear inputs
                passwordsInput.value = '';
            }
        });
    </script> -->
</body>
</html>
 <?php 
    
    ?>