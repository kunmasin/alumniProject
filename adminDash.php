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

   <?php include("admin-sidebar.php") ;?>
    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Dashboard Home Section -->
        <section id="dashboard-home" class="content-section active">
            <h2 class="text-4xl font-bold text-purple-900 mb-8">Dashboard Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Alumni</p>
                        <p class="text-3xl font-bold text-gray-900"><?= htmlspecialchars($total_alumni);?></p>
                    </div>
                    <i class="fas fa-users text-blue-500 text-4xl"></i>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Active Events / News</p>
                        <p class="text-3xl font-bold text-gray-900"><?= htmlspecialchars($total_events);?></p>
                    </div>
                    <i class="fas fa-calendar-alt text-green-500 text-4xl"></i>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">New Job Posts</p>
                        <p class="text-3xl font-bold text-gray-900"><?= htmlspecialchars($total_jobs);?></p>
                    </div>
                    <i class="fas fa-briefcase text-purple-500 text-4xl"></i>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Donations</p>
                        <p class="text-3xl font-bold text-gray-900"><?= htmlspecialchars($total_donation);?></p>
                    </div>
                    <i class="fas fa-dollar-sign text-yellow-500 text-4xl"></i>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Scholarships</p>
                        <p class="text-3xl font-bold text-gray-900"><?php echo htmlspecialchars($total_scholarships);?></p>
                    </div>
                    <i class="fas fa-book text-blue-500 text-4xl"></i>
                </div>
            </div>
        </section>

     
       

       
      
        
    </main>

    
</body>
</html>
