<?php
include("config.php");

$news_subject = $description = $date = $location = $time = $type = "";
$news_subject_Err = $description_Err = $date_Err = $location_Err = $time_Err = $type_Err = "";

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news_subject = test_input($_POST["news_subject"]);
    $type = test_input($_POST["type"]);
    $description = test_input($_POST["description"]);
    $date = test_input($_POST["date"]);
    $location = test_input($_POST["location"]);
    $time = test_input($_POST["time"]);

    if (!empty($news_subject) && !empty($type) && !empty($description) && !empty($date) && !empty($location) && !empty($time)) {
        $stmt = $conn->prepare("INSERT INTO eventsandnews (news_subject, type, description, date, location, time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $news_subject, $type, $description, $date, $location, $time);

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

<!-- News & Events Management Section -->
        <section id="news-events-management" class="content-section active mx-6">
            <h2 class="text-4xl font-bold text-blue-700 mb-8 my-4">News & Events Management</h2>

            <div class="bg-white p-6 rounded-lg shadow-md mb-8 ">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Add New News/Event</h3>
                <form class="space-y-4" method="post">
                    <div>
                        <label for="news-event-title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="news-event-title" name="news_subject"  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="news-event-type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="news-event-type" class="mt-1 block w-full px-3  py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" name="type">
                            <option value="News">News</option>
                            <option value="Event">Event</option>
                        </select>
                    </div>
                    <div>
                        <label for="news-event-date" class="block text-sm font-medium text-gray-700">Date (for Events)</label>
                        <input type="date" id="news-event-date" name="date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="news-event-description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="news-event-description" name="description" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div>
                        <label for="news-event-image" class="block text-sm font-medium text-gray-700">Location </label>
                        <input type="text" id="news-event-image" name="location" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com/image.jpg">
                    </div>
                    <div>
                        <label for="news-event-image" class="block text-sm font-medium text-gray-700">Time</label>
                        <input type="text" id="news-event-image" name="time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com/image.jpg">
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-plus-circle mr-2"></i> Add Item
                    </button>
                </form>
            </div>

                   </section>