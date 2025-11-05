<?php
include("config.php");

$title = $category = $description = $type_program = $apply_link = $deadline_date = "";
$postErr = $companyNameErr = $job_descriptionErr = $job_typeErr = $apply_linkErr = $deadline_dateErr = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = test_input($_POST["title"]);
    $category = test_input($_POST["category"]);
    $description = test_input($_POST["description"]);
    $type_program = test_input($_POST["type_program"]);
    $apply_link = test_input($_POST["apply_link"]);
    $deadline_date = test_input($_POST["deadline_date"]);
    
    if (!empty($title) && !empty($category) && !empty($description) && !empty($type_program) && !empty($apply_link) && !empty($deadline_date)) {
        $stmt = $conn->prepare("INSERT INTO scholarships (title, category, description, type_program, apply_link, deadline_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $category, $description, $type_program, $apply_link, $deadline_date);

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

<!-- Scholarships & Jobs Management Section -->
        <section id="scholarships-jobs-management" class="content-section active mx-6" style="width: calc(100% - 4.5rem);">
            <h2 class="text-4xl font-bold text-green-700 mb-8">Scholarships</h2>

            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Add New Scholarship</h3>
                <form class="space-y-4" method="post">
                    <div>
                        <label for="sj-title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="sj-title" name="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="sj-type" class="block text-sm font-medium text-gray-700">Category</label>
                        <input type="text" id="sj-title" name="category" placeholder="Enter Type of Scholarship (Full / Part Time)" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="sj-type_program" class="block text-sm font-medium text-gray-700">Program Type</label>
                        <input type="text" id="sj-type_program" name="type_program" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="sj-apply_link" class="block text-sm font-medium text-gray-700">Apply Link Type</label>
                        <input type="text" id="sj-apply_link" name="apply_link" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="sj-deadline_date" class="block text-sm font-medium text-gray-700">Deadline (for Scholarships)</label>
                        <input type="date" id="sj-deadline" name="deadline_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="sj-description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="sj-description" rows="4" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-plus-circle mr-2"></i> Add Item
                    </button>
                </form>
            </div>

        </section>
