const testimonials = [{
    quote: "Pengalaman yang tak terlupakan sih, mulai dari band sampe event beragam banget.",
    image: "img/profpic.png",
    name: "Fadri",
    location: "Jakarta",
},
{
    quote: "Event yang seru banget! Tidak sabar untuk datang lagi tahun depan.",
    image: "img/profpic.png",
    name: "Rina",
    location: "Bandung",
},
{
    quote: "Musiknya luar biasa dan suasananya sangat menyenangkan.",
    image: "img/profpic.png",
    name: "Bayu",
    location: "Surabaya",
},
];

let currentTestimonialIndex = 0;

function updateTestimonial(index) {
// Get elements
const quoteElement = document.getElementById("testimonial-quote");
const imageElement = document.getElementById("testimonial-image");
const nameElement = document.getElementById("testimonial-name");
const locationElement = document.getElementById("testimonial-location");

// Start fade-out by removing the 'active' class
const elements = [quoteElement, imageElement, nameElement, locationElement];
elements.forEach((el) => el.classList.remove("active"));

// Wait for fade-out to complete, then update content and start fade-in
setTimeout(() => {
    // Update content
    quoteElement.innerText = testimonials[index].quote;
    imageElement.src = testimonials[index].image;
    nameElement.innerText = testimonials[index].name;
    locationElement.innerText = testimonials[index].location;

    // Start fade-in by adding the 'active' class
    elements.forEach((el) => el.classList.add("active"));
}, 500); // Match CSS transition duration
}

function showNextTestimonial() {
currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
updateTestimonial(currentTestimonialIndex);
}

function showPreviousTestimonial() {
currentTestimonialIndex =
    (currentTestimonialIndex - 1 + testimonials.length) % testimonials.length;
updateTestimonial(currentTestimonialIndex);
}

// Initialize the first testimonial
updateTestimonial(currentTestimonialIndex);