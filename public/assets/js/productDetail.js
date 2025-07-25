const images = [
  "public/assets/images/products_detail/T-shirtFemaleDetail1-1.jpg",
  "public/assets/images/products_detail/T-shirtFemaleDetail1-2.jpg",
  "public/assets/images/products_detail/T-shirtFemaleDetail1-3.jpg",
];

const mainImage = document.getElementById("mainImage");
const thumbsDesktop = document.getElementById("thumbsDesktop");
const thumbsMobile = document.getElementById("thumbsMobile");
const dotsContainer = document.getElementById("dotsContainer");

let currentIndex = 0;
mainImage.src = images[currentIndex];

function renderImages() {
  images.forEach((src, i) => {
    const thumbDesktop = document.createElement("img");
    thumbDesktop.src = src;
    thumbDesktop.className =
      "w-16 h-16 object-cover cursor-pointer border border-gray-300 hover:border-black";
    thumbDesktop.onclick = () => changeImage(i);
    thumbsDesktop.appendChild(thumbDesktop);

    const thumbMobile = document.createElement("img");
    thumbMobile.src = src;
    thumbMobile.className =
      "w-16 h-16 object-cover cursor-pointer border border-gray-300 hover:border-black";
    thumbMobile.onclick = () => changeImage(i);
    thumbsMobile.appendChild(thumbMobile);
  });
}

function renderDots() {
  images.forEach((_, i) => {
    const dot = document.createElement("button");
    dot.id = `dot-${i}`;
    dot.className = `w-2 h-2 rounded-full hover:bg-green-700 cursor-pointer ${
      i === currentIndex ? "bg-gray-400" : "bg-gray-300"
    }`;
    dot.onclick = () => changeImage(i);
    dotsContainer.appendChild(dot);
  });
}

function changeImage(index) {
  currentIndex = index;
  mainImage.src = images[index];
  updateDots();
}

function updateDots() {
  images.forEach((_, i) => {
    const dot = document.getElementById(`dot-${i}`);
    dot.className = `w-2 h-2 rounded-full hover:bg-green-700 cursor-pointer ${
      i === currentIndex ? "bg-gray-400" : "bg-gray-300"
    }`;
  });
}

// Render on load
renderImages();
renderDots();

// Size button
const sizeButtons = document.querySelectorAll(".size-btn");

sizeButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    sizeButtons.forEach((b) => b.classList.remove("selected"));
    btn.classList.add("selected");
  });
});

// Show/Close info product
function toggleInfo() {
  const content = document.getElementById("textInfo");
  const icon = document.getElementById("iconInfo");
  const isOpen = content.classList.contains("max-h-0");

  if (isOpen) {
    content.classList.remove("max-h-0", "opacity-0");
    content.classList.add("max-h-fit", "opacity-100");
    icon.classList.remove("fa-plus");
    icon.classList.add("fa-minus");
  } else {
    content.classList.add("max-h-0", "opacity-0");
    content.classList.remove("max-h-fit", "opacity-100");
    icon.classList.remove("fa-minus");
    icon.classList.add("fa-plus");
  }
}

// Show/Close delivery service
function toggleDeliveryService() {
  const content = document.getElementById("textDeliveryService");
  const icon = document.getElementById("iconDeliveryService");
  const isOpen = content.classList.contains("max-h-0");

  if (isOpen) {
    content.classList.remove("max-h-0", "opacity-0");
    content.classList.add("max-h-fit", "opacity-100");
    icon.classList.remove("fa-plus");
    icon.classList.add("fa-minus");
  } else {
    content.classList.add("max-h-0", "opacity-0");
    content.classList.remove("max-h-fit", "opacity-100");
    icon.classList.remove("fa-minus");
    icon.classList.add("fa-plus");
  }
}
