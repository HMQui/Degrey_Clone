function handleChangeIconOnMouseOver(el) {
  const icon = el.querySelector("i");
  icon.classList.remove("fa-sort-down");
  icon.classList.add("fa-sort-up");
}

function handleChangeIconOnMouseOut(el) {
  const icon = el.querySelector("i");
  icon.classList.remove("fa-sort-up");
  icon.classList.add("fa-sort-down");
}

function toggleMenuFilter(titleEl, option) {
  const icon = titleEl.querySelector(".toggle-icon");
  const menu = document.getElementById(`filter-${option}-mobile`);

  const isOpen = !menu.classList.contains("hidden");

  if (option === "menu") {
    const other = document.getElementById("filter-order-mobile");
    other.classList.add("hidden");
    document.getElementById("icon-order-mobile").classList.add("fa-plus");
    document.getElementById("icon-order-mobile").classList.add("fa-minus");
  } else {
    document.getElementById("filter-menu-mobile").classList.add("hidden");
    document.getElementById("icon-menu-mobile").classList.add("fa-plus");
    document.getElementById("icon-menu-mobile").classList.add("fa-minus");
  }

  if (isOpen) {
    icon.classList.remove("fa-minus");
    icon.classList.add("fa-plus");
    menu.classList.add("hidden");
  } else {
    icon.classList.remove("fa-plus");
    icon.classList.add("fa-minus");
    menu.classList.remove("hidden");
  }
}

function toggleOptionFilter(titleEl, option) {
  const icon = titleEl.querySelector(".toggle-icon");
  const menu = document.getElementById(`filter-menu-mobile-${option}`);

  const isOpen = !menu.classList.contains("hidden");

  if (isOpen) {
    icon.classList.remove("fa-minus");
    icon.classList.add("fa-plus");
    menu.classList.add("hidden");
    menu.classList.remove("flex");
  } else {
    icon.classList.remove("fa-plus");
    icon.classList.add("fa-minus");
    menu.classList.remove("hidden");
    menu.classList.add("flex");
  }
}

const filters = {};

function setupFilter(key) {
  const options = document.querySelectorAll(
    `.filter-option[data-key="${key}"]`
  );

  options.forEach((option) => {
    option.addEventListener("click", () => {
      const value = option.getAttribute("data-value");
      const square = option.querySelector(".square");

      if (key === "color" || key === "size") {
        if (!filters[key]) {
          filters[key] = [];
        }

        const index = filters[key].indexOf(value);

        if (index > -1) {
          filters[key].splice(index, 1);
          square.classList.remove("bg-black");
        } else {
          filters[key].push(value);
          square.classList.add("bg-black");
        }

        if (filters[key].length === 0) {
          delete filters[key];
        }

        console.log("Multi-select", filters);
      } else {
        if (filters[key] === value) {
          delete filters[key];
          options.forEach((opt) => {
            opt.querySelector(".square").classList.remove("bg-black");
          });
        } else {
          filters[key] = value;
          options.forEach((opt) => {
            opt.querySelector(".square").classList.remove("bg-black");
          });
          square.classList.add("bg-black");
        }

        const listProduct = document.getElementById("list-product");
        const btnLoadMore = document.getElementById("load-more");
        listProduct.innerHTML =
          '<h2 class="mr-auto text-lg">Không tìm thấy kết quả. Vui lòng thử lại!</h2>';
        btnLoadMore.classList.add("hidden");
      }
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  setupFilter("price");
  setupFilter("color");
  setupFilter("size");
  setupFilter("order");
});
