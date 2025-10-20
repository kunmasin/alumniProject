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

<!-- Donations List Section -->
        <section id="donations-list" class="content-section active mx-6">
            <h2 class="text-4xl font-bold text-blue-700 mb-8">Donations List</h2>
            <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Donor Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Amina Yusuf</td>
                            <td class="px-6 py-4 whitespace-nowrap">$5,000</td>
                            <td class="px-6 py-4 whitespace-nowrap">2025-07-10</td>
                            <td class="px-6 py-4 whitespace-nowrap">Student Scholarships</td>
                            <td class="px-6 py-4 whitespace-nowrap">One-Time</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Engr. Biodun Adebayo</td>
                            <td class="px-6 py-4 whitespace-nowrap">$100</td>
                            <td class="px-6 py-4 whitespace-nowrap">2025-07-05</td>
                            <td class="px-6 py-4 whitespace-nowrap">Area of Greatest Need</td>
                            <td class="px-6 py-4 whitespace-nowrap">Recurring</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">APU Class of 2000</td>
                            <td class="px-6 py-4 whitespace-nowrap">$10,000</td>
                            <td class="px-6 py-4 whitespace-nowrap">2025-06-28</td>
                            <td class="px-6 py-4 whitespace-nowrap">Campus Development</td>
                            <td class="px-6 py-4 whitespace-nowrap">One-Time</td>
                        </tr>
                        <!-- More donation rows can be added here -->
                    </tbody>
                </table>
            </div>
        </section>


         </main>

    
</body>
</html>