<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Alumni - News & Events</title>
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

    <!-- Header/Navigation Bar -->
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
                <a href="stay-connected.php" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Stay Connected</a>
                <a href="advancecareer.php" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Advance Your Career</a>
                <a href="make-donation.php" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Make a Difference</a>
                <a href="#" class="text-green-700 font-bold transition duration-300">News & Events</a>
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
            <a href="stay_connected.php" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Stay Connected</a>
            <a href="advance_your_career.php" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Advance Your Career</a>
            <a href="make_a_difference.php" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Make a Difference</a>
            <a href="#" class="block px-4 py-2 text-green-700 font-bold hover:bg-green-50 rounded-md">News & Events</a>
        </div>
    </header>

    <!-- Hero Section for News & Events -->
    <section class="relative bg-purple-600 text-white py-20 md:py-28 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('../alumni/graduation.webp');"></div>
        <div class="container mx-auto relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                APU Alumni: News & Events
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                Stay informed about the latest happenings, university achievements, and upcoming alumni gatherings.
            </p>
        </div>
    </section>

    <!-- Section: Latest News -->
    <section id="news" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-12">Latest News</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Article 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col">
                    <img src="https://placehold.co/400x250/E0F2FE/green?text=New+Research" alt="News Image" class="rounded-md mb-4 object-cover h-48 w-full">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">APU Researchers Secure Major Grant for Climate Study</h3>
                    <p class="text-gray-600 text-sm mb-3"><i class="far fa-calendar-alt mr-2"></i>July 12, 2025</p>
                    <p class="text-gray-700 text-sm mb-4 flex-grow">
                        A team of environmental scientists at Ahman Pategi University has been awarded a significant grant to research sustainable climate solutions in West Africa.
                    </p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold transition duration-300">Read More <i class="fas fa-arrow-right ml-1 text-sm"></i></a>
                </div>

                <!-- News Article 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col">
                    <img src="https://placehold.co/400x250/E0F2FE/green?text=Alumni+Impact" alt="News Image" class="rounded-md mb-4 object-cover h-48 w-full">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Alumni-Led Startup Wins National Innovation Award</h3>
                    <p class="text-gray-600 text-sm mb-3"><i class="far fa-calendar-alt mr-2"></i>July 5, 2025</p>
                    <p class="text-gray-700 text-sm mb-4 flex-grow">
                        A tech startup founded by APU alumnus, Dr. Aminu Bello, has been recognized for its groundbreaking work in agricultural technology.
                    </p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold transition duration-300">Read More <i class="fas fa-arrow-right ml-1 text-sm"></i></a>
                </div>

                <!-- News Article 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col">
                    <img src="https://placehold.co/400x250/E0F2FE/green?text=Student+Success" alt="News Image" class="rounded-md mb-4 object-cover h-48 w-full">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">APU Students Excel at International Robotics Competition</h3>
                    <p class="text-gray-600 text-sm mb-3"><i class="far fa-calendar-alt mr-2"></i>June 28, 2025</p>
                    <p class="text-gray-700 text-sm mb-4 flex-grow">
                        Our engineering students showcased their innovation and skill, securing top positions at the annual global robotics challenge.
                    </p>
                    <a href="#" class="text-green-600 hover:text-green-800 font-semibold transition duration-300">Read More <i class="fas fa-arrow-right ml-1 text-sm"></i></a>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                    View All News
                </a>
            </div>
        </div>
    </section>

    <!-- Section: Upcoming Events -->
    <section id="events" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-12">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Event 1: Annual Alumni Reunion -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex flex-col">
                    <h3 class="text-xl font-bold text-green-700 mb-3">Annual Alumni Reunion</h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2"></i>October 26, 2025</p>
                    <p class="text-gray-600 mb-2"><i class="far fa-clock mr-2"></i>6:00 PM - 10:00 PM WAT</p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt mr-2"></i>APU Main Auditorium</p>
                    <p class="text-gray-700 text-sm mb-6 flex-grow">
                        Join us for a night of nostalgia, networking, and celebration. Reconnect with old friends and make new memories.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-5 py-2 rounded-full text-sm font-semibold text-center transition duration-300">
                        Register Now
                    </a>
                </div>
                <!-- Event 2: Career Development Workshop: AI in Industry -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex flex-col">
                    <h3 class="text-xl font-bold text-green-700 mb-3">Career Development Workshop: AI in Industry</h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2"></i>November 15, 2025</p>
                    <p class="text-gray-600 mb-2"><i class="far fa-clock mr-2"></i>2:00 PM - 4:00 PM WAT</p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-laptop mr-2"></i>Virtual (Zoom)</p>
                    <p class="text-gray-700 text-sm mb-6 flex-grow">
                        Learn about the latest trends in AI and its impact on various industries from leading alumni experts.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-5 py-2 rounded-full text-sm font-semibold text-center transition duration-300">
                        Learn More
                    </a>
                </div>
                <!-- Event 3: Alumni Mentorship Mixer -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex flex-col">
                    <h3 class="text-xl font-bold text-green-700 mb-3">Alumni Mentorship Mixer</h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2"></i>December 7, 2025</p>
                    <p class="text-gray-600 mb-2"><i class="far fa-clock mr-2"></i>5:00 PM - 7:00 PM WAT</p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-building mr-2"></i>APU Alumni Center</p>
                    <p class="text-gray-700 text-sm mb-6 flex-grow">
                        An opportunity for students and young alumni to connect with experienced professionals for guidance.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-5 py-2 rounded-full text-sm font-semibold text-center transition duration-300">
                        Register Now
                    </a>
                </div>
                <!-- Event 4: APU Giving Day Celebration -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex flex-col">
                    <h3 class="text-xl font-bold text-green-700 mb-3">APU Giving Day Celebration</h3>
                    <p class="text-gray-600 mb-2"><i class="far fa-calendar-alt mr-2"></i>January 20, 2026</p>
                    <p class="text-gray-600 mb-2"><i class="far fa-clock mr-2"></i>All Day</p>
                    <p class="text-gray-600 mb-4"><i class="fas fa-globe mr-2"></i>Online & Campus-wide</p>
                    <p class="text-gray-700 text-sm mb-6 flex-grow">
                        Join us in celebrating our annual giving day, supporting scholarships, research, and campus development.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-5 py-2 rounded-full text-sm font-semibold text-center transition duration-300">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                    View All Events
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
