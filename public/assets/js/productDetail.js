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
