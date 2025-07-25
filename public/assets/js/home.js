// Slider images
const slides = document.querySelectorAll("[data-slide]");
const nextBtn = document.getElementById("nextBtn");
const prevBtn = document.getElementById("prevBtn");
let current = 0;
let interval = setInterval(nextSlide, 5000); // Tự động sau 5s

const dots = document.querySelectorAll("[data-dot]");

function updateDots(index) {
  dots.forEach((dot, i) => {
    if (i === index) {
      dot.classList.add("bg-gray-800");
      dot.classList.remove("bg-gray-300");
    } else {
      dot.classList.remove("bg-gray-800");
      dot.classList.add("bg-gray-300");
    }
  });
}

dots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
    current = index;
    showSlide(current);
    resetInterval();
  });
});

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.style.opacity = i === index ? "1" : "0";
  });
  updateDots(index);
}

function nextSlide() {
  current = (current + 1) % slides.length;
  showSlide(current);
}

function prevSlide() {
  current = (current - 1 + slides.length) % slides.length;
  showSlide(current);
}

nextBtn.addEventListener("click", () => {
  nextSlide();
  resetInterval();
});

prevBtn.addEventListener("click", () => {
  prevSlide();
  resetInterval();
});

function resetInterval() {
  clearInterval(interval);
  interval = setInterval(nextSlide, 5000);
}

// Khởi tạo slide đầu
showSlide(current);
