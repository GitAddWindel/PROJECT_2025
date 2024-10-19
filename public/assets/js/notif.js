document.addEventListener('DOMContentLoaded', function () {
    const notificationButton = document.getElementById('notificationButton');
    const notificationDropdown = document.getElementById('notificationDropdown');
  
    // Check if elements exist before adding event listeners
    if (notificationButton && notificationDropdown) {
      // Toggle dropdown visibility when the button is clicked
      notificationButton.addEventListener('click', function (e) {
        e.preventDefault();
        notificationDropdown.classList.toggle('hidden');
      });
  
      // Hide dropdown when clicking outside
      window.addEventListener('click', function (e) {
        if (!notificationButton.contains(e.target) && !notificationDropdown.contains(e.target)) {
          notificationDropdown.classList.add('hidden');
        }
      });
    } else {
      console.error('Notification button or dropdown is missing.');
    }
  });
  