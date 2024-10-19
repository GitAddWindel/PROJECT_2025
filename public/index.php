<!DOCTYPE html>
<html lang="en" id="html-root" class="bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <script src="assets/js/modal.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Sidebar and Main Content Container -->
    <div class="flex h-screen">
        
            <!-- Sidebar (toggled for mobile view) -->
            <aside id="sidebar" class="w-64 bg-gray-800 text-white hidden md:block">
            <div class="container mt-4">
                <div class="row">
                    
                    <!-- Right Side: Dashboard Title -->
                    <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <div class="p-4 text-center font-bold text-xl">
                        My Dashboard
                    </div>
                    </div>

                    <!-- Left Side: Fullname, Login Date/Time -->
                    <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="mt-2 text-center">
                        <p class="font-bold text-lg">Juan Dela Cruz</p> 
                        <p class="text-sm text-muted">Login: 2024-10-19 10:00 AM</p> 
                    </div>
                    </div>

                </div>
                </div>


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

        <!-- Profile Dropdown Start -->
        <div class="flex-1 flex flex-col">
            
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <!-- Sidebar Toggle Button for Mobile -->
                <div class="text-xl font-semibold"><button onclick="toggleSidebar()"><img src="../public/assets/default-images/menubar.png" alt="menu bar" class="w-5 h-5 cursor-pointer"></button></div>
                
                <div class="flex space-x-4 items-center">
             <!-- Add User Button -->
                    <a href="#" class="text-white py-2 px-4 rounded" id="openModal">
                    <img src="../public/assets/default-images/add_user.png" alt="add user icon" class="bg-white w-5 h-5 cursor-pointer">
                    </a>

        
            <!--- notification icon -->
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

            <!-- Main Content Area -->
            <main class="flex-1 p-6 overflow-y-auto">
                
      <!--- DASHBOARD CONTAINER START-->      
<div id="dashboardContainer" class="space-y-6">
    <h1 class="text-2xl font-bold">Dashboard</h1>

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

    <!-- Load Pie Chart -->
    <div class="w-full md:w-1/2 mx-auto">
        <canvas id="myPieChart" class="w-full h-48"></canvas>
    </div>

<!-- Progress Bars Section & Assessment Completions Start-->
<div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Course Progress</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <!-- Course Completions -->
        <div class="flex flex-col items-center">
            <div class="circle-progress mb-4" data-percentage="80" aria-label="HTML/CSS Completion">
                <span class="percentage-text">0%</span>
            </div>
            <span class="text-sm">HTML/CSS Completion</span>
        </div>

        <div class="flex flex-col items-center">
            <div class="circle-progress mb-4" data-percentage="60" aria-label="JavaScript Completion">
                <span class="percentage-text">0%</span>
            </div>
            <span class="text-sm">JavaScript Completion</span>
        </div>

        <div class="flex flex-col items-center">
            <div class="circle-progress mb-4" data-percentage="90" aria-label="PHP Completion">
                <span class="percentage-text">0%</span>
            </div>
            <span class="text-sm">PHP Completion</span>
        </div>
    </div>

    <h2 class="text-xl font-semibold mb-4">Assessments</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Assessment Completions -->
        <div class="flex flex-col items-center">
            <div class="circle-progress mb-4" data-percentage="75" aria-label="Midterm Exam Completion">
                <span class="percentage-text">0%</span>
            </div>
            <span class="text-sm">Midterm Exam Completion</span>
        </div>

        <div class="flex flex-col items-center">
            <div class="circle-progress mb-4" data-percentage="50" aria-label="Final Exam Completion">
                <span class="percentage-text">0%</span>
            </div>
            <span class="text-sm">Final Exam Completion</span>
        </div>

        <div class="flex flex-col items-center">
            <div class="circle-progress mb-4" data-percentage="85" aria-label="Quizzes Completion">
                <span class="percentage-text">0%</span>
            </div>
            <span class="text-sm">Quizzes Completion</span>
        </div>
    </div>
</div>  <!-- Progress Bar & Assessment Completions End --> 

</div> <!---- END OF DASHBOARD CONTAINER -->


                <!-- Content Containers -->
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


                    <!-- Add Student Modal (Hidden by default) -->
                    <div id="myModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center">
                    <!-- Modal Content -->
                    <div class="bg-white rounded-lg shadow-lg w-1/3">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-lg font-bold">Add New User</h3>
                        <button id="closeModal" class="text-gray-500 hover:text-gray-700 font-bold text-2xl">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="p-4">
                        <p class="text-sm">Fill in the details to add a new user.</p>
                        <!-- You can add form inputs here -->
                        </div>
                        <!-- Modal Footer -->
                        <div class="flex justify-end p-4 border-t">
                        <button id="closeModalBottom" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Close</button>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-600">Save</button>
                        </div>
                    </div>
                    </div>


            </main> <!--- End of Main Content -->
        </div>    <!-- Profile Dropdown End -->
    </div>     <!--End of Sidebar and Main Content Container -->

</body>
</html>
