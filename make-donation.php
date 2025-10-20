<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Alumni - Make a Difference</title>
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
                <a href="stay_connected.php" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Stay Connected</a>
                <a href="advance_your_career.php" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Advance Your Career</a>
                <a href="#" class="text-green-700 font-bold transition duration-300">Make a Difference</a>
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
            <a href="stay_connected.php" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Stay Connected</a>
            <a href="advance_your_career.php" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Advance Your Career</a>
            <a href="#" class="block px-4 py-2 text-green-700 font-bold hover:bg-green-50 rounded-md">Make a Difference</a>
        </div>
    </header>

    <!-- Hero Section for Make a Difference -->
    <section class="relative bg-purple-800 text-white py-20 md:py-28 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('../alumni/graduation.webp');"></div>
        <div class="container mx-auto relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                Make a Difference: Your Impact Matters
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                Your support helps shape the future of Ahman Pategi University. Learn about ways to give back, volunteer your time, or mentor current students.
            </p>
        </div>
    </section>

    <!-- Section: Ways to Give Financially -->
    <section id="donate" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-12">Support APU: Financial Contributions</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-center mb-10">
                Every contribution, no matter the size, helps us provide scholarships, enhance facilities, and support groundbreaking research. Choose the giving option that's right for you.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- One-Time Donation -->
                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <i class="fas fa-hand-holding-usd text-6xl text-green-500 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">One-Time Gift</h3>
                    <p class="text-gray-700 text-lg mb-6 flex-grow">
                        Make a single, impactful donation to support the university's most pressing needs or a specific program close to your heart.
                    </p>
                    <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                        Donate Now
                    </a>
                </div>

                <!-- Recurring Donation -->
                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <i class="fas fa-sync-alt text-6xl text-green-500 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Recurring Gift</h3>
                    <p class="text-gray-700 text-lg mb-6 flex-grow">
                        Become a consistent supporter by setting up a monthly or annual recurring donation, providing sustained impact for APU.
                    </p>
                    <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                        Set Up Recurring Donation
                    </a>
                </div>
            </div>

            <div class="text-center mt-16">
                <h3 class="text-2xl font-bold text-green-700 mb-6">Designate Your Gift</h3>
                <p class="text-lg max-w-3xl mx-auto mb-8">
                    You can direct your donation to specific areas that matter most to you:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <i class="fas fa-graduation-cap text-4xl text-green-500 mb-3"></i>
                        <p class="font-semibold text-gray-800">Student Scholarships</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <i class="fas fa-book text-4xl text-green-500 mb-3"></i>
                        <p class="font-semibold text-gray-800">Faculty Research</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <i class="fas fa-building text-4xl text-green-500 mb-3"></i>
                        <p class="font-semibold text-gray-800">Campus Development</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <i class="fas fa-laptop-code text-4xl text-green-500 mb-3"></i>
                        <p class="font-semibold text-gray-800">Technology & Innovation</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <i class="fas fa-medal text-4xl text-green-500 mb-3"></i>
                        <p class="font-semibold text-gray-800">Athletics Programs</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <i class="fas fa-heart text-4xl text-green-500 mb-3"></i>
                        <p class="font-semibold text-gray-800">Area of Greatest Need</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Other Ways to Give -->
    <section id="other-ways" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-12">Other Ways to Make an Impact</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-center mb-10">
                Your time, expertise, and resources are just as valuable as financial contributions. Explore how you can contribute in other meaningful ways.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Volunteer Your Time -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <i class="fas fa-hands-helping text-6xl text-green-600 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Volunteer Your Time</h3>
                    <p class="text-gray-700 text-lg mb-6 flex-grow">
                        Lend your skills and time to alumni events, university projects, or student support initiatives.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-6 py-3 rounded-full text-md font-semibold transition duration-300">
                        Explore Volunteer Opportunities
                    </a>
                </div>

                <!-- Mentor Current Students -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <i class="fas fa-chalkboard-teacher text-6xl text-green-600 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Mentor Current Students</h3>
                    <p class="text-gray-700 text-lg mb-6 flex-grow">
                        Share your professional insights and guide the next generation of APU graduates.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-6 py-3 rounded-full text-md font-semibold transition duration-300">
                        Become a Mentor
                    </a>
                </div>

                <!-- In-Kind Donations -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col items-center text-center">
                    <i class="fas fa-box-open text-6xl text-green-600 mb-6"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">In-Kind Donations</h3>
                    <p class="text-gray-700 text-lg mb-6 flex-grow">
                        Contribute equipment, software, books, or other valuable resources to support university departments.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white hover:bg-green-600 px-6 py-3 rounded-full text-md font-semibold transition duration-300">
                        Learn About In-Kind Giving
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action / Contact -->
    <section class="py-16 md:py-24 bg-green-700 text-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Ready to Make Your Mark?</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10">
                Connect with our Alumni Relations team to discuss how your generosity can best support Ahman Pategi University.
            </p>
            <a href="mailto:alumni@apu.edu.ng" class="inline-block bg-white text-green-700 hover:bg-green-100 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                Contact Alumni Relations
            </a>
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
