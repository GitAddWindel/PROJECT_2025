<!DOCTYPE html>
<html lang="en" id="html-root" class="bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("hidden");
        }

        function toggleDropdown() {
            document.getElementById("dropdown").classList.toggle("hidden");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                var dropdowns = document.getElementsByClassName("dropdown-menu");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }

        function toggleSubmenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            submenu.classList.toggle("hidden");
        }

        function showContent(containerId) {
            const containers = [
                "dashboardContainer", "activeAssessmentContainer", "myCourseContainer",
                "courseMaterialsContainer", "performanceReportsContainer", "gradeHistoryContainer",
                "feedbackCommentsContainer", "manageAssessmentContainer", "assessmentSettingsContainer",
                "assessmentAnalyticsContainer", "performanceAnalyticsContainer", "classPerformanceContainer",
                "attedanceReportsContainer", "exportReportContainer", "accountContainer", "settingsContainer"
            ];
            containers.forEach(id => {
                document.getElementById(id).style.display = 'none';
            });
            document.getElementById(containerId).style.display = 'block';
        }

        window.onload = function() {
            showContent('dashboardContainer');
            createPieChart(); // Create pie chart on page load
        };

        function createPieChart() {
            const ctx = document.getElementById('myPieChart').getContext('2d');
            const myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Completed', 'In Progress', 'Pending'],
                    datasets: [{
                        data: [30, 50, 20], // Sample data
                        backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        }

        function loadCircleProgress() {
            
        }

        // START:: LOAD PROGRESS
        document.addEventListener('DOMContentLoaded', () => {
    const circles = document.querySelectorAll('.circle-progress');

    circles.forEach(circle => {
        const percentage = parseInt(circle.getAttribute('data-percentage')); // Get the percentage as an integer
        let currentPercentage = 0; // Start at 0%

        // Set the CSS variable for the conic-gradient background
        circle.style.setProperty('--percentage', currentPercentage + 'deg'); // Initialize at 0

        // Determine the border color based on final percentage
        setCircleBorderColor(circle, percentage);

        // Animate the percentage from 0 to the specified value
        const interval = setInterval(() => {
            if (currentPercentage < percentage) {
                currentPercentage++;
                circle.style.setProperty('--percentage', currentPercentage + 'deg'); // Update the gradient
                circle.querySelector('.percentage-text').textContent = `${currentPercentage}%`; // Update text
            } else {
                clearInterval(interval); // Stop when we reach the target percentage
            }
        }, 20); // Adjust the speed of the animation here (milliseconds)
    });
});

function setCircleBorderColor(circle, percentage) {
    // Determine the border color based on percentage
    if (percentage <= 40) {
        circle.style.borderColor = 'red'; // For 0% - 40%
    } else if (percentage <= 70) {
        circle.style.borderColor = 'yellow'; // For 41% - 70%
    } else {
        circle.style.borderColor = 'green'; // For 71% - 100%
    }
}


    </script>
</head>
<style>
   .circle-progress {
    position: relative;
    width: 100px;  /* Diameter of the circle */
    height: 100px; /* Diameter of the circle */
    border-radius: 50%; /* Make it circular */
    border: 8px solid #4A90E2; /* Outline color and thickness */
    background: conic-gradient(
        #4A90E2 var(--percentage, 0%),
        #e0e0e0 0%
    );
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 10px; /* Space around the circle */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional shadow */
    background-clip: padding-box; /* Ensures the background doesn't overlap the border */
    transition: background 0.5s ease; /* Smooth transition for background */
}

.percentage-text {
    position: absolute;
    font-weight: bold;
    font-size: 1.2rem; /* Adjust font size as needed */
    color: #000; /* Color of the text */
    border-radius: 50%; /* Round text background */
    padding: 5px 10px; /* Padding around text */
    transition: opacity 0.5s ease; /* Smooth transition for text opacity */
}

.circle-progress[data-percentage] {
    --percentage: calc(var(--percentage) * 1deg); /* Set custom property based on percentage */
}


</style>
<body class="bg-gray-100">

    <!-- Sidebar and Main Content Container -->
    <div class="flex h-screen">
        
        <!-- Sidebar (toggled for mobile view) -->
        <aside id="sidebar" class="w-64 bg-gray-800 text-white hidden md:block">
            <div class="p-4 text-center font-bold text-xl">My Dashboard</div>
            <nav>
                <ul class="space-y-4 p-4">
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 bg-gray-700 rounded hover:bg-gray-600" onclick="showContent('dashboardContainer')">
                            <img src="../public/assets/default-images/dashboard.png" alt="dashboard icon" class="bg-white w-5 h-5 mr-2"> Dashboard
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-600 rounded" onclick="toggleSubmenu('assessments-submenu')">
                            <img src="../public/assets/default-images/check-list.png" alt="a/q icon" class="bg-white w-5 h-5 mr-2"> Assessments/Quizzes
                        </a>
                        <ul id="assessments-submenu" class="pl-6 hidden space-y-2">
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('activeAssessmentContainer')">Active Assessments</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-600 rounded" onclick="toggleSubmenu('courses-submenu')">
                            <img src="../public/assets/default-images/online-learning.png" alt="c/s icon" class="bg-white w-5 h-5 mr-2"> Courses/Subjects
                        </a>
                        <ul id="courses-submenu" class="pl-6 hidden space-y-2">
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('myCourseContainer')">My Courses</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('courseMaterialsContainer')">Course Materials</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-600 rounded" onclick="toggleSubmenu('results-submenu')">
                            <img src="../public/assets/default-images/exam.png" alt="r/s icon" class="bg-white w-5 h-5 mr-2"> Results/Grades
                        </a>
                        <ul id="results-submenu" class="pl-6 hidden space-y-2">
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('performanceReportsContainer')">Performance Reports</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('gradeHistoryContainer')">Grade History</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('feedbackCommentsContainer')">Feedback & Comments</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-600 rounded" onclick="toggleSubmenu('create-assessment-submenu')">
                            <img src="../public/assets/default-images/zoom-in.png" alt="ca icon" class="bg-white w-5 h-5 mr-2"> Create Assessment
                        </a>
                        <ul id="create-assessment-submenu" class="pl-6 hidden space-y-2">
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('manageAssessmentContainer')">Manage Assessments</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('assessmentSettingsContainer')">Assessment Settings</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('assessmentAnalyticsContainer')">Assessment Analytics</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-600 rounded" onclick="toggleSubmenu('reports-submenu')">
                            <img src="../public/assets/default-images/r-a.png" alt="ca icon" class="bg-white w-5 h-5 mr-2"> Reports & Analytics
                        </a>
                        <ul id="reports-submenu" class="pl-6 hidden space-y-2">
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('performanceAnalyticsContainer')">Performance Analytics</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('classPerformanceContainer')">Class Performance Summary</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('attedanceReportsContainer')">Attendance Reports</a></li>
                            <li><a href="#" class="block py-2 hover:bg-gray-600 rounded" onclick="showContent('exportReportContainer')">Export Reports</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <!-- Sidebar Toggle Button for Mobile -->
                <div class="text-xl font-semibold"><button onclick="toggleSidebar()"><img src="../public/assets/default-images/menubar.png" alt="menu bar" class="w-5 h-5 cursor-pointer"></button></div>
                
                <div class="flex space-x-4 items-center">
                    <a href="#" class="text-white py-2 px-4 rounded"><img src="../public/assets/default-images/notification.png" alt="notification icon" class="bg-white w-5 h-5 cursor-pointer"></a>

                    <!-- Profile Image with Dropdown -->
                <div class="relative">
                    <img src="../public/assets/default-images/default-profile.png" alt="Profile Image" class="rounded-full w-10 h-10 cursor-pointer dropdown-toggle" onclick="toggleDropdown()">
                    <div id="dropdown" class="absolute right-0 z-20 bg-white shadow-lg rounded mt-2 w-48 hidden">
                        <ul class="py-2">
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200" onclick="showContent('accountContainer')">Account</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200" onclick="showContent('settingsContainer')">Settings</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 p-6 overflow-y-auto">
            <div id="dashboardContainer" class="space-y-6">
    <h1 class="text-2xl font-bold">Dashboard</h1>

    <!-- Pie Chart -->
    <div class="w-full md:w-1/2 mx-auto">
        <canvas id="myPieChart" class="w-full h-48"></canvas>
    </div>

<!-- Progress Bars Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
        <h2 class="text-xl font-semibold mb-4">Course Completion</h2>
        <div class="circle-progress mb-4" data-percentage="80" aria-label="HTML/CSS Completion">
            <span class="percentage-text">0%</span>
        </div>
        <span class="text-sm">HTML/CSS Completion</span> <!-- Added name -->
        
        <div class="circle-progress mb-4" data-percentage="60" aria-label="JavaScript Completion">
            <span class="percentage-text">0%</span>
        </div>
        <span class="text-sm">JavaScript Completion</span> <!-- Added name -->
        
        <div class="circle-progress mb-4" data-percentage="90" aria-label="PHP Completion">
            <span class="percentage-text">0%</span>
        </div>
        <span class="text-sm">PHP Completion</span> <!-- Added name -->
    </div>

    <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
        <h2 class="text-xl font-semibold mb-4">Assessments</h2>
        <div class="circle-progress mb-4" data-percentage="75" aria-label="Midterm Exam Completion">
            <span class="percentage-text">0%</span>
        </div>
        <span class="text-sm">Midterm Exam Completion</span> <!-- Added name -->

        <div class="circle-progress mb-4" data-percentage="50" aria-label="Final Exam Completion">
            <span class="percentage-text">0%</span>
        </div>
        <span class="text-sm">Final Exam Completion</span> <!-- Added name -->
        
        <div class="circle-progress mb-4" data-percentage="85" aria-label="Quizzes Completion">
            <span class="percentage-text">0%</span>
        </div>
        <span class="text-sm">Quizzes Completion</span> <!-- Added name -->
    </div>
</div>





    <!-- Assessment Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Upcoming Assessments</h3>
            <p class="text-sm text-gray-600">1. Midterm Exam - 20th October</p>
            <p class="text-sm text-gray-600">2. Final Exam - 15th November</p>
            <p class="text-sm text-gray-600">3. Quiz 1 - 10th October</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Recent Submissions</h3>
            <p class="text-sm text-gray-600">1. Assignment 1 - Submitted</p>
            <p class="text-sm text-gray-600">2. Quiz 1 - Graded</p>
            <p class="text-sm text-gray-600">3. Project 1 - Pending Review</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Grades Overview</h3>
            <p class="text-sm text-gray-600">Midterm Exam: A-</p>
            <p class="text-sm text-gray-600">Final Exam: Upcoming</p>
            <p class="text-sm text-gray-600">Quiz Average: B+</p>
        </div>
    </div>
</div>


                <!-- Other Content Containers -->
                <div id="activeAssessmentContainer" class="hidden">Active Assessments Content</div>
                <div id="myCourseContainer" class="hidden">My Courses Content</div>
                <div id="courseMaterialsContainer" class="hidden">Course Materials Content</div>
                <div id="performanceReportsContainer" class="hidden">Performance Reports Content</div>
                <div id="gradeHistoryContainer" class="hidden">Grade History Content</div>
                <div id="feedbackCommentsContainer" class="hidden">Feedback & Comments Content</div>
                <div id="manageAssessmentContainer" class="hidden">Manage Assessment Content</div>
                <div id="assessmentSettingsContainer" class="hidden">Assessment Settings Content</div>
                <div id="assessmentAnalyticsContainer" class="hidden">Assessment Analytics Content</div>
                <div id="performanceAnalyticsContainer" class="hidden">Performance Analytics Content</div>
                <div id="classPerformanceContainer" class="hidden">Class Performance Summary Content</div>
                <div id="attedanceReportsContainer" class="hidden">Attendance Reports Content</div>
                <div id="exportReportContainer" class="hidden">Export Reports Content</div>
                <div id="accountContainer" class="hidden">Account Content</div>
                <div id="settingsContainer" class="hidden">Settings Content</div>
            </main>
        </div>
    </div>
</body>
</html>
