<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/81e26f6bda.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-lg font-bold">Driver Dashboard</h1>
        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </button>
    </header>
    <div class="container mx-auto px-4 mt-8">
        <main class="flex flex-wrap -mx-4">
            <!-- Map -->
            <div class="w-full lg:w-3/5 px-4 mb-8">
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-4">Map</h2>
                    <!-- Here you can integrate your map API or embed a map image -->
                    <img src="https://via.placeholder.com/800x400.png?text=Map+Here" alt="Map" class="rounded-lg">
                </div>
            </div>
            <!-- Notifications -->
            <div class="w-full lg:w-2/5 px-4 mb-8">
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-4">Notifications</h2>
                    <ul>
                        <li class="flex items-start mb-4">
                            <div class="bg-blue-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">New pickup scheduled</p>
                                <p class="text-gray-600">You have a new pickup scheduled at 123 Main St. at 10:00 AM on 4/3/2023.</p>
                            </div>
                        </li>
                        <li class="flex items-start mb-4">
                            <div class="bg-yellow-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-exclamation"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Pending pickup</p>
                                <p class="text-gray-600">You have a pending pickup at 456 Elm St. that needs to be completed.</p>
                            </div>
                        </li>
                        <li class="flex items-start mb-4">
                            <div class="bg-red-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Urgent pickup required</p>
                                <p class="text-gray-600">There is an urgent pickup that needs to be completed at 789 Oak St. immediately.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Schedule -->
            <div class="w-full lg:w-1/2 px-4 mb-8">
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-4">Schedule</h2>
                    <table class="w-full">
                        <thead>
                            <tr class="text-gray-600 border-b-2">
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Location</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-gray-700">
                                <td class="px-4 py-2">1</td>
                                <td class="px-4 py-2">123 Main St.</td>
                                <td class="px-4 py-2">4/3/2023</td>
                                <td class="px-4 py-2 text-green-600 font-medium">Scheduled</td>
                            </tr>
                            <tr class="text-gray-700">
                                <td class="px-4 py-2">2</td>
                                <td class="px-4 py-2">456 Elm St.</td>
                                <td class="px-4 py-2">4/4/2023</td>
                                <td class="px-4 py-2 text-yellow-600 font-medium">Pending</td>
                            </tr>
                            <tr class="text-gray-700">
                                <td class="px-4 py-2">3</td>
                                <td class="px-4 py-2">789 Oak St.</td>
                                <td class="px-4 py-2">4/5/2023</td>
                                <td class="px-4 py-2 text-red-600 font-medium">Urgent</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Pickup Details -->
            <div class="w-full lg:w-1/2 px-4 mb-8">
                <div class="bg-white rounded-lg p-4">
                    <h2 class="text-lg font-bold mb-4">Pickup Details</h2>
                    <ul>
                        <li class="flex items-center mb-4">
                            <div class="bg-gray-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-building"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Location:</p>
                                <p class="text-gray-600">123 Main St.</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4">
                            <div class="bg-gray-500 text-white rounded-full h-8 w-8 flex justify ">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Date:</p>
                                <p class="text-gray-600">4/3/2023</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4">
                            <div class="bg-gray-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Time:</p>
                                <p class="text-gray-600">10:00 AM - 12:00 PM</p>
                            </div>
                        </li>
                        <li class="flex items-center mb-4">
                            <div class="bg-gray-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Additional Info:</p>
                                <p class="text-gray-600">Please make sure to pick up all trash cans from the curb and place them back where you found them.</p>
                            </div>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-gray-500 text-white rounded-full h-8 w-8 flex justify-center items-center mr-4">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div>
                                <p class="text-gray-800 font-medium mb-1">Comments:</p>
                                <p class="text-gray-600">No comments.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
</body>

</html>