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

<!-- Admin Profile Section -->
        <section id="admin-profile" class="content-section active mx-6">
            <h2 class="text-4xl font-bold text-PURPLE-900 mb-8">Admin Profile</h2>
            <div class="bg-white p-8 rounded-lg shadow-md max-w-xl">
                <div class="flex items-center space-x-6 mb-6">
                    <img src="https://placehold.co/100x100/green/white?text=MA" alt="Admin Avatar" class="h-24 w-24 rounded-full object-cover border-4 border-green-200">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">Admin User</p>
                        <p class="text-green-600"><?= htmlspecialchars($user['fullName']);?></p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Email Address</p>
                        <p class="text-gray-800 text-lg"><?= htmlspecialchars($user['email']);?></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Contact Phone</p>
                        <p class="text-gray-800 text-lg"><?= htmlspecialchars($user['phoneNumber']);?></p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Role</p>
                        <p class="text-gray-800 text-lg"><?= htmlspecialchars($user['role']);?></p>
                    </div>
                </div>
                <!--<div class="mt-8">
                    <button class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-key mr-2"></i> Change Password
                    </button>
                </div> -->
            </div>
        </section>
        <script>
document.addEventListener('DOMContentLoaded', function() {
            // Check if admin is logged in, otherwise redirect to login page
            if (sessionStorage.getItem('isAdminLoggedIn') !== 'true') {
               // window.location.href = 'adminLogin.html';
                return; // Stop further execution
            }

            const navLinks = document.querySelectorAll('.nav-link');
            const contentSections = document.querySelectorAll('.content-section');
            const logoutButton = document.getElementById('logoutButton');

            // Function to show a specific section and highlight its nav link
            function showSection(sectionId) {
                contentSections.forEach(section => {
                    section.classList.remove('active');
                });
                document.getElementById(sectionId).classList.add('active');

                navLinks.forEach(link => {
                    link.classList.remove('active-link', 'bg-blue-700');
                    link.classList.add('text-blue-100');
                });
                const activeNavLink = document.querySelector(`.nav-link[data-section="${sectionId}"]`);
                if (activeNavLink) {
                    activeNavLink.classList.add('active-link', 'bg-blue-700');
                    activeNavLink.classList.remove('text-blue-100');
                }
            }

            // Add click listeners to navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const sectionId = this.getAttribute('data-section');
                    showSection(sectionId);
                });
            });

            // Handle logout
            logoutButton.addEventListener('click', function() {
                sessionStorage.removeItem('isAdminLoggedIn'); // Clear login flag
                window.location.href = 'adminLogin.html'; // Redirect to login
            });

            // Show the default dashboard home section on load
            showSection('dashboard-home');
        });
        </script>
    </body>
    </html>