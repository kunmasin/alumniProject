<?php
include("config.php");

// Fetch all news and events
$sql = "SELECT * FROM eventsandnews ORDER BY date ASC";
$result = $conn->query($sql);

$events = [];
$news = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (strtolower($row['type']) === 'event') {
            $events[] = $row;
        } else {
            $news[] = $row;
        }
    }
}

$fullName = $email = $phoneNumber = $department = $graduation_year = "";
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = test_input($_POST["fullName"]);
    $email = test_input($_POST["email"]);
    $phoneNumber = test_input($_POST["phoneNumber"]);
    $department = test_input($_POST["department"]);
    $graduation_year = test_input($_POST["graduation_year"]);    
    if (!empty($fullName) && !empty($email) && !empty($phoneNumber) && !empty($department) && !empty($graduation_year)) {
        $stmt = $conn->prepare("INSERT INTO register (fullName, email, phoneNumber, department, graduation_year) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullName, $email, $phoneNumber, $department, $graduation_year);

        if ($stmt->execute()) {
            echo "<script>alert('Record inserted successfully.');</script>";
        } else {
            echo "<script>alert('Insert failed: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill all fields');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahman Pategi University Alumni</title>
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
        /* Custom scrollbar for events section */
        .scrollable-events::-webkit-scrollbar {
            height: 8px;
        }
        .scrollable-events::-webkit-scrollbar-track {
            background: #e2e8f0; /* Light gray track */
            border-radius: 10px;
        }
        .scrollable-events::-webkit-scrollbar-thumb {
            background: #60a5fa; /* Blue thumb */
            border-radius: 10px;
        }
        .scrollable-events::-webkit-scrollbar-thumb:hover {
            background: #3b82f6; /* Darker green on hover */
        }
    </style>
</head>
<body class="text-gray-800">

    <!-- Header/Navigation Bar -->
    <header class="bg-white shadow-md py-4 px-6 md:px-10 lg:px-20">
        <nav class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <!-- APU Logo Placeholder -->
                <img src="..\alumni\Ahman.webp" alt="APU Logo" class="h-12 w-12 rounded-full mr-3">
                <a href="#" class="text-2xl font-bold text-purple-700 hover:text-green-800 transition duration-300">APU Alumni</a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#about" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">About Us</a>
                <a href="#offerings" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">What We Offer</a>
                <a href="#events" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Events</a>
                <a href="#join" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Join Us</a>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-green-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2">
            <a href="#about" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">About Us</a>
            <a href="#offerings" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">What We Offer</a>
            <a href="#events" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Events</a>
            <a href="#join" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Join Us</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-purple-700 text-white py-20 md:py-32 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('../alumni/graduation.webp');"></div>
        <div class="container mx-auto relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 animate-fade-in-down">
                Welcome Home, Ahman Pategi University Alumni!
            </h1>
            <p class="text-lg md:text-xl mb-10 max-w-3xl mx-auto animate-fade-in-up">
                Reconnect, Engage, and Grow with Your Alma Mater.
            </p>
            <a href="#join" class="inline-block bg-white text-green-700 hover:bg-green-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105 animate-bounce-in">
                Join Our Alumni Network Today!
            </a>
            
        </div>
    </section>

    <!-- Section 1: About the Alumni Network -->
    <section id="about" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">Your Lifelong Connection to APU</h2>
            <p class="text-lg md:text-xl max-w-4xl mx-auto mb-16 leading-relaxed">
                The Ahman Pategi University Alumni Network is a vibrant community dedicated to fostering lasting relationships among graduates, supporting the university's mission, and empowering individual success. We believe that your journey with APU doesn't end at graduation – it's just the beginning of a lifelong connection.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <i class="fas fa-users text-5xl text-green-500 mb-6"></i>
                    <h3 class="text-xl font-semibold mb-3">Networking Opportunities</h3>
                    <p class="text-gray-600">Connect with fellow alumni across diverse industries and geographical locations.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <i class="fas fa-briefcase text-5xl text-green-500 mb-6"></i>
                    <h3 class="text-xl font-semibold mb-3">Career Development</h3>
                    <p class="text-gray-600">Access exclusive resources, mentorship programs, and job postings.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <i class="fas fa-handshake text-5xl text-green-500 mb-6"></i>
                    <h3 class="text-xl font-semibold mb-3">Mentorship Programs</h3>
                    <p class="text-gray-600">Find or become a mentor to current students and recent graduates.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <i class="fas fa-calendar-alt text-5xl text-green-500 mb-6"></i>
                    <h3 class="text-xl font-semibold mb-3">Exclusive Events</h3>
                    <p class="text-gray-600">Attend reunions, workshops, and social gatherings.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: What We Offer -->
    <section id="offerings" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-16">Engaging Programs and Resources</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Connect & Network -->
                <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-globe text-6xl text-green-600 mb-6"></i>
                    <h3 class="text-2xl font-bold text-green-700 mb-4">Stay Connected</h3>
                    <p class="text-lg text-gray-700 mb-6">
                        Our platform makes it easy to find and connect with classmates, faculty, and other alumni. Explore our alumni directory, join special interest groups, and participate in online forums.
                    </p>
                    <a href="../alumni/stay-connected.php" class="inline-block bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-full text-md font-semibold transition duration-300">
                        Explore the Alumni Directory
                    </a>
                </div>

                <!-- Career & Professional Development -->
                <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-chart-line text-6xl text-green-600 mb-6"></i>
                    <h3 class="text-2xl font-bold text-green-700 mb-4">Advance Your Career</h3>
                    <p class="text-lg text-gray-700 mb-6">
                        Leverage our career resources, including resume reviews, interview tips, and a dedicated job board. Attend webinars and workshops led by industry experts and successful alumni.
                    </p>
                    <a href="../alumni/advancecareer.php" class="inline-block bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-full text-md font-semibold transition duration-300">
                        Access Career Resources
                    </a>
                </div>

                <!-- Giving Back & Supporting APU -->
                <div class="bg-gray-50 p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-hand-holding-heart text-6xl text-green-600 mb-6"></i>
                    <h3 class="text-2xl font-bold text-green-700 mb-4">Make a Difference</h3>
                    <p class="text-lg text-gray-700 mb-6">
                        Your support helps shape the future of Ahman Pategi University. Learn about ways to give back, volunteer your time, or mentor current students.
                    </p>
                    <a href="../alumni/make-donation.php" class="inline-block bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-full text-md font-semibold transition duration-300">
                        Learn About Giving
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Alumni Success Stories -->
    <section class="py-16 md:py-24 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">Inspiring Journeys</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Story 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/120x120/E0F2FE/green?text=MA" alt="Alumni Photo" class="w-24 h-24 rounded-full object-cover mb-4 border-4 border-green-200">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Muhammad Abdullahi Shaaba</h4>
                    <p class="text-green-600 font-medium mb-3">Cyber Security Expert</p>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        "APU provided me with the foundational knowledge and the critical thinking skills necessary to thrive in the fast-paced tech industry. Forever grateful for my time there!"
                    </p>
                </div>
                <!-- Story 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/120x120/E0F2FE/green?text=AG" alt="Alumni Photo" class="w-24 h-24 rounded-full object-cover mb-4 border-4 border-green-200">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Aweda Gafar Abiola</h4>
                    <p class="text-green-600 font-medium mb-3">Microbiologist</p>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        "The vibrant academic environment and supportive faculty at APU truly shaped my passion for research and equipped me for a successful career in microbiology."
                    </p>
                </div>
                <!-- Story 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/120x120/E0F2FE/green?text=OA" alt="Alumni Photo" class="w-24 h-24 rounded-full object-cover mb-4 border-4 border-green-200">
                    <h4 class="text-xl font-semibold text-gray-900 mb-2">Oyewole Aminah Funmilayo</h4>
                    <p class="text-green-600 font-medium mb-3">Accountant</p>
                    <p class="text-gray-700 text-sm leading-relaxed">
                        "My experience at APU instilled in me a deep commitment to community service and prepared me for impactful work."
                    </p>
                </div>
            </div>
            <a href="#" class="mt-12 inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                Read More Success Stories
            </a>
        </div>
    </section>

    <!-- Section 4: News and Events -->
<section id="events" class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-12">News and Events</h2>

        <!-- Events -->
        <?php if (count($events) > 0): ?>
            <h3 class="text-2xl font-semibold text-left mb-6">Latest Event</h3>
        <div class="flex overflow-x-auto pb-6 space-x-6 scrollable-events mb-10">
            <?php foreach ($events as $event): ?>
                <div class="flex-none w-80 bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-bold text-green-700 mb-3"><?= htmlspecialchars($event['news_subject']) ?></h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2"></i><?= date("F j, Y", strtotime($event['date'])) ?></p>
                    <p class="text-gray-600 mb-2"><i class="far fa-clock mr-2"></i><?= htmlspecialchars($event['time']) ?></p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt mr-2"></i><?= htmlspecialchars($event['location']) ?></p>
                    <p class="text-gray-700 text-sm mb-6"><?= htmlspecialchars($event['description']) ?></p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-5 py-2 rounded-full text-sm font-semibold transition duration-300">
                        Register Now
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- News -->
        <?php if (count($news) > 0): ?>
        <h3 class="text-2xl font-semibold text-left mb-6">Latest News</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($news as $item): ?>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-left">
                    <h3 class="text-xl font-bold text-green-700 mb-3"><?= htmlspecialchars($item['news_subject']) ?></h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2"></i><?= date("F j, Y", strtotime($item['date'])) ?></p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt mr-2"></i><?= htmlspecialchars($item['location']) ?></p>
                    <p class="text-gray-700 text-sm"><?= htmlspecialchars($item['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (count($events) === 0 && count($news) === 0): ?>
            <p class="text-red-600 mt-6">No events or news available at the moment.</p>
        <?php endif; ?>
    </div>
</section>

    <!-- Section 5: Get Involved / Join Us -->
    <section id="join" class="py-16 md:py-24 bg-green-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Ready to Reconnect?</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">
                It's easy to join the Ahman Pategi University Alumni Network. Sign up today to unlock a world of opportunities and strengthen your bond with your alma mater.
            </p>

            <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-xl text-gray-800">
                <form class="space-y-6" method="post">
                    <div>
                        <label for="fullName" class="block text-left text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base"
                               placeholder="Enter Your Full Name">
                    </div>
                    <!--<div>
                        <label for="file" class="block text-left text-sm font-medium text-gray-700 mb-1">Upload Image</label>
                        <input type="file" id="file" name="file" required
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base"
                               >
                    </div>-->
                    <div>
                        <label for="email" class="block text-left text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required 
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base"
                               placeholder="ab@gmail.com">
                    </div>
                    <div>
                        <label for="graduation-year" class="block text-left text-sm font-medium text-gray-700 mb-1">Graduation Year</label>
                        <input type="number" id="graduation-year" name="graduation_year" required min="1900" max="2099"
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base"
                               placeholder="2025">
                    </div>
                    <div>
                        <label for="department" class="block text-left text-sm font-medium text-gray-700 mb-1">Department</label>
                        <input type="text" id="department" name="department"
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base"
                               placeholder="Cyber Security" required>
                    </div>
                     <div>
                        <label for="phoneNumber" class="block text-left text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber"
                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-base"
                               placeholder="+234 xxx xxx xxXX" required>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-md text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                        Sign Me Up!
                    </button>
                </form>
            </div>

            <div class="mt-12 flex justify-center space-x-6">
                <a href="#" class="text-white hover:text-green-200 transition duration-300">
                    <i class="fab fa-facebook-f text-3xl"></i>
                </a>
                <a href="#" class="text-white hover:text-green-200 transition duration-300">
                    <i class="fab fa-linkedin-in text-3xl"></i>
                </a>
                <a href="#" class="text-white hover:text-green-200 transition duration-300">
                    <i class="fab fa-twitter text-3xl"></i>
                </a>
                <a href="#" class="text-white hover:text-green-200 transition duration-300">
                    <i class="fab fa-instagram text-3xl"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                <p>&copy; 2025 Ahman Pategi University Alumni. All rights reserved</p>
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
