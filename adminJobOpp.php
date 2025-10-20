<?php
include("config.php");

$post = $companyName = $job_description = $job_type = "";
$postErr = $companyNameErr = $job_descriptionErr = $job_typeErr = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = test_input($_POST["post"]);
    $companyName = test_input($_POST["companyName"]);
    $job_description = test_input($_POST["job_description"]);
    $job_type = test_input($_POST["job_type"]);
    
    if (!empty($post) && !empty($companyName) && !empty($job_description) && !empty($job_type)) {
        $stmt = $conn->prepare("INSERT INTO jobopp (post, companyName, job_description, job_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $post, $companyName, $job_description, $job_type);

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
        <section id="scholarships-jobs-management" class="content-section active mx-6">
            <h2 class="text-4xl font-bold text-blue-700 mb-8">Jobs Management</h2>

            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Add New Job</h3>
                <form class="space-y-4" method="post">
                    <div>
                        <label for="sj-title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="sj-title" name="post" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="sj-type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="sj-type" name="job_type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="Job Opportunity">Job Opportunity</option>
                        </select>
                    </div>
                    <div>
                        <label for="sj-organization" class="block text-sm font-medium text-gray-700">Organization/Provider</label>
                        <input type="text" id="sj-organization" name="companyName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!--<div>
                        <label for="sj-deadline" class="block text-sm font-medium text-gray-700">Deadline (for Scholarships)</label>
                        <input type="date" id="sj-deadline" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>-->
                    <div>
                        <label for="sj-description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="sj-description" rows="4" name="job_description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-plus-circle mr-2"></i> Add Item
                    </button>
                </form>
            </div>
        </section>
