<?php 
include ("config.php");
include("cookie.php");
if (!isset($_COOKIE['admin'])){
    header('location: adminLogin.php');
    exit;
}
$sql="SELECT * FROM `admin` WHERE fullName LIKE '".$_COOKIE['admin']."'";
$user = array();


$total_alumni = $total_events = $total_jobs = $total_donation = $total_scholarships = 0;
$result = $conn->query("SELECT COUNT(*) as count FROM register");
if ($row = $result->fetch_assoc()) $total_alumni = $row['count'];
$result = $conn->query("SELECT COUNT(*) as count FROM eventsandnews");
if ($row = $result->fetch_assoc()) $total_events = $row['count'];

$result = $conn->query("SELECT COUNT(*) as count FROM job_opportunities");
if ($row = $result->fetch_assoc()) $total_jobs = $row['count'];
$result = $conn->query("SELECT COUNT(*) as count FROM scholarships");
if ($row = $result->fetch_assoc()) $total_scholarships = $row['count'];
$result = $conn->query("SELECT COUNT(*) as count FROM donation");
if ($row = $result->fetch_assoc()) $total_donation = $row['count'];


if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `admin` WHERE fullName LIKE '".$_COOKIE['admin']."'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: adminLogin.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}



$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - APU Alumni</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" xintegrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0V4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom font - Inter */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9; /* Light gray background */
        }
        /* Hide all sections by default, show only the active one */
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
    </style>
</head>
<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-purple-900 text-white flex flex-col shadow-lg">
        <div class="p-6 text-center border-b border-blue-100">
            <img src="../alumni/Ahman.webp" alt="APU Logo" class="h-16 w-16 rounded-full mx-auto mb-3">
            <h1 class="text-2xl font-bold">APU Admin</h1>
            <p class="text-blue-200 text-sm">Dashboard</p>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="adminDash.php" data-section="dashboard-home" class="nav-link flex items-center px-4 py-3 rounded-md text-blue-100 hover:bg-green-700 transition duration-200 active-link">
                <i class="fas fa-tachometer-alt mr-3 text-lg"></i> Dashboard Home
            </a>
            <a href="adminViewAlumni.php" data-section="alumni-list" class="nav-link flex items-center px-4 py-3 rounded-md text-blue-100 hover:bg-green-700 transition duration-200">
                <i class="fas fa-users mr-3 text-lg"></i> Alumni List
            </a>
            <a href="adminNewsandEvents.php" data-section="news-events-management" class="nav-link flex items-center px-4 py-3 rounded-md text-blue-100 hover:bg-green-700 transition duration-200">
                <i class="fas fa-newspaper mr-3 text-lg"></i> News & Events
            </a>
            <a href="adminJobOpp.php" data-section="scholarships-jobs-management" class="nav-link flex items-center px-4 py-3 rounded-md text-blue-100 hover:bg-green-700 transition duration-200">
                <i class="fas fa-briefcase mr-3 text-lg"></i> Jobs
            </a>
            <a href="adminScholarships.php" data-section="adminScholarships" class="nav-link flex items-center px-4 py-3 rounded-md text-blue-100 hover:bg-green-700 transition duration-200">
                <i class="fas fa-hand-holding-usd mr-3 text-lg"></i> scholarship
            </a>
            <a href="adminProfile.php" data-section="admin-profile" class="nav-link flex items-center px-4 py-3 rounded-md text-blue-100 hover:bg-green-700 transition duration-200">
                <i class="fas fa-user-circle mr-3 text-lg"></i> Admin Profile
            </a>
        </nav>
        <div class="p-4 border-t border-purple-900">
            <button id="logoutButton" class="w-full flex items-center justify-center px-4 py-3 rounded-md bg-purple-500 text-white hover:bg-green-600 transition duration-200">
                <i class="fas fa-sign-out-alt mr-3 text-lg"></i> <a href="logout.php">Logout</a>
            </button>
        </div>
    </aside>
    <script src="script.js"></script>
</body>
</html>