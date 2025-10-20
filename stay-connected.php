<?php
include("config.php");

$results = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Clean inputs
    $name = trim($_POST['name'] ?? '');
    $year = trim($_POST['year'] ?? '');
    $industry = trim($_POST['department'] ?? '');

    // Prepare WHERE clause based on valid input
    $conditions = [];
    $params = [];
    $types = "";

    if (!empty($name)) {
        $conditions[] = "fullName LIKE ?";
        $params[] = "%$name%";
        $types .= "s";
    }

    if (!empty($year)) {
        $conditions[] = "graduation_year = ?";
        $params[] = $year;
        $types .= "s";
    }

    if (!empty($industry)) {
        $conditions[] = "department LIKE ?";
        $params[] = "%$industry%";
        $types .= "s";
    }

    if (!empty($conditions)) {
        $where = implode(" AND ", $conditions);
        $stmt = $conn->prepare("SELECT * FROM register WHERE $where");
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $res = $stmt->get_result();
        $results = $res->fetch_all(MYSQLI_ASSOC);

        if (count($results) > 0) {
            foreach ($results as $alumni) {
                echo "<script>alert('Name: " . addslashes($alumni['fullName']) . "\\nEmail: " . addslashes($alumni['email']) . "\\nGraduation Year: " . addslashes($alumni['graduation_year']) . "\\nIndustry: " . addslashes($alumni['department']) . "\\nPhone: " . addslashes($alumni['phoneNumber']) . "');</script>";
            }
        } else {
            echo "<script>alert('No alumni found matching your criteria.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Alumni - Stay Connected</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" xintegrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0V4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom font - Inter */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; /* Light green-gray for background */
        }
    </style>
</head>
<body class="text-gray-800">

    <!-- Header/Navigation Bar (similar to landing page) -->
    <header class="bg-white shadow-md py-4 px-6 md:px-10 lg:px-20">
        <nav class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <!-- APU Logo Placeholder -->
                <img src="../alumni/Ahman.webp" alt="APU Logo" class="h-12 w-12 rounded-full mr-3">
                <a href="index.php" class="text-2xl font-bold text-green-700 hover:text-green-800 transition duration-300">APU Alumni</a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="index.php#about" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">About Us</a>
                <a href="index.php#offerings" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">What We Offer</a>
                <a href="index.php#events" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Events</a>
                <a href="index.php#join" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Join Us</a>
                <a href="#" class="text-green-700 font-bold transition duration-300">Stay Connected</a>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-green-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2">
            <a href="index.php#about" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">About Us</a>
            <a href="index.php#offerings" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">What We Offer</a>
            <a href="index.php#events" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Events</a>
            <a href="index.php#join" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Join Us</a>
            <a href="#" class="block px-4 py-2 text-green-700 font-bold hover:bg-green-50 rounded-md">Stay Connected</a>
        </div>
    </header>

    <!-- Hero Section for Stay Connected -->
    <section class="relative bg-purple-600 text-white py-20 md:py-28 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('../alumni/graduation.webp');"></div>
        <div class="container mx-auto relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                Stay Connected with Your APU Family
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                Discover various ways to reconnect with fellow alumni, faculty, and the university.
            </p>
        </div>
    </section>

    <!-- Section: Alumni Directory -->
    <section id="directory" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">Alumni Directory</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">
                Find and connect with classmates, mentors, and fellow APU graduates from around the globe. Our secure directory allows you to search by name, graduation year, industry, and location.
            </p>
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-semibold text-green-700 mb-6">Search the Directory</h3>
                <form class="space-y-4" method="post">
                    <div>
                        <label for="search-name" class="sr-only">Name</label>
                        <input type="text" id="search-name" name= "name" placeholder="Search by Name"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label for="search-year" class="sr-only">Graduation Year</label>
                        <input type="number" id="search-year" name="year" placeholder="Graduation Year" min="1900" max="2099"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label for="search-industry" class="sr-only">Department</label>
                        <input type="text" id="search-department" name="department" placeholder="Industry (e.g., Tech, Healthcare)"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-md text-lg font-semibold transition duration-300 transform hover:scale-105">
                        <i class="fas fa-search mr-2"></i> Search Alumni
                    </button>
                </form>
                <p class="text-sm text-gray-500 mt-4">
                    Note: Full directory access requires a registered alumni account.
                </p>
            </div>
        </div>
    </section>

    

    <!-- Section: Interest Groups & Chapters -->
    <section id="groups" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">Interest Groups & Regional Chapters</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">
                Connect with alumni who share your passions or live in your area. Our interest groups and regional chapters host events, discussions, and initiatives tailored to specific interests or locations.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-code text-5xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Tech & Innovation Group</h3>
                    <p class="text-gray-700 text-sm">For alumni in software, AI, startups, and digital innovation.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-stethoscope text-5xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Healthcare Professionals Network</h3>
                    <p class="text-gray-700 text-sm">Connecting doctors, nurses, researchers, and public health experts.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-gavel text-5xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Legal & Policy Forum</h3>
                    <p class="text-gray-700 text-sm">For alumni in law, government, and public policy.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-chart-pie text-5xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Business & Finance Circle</h3>
                    <p class="text-gray-700 text-sm">Dedicated to alumni in banking, investments, entrepreneurship, and management.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-book-open text-5xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Arts & Culture Collective</h3>
                    <p class="text-gray-700 text-sm">Bringing together artists, writers, performers, and cultural enthusiasts.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <i class="fas fa-map-marked-alt text-5xl text-green-500 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-3">Lagos Alumni Chapter</h3>
                    <p class="text-gray-700 text-sm">Local events and networking for alumni residing in Lagos.</p>
                </div>
            </div>
            <a href="#" class="mt-12 inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                Explore All Groups & Chapters
            </a>
        </div>
    </section>

    <!-- Section: Social Media -->
    <section id="social" class="py-16 md:py-24 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">Connect on Social Media</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">
                Follow our official social media channels to stay updated on news, events, and alumni spotlights. Join the conversation and share your APU pride!
            </p>
            <div class="flex justify-center space-x-8 md:space-x-12">
                <a href="#" class="text-green-700 hover:text-green-900 transition duration-300 transform hover:scale-110">
                    <i class="fab fa-facebook-f text-5xl"></i>
                </a>
                <a href="#" class="text-green-700 hover:text-green-900 transition duration-300 transform hover:scale-110">
                    <i class="fab fa-linkedin-in text-5xl"></i>
                </a>
                <a href="#" class="text-green-700 hover:text-green-900 transition duration-300 transform hover:scale-110">
                    <i class="fab fa-twitter text-5xl"></i>
                </a>
                <a href="#" class="text-green-700 hover:text-green-900 transition duration-300 transform hover:scale-110">
                    <i class="fab fa-instagram text-5xl"></i>
                </a>
                <a href="#" class="text-green-700 hover:text-green-900 transition duration-300 transform hover:scale-110">
                    <i class="fab fa-youtube text-5xl"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section: Mentorship -->
    <section id="mentorship" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">Become a Mentor or Find One</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">
                Share your invaluable experience with current students and recent graduates, or seek guidance from seasoned professionals within the APU alumni network.
            </p>
            <div class="flex flex-col md:flex-row justify-center space-y-6 md:space-y-0 md:space-x-8">
                <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> Become a Mentor
                </a>
                <a href="#" class="inline-block bg-gray-200 text-green-700 hover:bg-gray-300 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-user-graduate mr-2"></i> Find a Mentor
                </a>
            </div>
        </div>
    </section>

    <!-- Footer (similar to landing page) -->
    <footer class="bg-gray-800 text-gray-300 py-10 px-4">
        <div class="container mx-auto text-center md:flex md:justify-between md:items-center">
            <div class="mb-6 md:mb-0">
                <img src="../alumni/Ahman.webp" alt="APU Logo" class="h-12 w-12 rounded-full mx-auto md:mx-0 mb-2">
                <p class="text-lg font-bold text-white">Ahman Pategi University Alumni</p>
                                <p class="text-lg font-bold text-white">Developed by: Muhammad Abdullahi Shaaba (21/02/CY/2/006)</p>

            </div>
            <div class="mb-6 md:mb-0">
                <p class="text-sm mb-2">Contact Alumni Relations Office:</p>
                <p class="text-sm">Email: <a href="mailto:alumni@apu.edu.ng" class="hover:text-green-400">alumni@apu.edu.ng</a></p>
                <p class="text-sm">Phone: <a href="tel:+2348012345678" class="hover:text-green-400">+234 801 234 5678</a></p>
            </div>
            <div class="text-sm">
                <p>&copy; 2025 Ahman Pategi University Alumni. All rights reserved.</p>
                <p class="mt-2">
                    <a href="#" class="hover:text-green-400 mr-4">Privacy Policy</a>
                    <a href="#" class="hover:text-green-400">Terms of Service</a>
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
