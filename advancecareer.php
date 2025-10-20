<?php
// Include your database configuration file
include("config.php");

// It's good practice to ensure $conn is available after including config.php
if (!isset($conn) || $conn->connect_error) {
    // Handle the case where connection failed in config.php
    $db_connection_error = true;
} else {
    $db_connection_error = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Alumni - Advance Your Career</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0V4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <header class="bg-white shadow-md py-4 px-6 md:px-10 lg:px-20">
        <nav class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="../alumni/Ahman.webp" alt="APU Logo" class="h-12 w-12 rounded-full mr-3">
                <a href="index.php" class="text-2xl font-bold text-green-700 hover:text-green-800 transition duration-300">APU Alumni</a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="index.php#about" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">About Us</a>
                <a href="index.php#offerings" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">What We Offer</a>
                <a href="index.php#events" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Events</a>
                <a href="stay_connected.php" class="text-gray-600 hover:text-green-700 font-medium transition duration-300">Stay Connected</a>
                <a href="#" class="text-green-700 font-bold transition duration-300">Advance Your Career</a>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-green-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2">
            <a href="index.php#about" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">About Us</a>
            <a href="index.php#offerings" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">What We Offer</a>
            <a href="index.php#events" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Events</a>
            <a href="stay_connected.php" class="block px-4 py-2 text-gray-600 hover:bg-green-50 rounded-md">Stay Connected</a>
            <a href="#" class="block px-4 py-2 text-green-700 font-bold hover:bg-green-50 rounded-md">Advance Your Career</a>
        </div>
    </header>

    <section class="relative bg-purple-700 text-white py-20 md:py-28 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('../alumni/graduation.webp');"></div>
        <div class="container mx-auto relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                Advance Your Career with APU Alumni
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
                Explore exclusive job opportunities, scholarship programs, and professional development resources tailored for our graduates.
            </p>
        </div>
    </section>

    <section id="jobs" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-12">Exclusive Job Opportunities</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-center mb-10">
                Our job board features positions from leading companies, many of which are offered by fellow alumni or organizations keen to hire APU talent.
            </p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="job-listings-container">
                <?php
                if ($db_connection_error) {
                    echo '<p class="text-red-500 text-center col-span-full">Error loading job opportunities. Please check your database connection configuration.</p>';
                } else {
                    // Fetch job opportunities from the 'jobopp' table
                    $sql = "SELECT title, company, location, description, job_type, posted_date, apply_link FROM job_opportunities ORDER BY posted_date DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            // Format date nicely
                            $posted_date = date('F d, Y', strtotime($row['posted_date']));
                            ?>
                            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($row['title']); ?></h3>
                                <p class="text-green-600 font-medium mb-2"><?php echo htmlspecialchars($row['company']); ?> - <?php echo htmlspecialchars($row['location']); ?></p>
                                <p class="text-gray-700 text-sm mb-4 flex-grow">
                                    <?php echo nl2br(htmlspecialchars($row['description'])); // nl2br converts newlines to <br> tags ?>
                                </p>
                                <div class="flex items-center text-gray-600 text-sm mb-4">
                                    <i class="fas fa-briefcase mr-2"></i><?php echo htmlspecialchars($row['job_type']); ?> &bull; <i class="fas fa-calendar-alt ml-4 mr-2"></i>Posted: <?php echo $posted_date; ?>
                                </div>
                                <a href="<?php echo htmlspecialchars($row['apply_link']); ?>" class="inline-block bg-green-600 text-white hover:bg-green-700 px-6 py-3 rounded-md text-md font-semibold text-center transition duration-300">
                                    View Details & Apply
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="text-gray-600 text-center col-span-full">No job opportunities currently available. Please check back soon!</p>';
                    }
                }
                ?>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                    View All Job Listings
                </a>
            </div>
        </div>
    </section>

    <section id="scholarships" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 text-center mb-12">Scholarship Opportunities</h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-center mb-10">
                Continue your education or support your research with various scholarship opportunities available to APU alumni.
            </p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <?php
                if ($db_connection_error) {
                    echo '<p class="text-red-500 text-center col-span-full">Error loading scholarship opportunities. Please check your database connection configuration.</p>';
                } else {
                    // Fetch scholarship opportunities from the 'scholarship_opportunities' table
                    // You'll need to create this table in your database first, similar to job_opportunities.
                    // For now, I'll use a placeholder table name 'scholarships' and sample fields.
                    $sql_scholarships = "SELECT title, type_program, description, category, deadline_date, apply_link FROM scholarships ORDER BY deadline_date ASC";
                    $result_scholarships = $conn->query($sql_scholarships);

                    if ($result_scholarships && $result_scholarships->num_rows > 0) {
                        while($row_scholarship = $result_scholarships->fetch_assoc()) {
                            $deadline_date = ($row_scholarship['deadline_date'] == '0000-00-00' || is_null($row_scholarship['deadline_date'])) ? 'Rolling Deadline' : date('F d, Y', strtotime($row_scholarship['deadline_date']));
                            ?>
                            <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300 flex flex-col">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($row_scholarship['title']); ?></h3>
                                <p class="text-green-600 font-medium mb-2"><?php echo htmlspecialchars($row_scholarship['type_program']); ?></p>
                                <p class="text-gray-700 text-sm mb-4 flex-grow">
                                    <?php echo nl2br(htmlspecialchars($row_scholarship['description'])); ?>
                                </p>
                                <div class="flex items-center text-gray-600 text-sm mb-4">
                                    <i class="fas fa-<?php echo ($row_scholarship['category'] == 'Postgraduate') ? 'graduation-cap' : (($row_scholarship['category'] == 'Entrepreneurship') ? 'lightbulb' : (($row_scholarship['category'] == 'Professional Dev.') ? 'certificate' : 'flask')); ?> mr-2"></i><?php echo htmlspecialchars($row_scholarship['category']); ?> &bull; <i class="fas fa-calendar-times ml-4 mr-2"></i>Deadline: <?php echo $deadline_date; ?>
                                </div>
                                <a href="<?php echo htmlspecialchars($row_scholarship['apply_link']); ?>" class="inline-block bg-green-500 text-white hover:bg-green-600 px-6 py-3 rounded-md text-md font-semibold text-center transition duration-300">
                                    Learn More & Apply
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<p class="text-gray-600 text-center col-span-full">No scholarship opportunities currently available. Please check back soon!</p>';
                    }
                }
                ?>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-green-600 text-white hover:bg-green-700 px-8 py-4 rounded-full text-lg font-semibold shadow-lg transition duration-300 transform hover:scale-105">
                    View All Scholarship Opportunities
                </a>
            </div>
        </div>
    </section>

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
<?php
// Close the database connection at the end of the script
if (!$db_connection_error) {
    $conn->close();
}
?>