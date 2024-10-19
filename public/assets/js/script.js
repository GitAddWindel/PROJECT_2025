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
// ASIDE CONTENT
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

// PIE CHART FUNCTION
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

