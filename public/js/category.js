// Select all calendar items
const calendarItems = document.querySelectorAll('.calendar-item');

// Add click event to each calendar item
calendarItems.forEach(item => {
    item.addEventListener('click', () => {
        const eventDetail = item.getAttribute('data-event');
        alert(eventDetail); // Show event details in an alert
    });
});