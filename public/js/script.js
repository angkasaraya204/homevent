// Select all calendar items
const calendarItems = document.querySelectorAll('.calendar-item');
const modal = document.getElementById('modal');
const eventDetails = document.getElementById('event-details');
const closeModal = document.querySelector('.close-btn');

// Add click event to each calendar item
calendarItems.forEach(item => {
    item.addEventListener('click', () => {
        const eventDetail = item.getAttribute('data-event');
        eventDetails.textContent = eventDetail;
        modal.classList.remove('hidden'); // Show modal
    });
});

// Close modal on clicking the close button
closeModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// Close modal on clicking outside the modal content
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.add('hidden');
    }
});
