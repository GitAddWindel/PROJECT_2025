document.addEventListener("DOMContentLoaded", function () {
  const openModalBtn = document.getElementById('openModal');
  const closeModalBtns = document.querySelectorAll('#closeModal, #closeModalBottom');
  const modal = document.getElementById('myModal');

  // Open modal
  openModalBtn.addEventListener('click', function(e) {
    e.preventDefault();  // Prevent default link behavior
    modal.classList.remove('hidden');
    modal.classList.add('flex');  // Show the modal by changing from hidden to flex
  });

  // Close modal
  closeModalBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      modal.classList.remove('flex');
      modal.classList.add('hidden');  // Hide the modal by changing from flex to hidden
    });
  });

  // Close modal when clicking outside modal content
  window.addEventListener('click', function(event) {
    if (event.target === modal) {
      modal.classList.remove('flex');
      modal.classList.add('hidden');
    }
  });
});