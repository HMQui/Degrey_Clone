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

const params = new URLSearchParams(window.location.search);

for (const [key, value] of params.entries()) {
  if (key === "price_min" || key === "price_max") {
    if (!filters["price"]) filters["price"] = {};

    filters["price"][key] = value;
  } else {
    filters[key] = value;
  }
}

if (filters.price && typeof filters.price === "object") {
  const min = filters.price.price_min;
  const max = filters.price.price_max;

  if (min && max) {
    filters.price = `${min}&&${max}`;
  } else if (min) {
    filters.price = `>=${min}`;
  } else if (max) {
    filters.price = `<=${max}`;
  }
}

function applyFiltersToUI() {
  Object.entries(filters).forEach(([key, value]) => {
    if (["price_min", "price_max"].includes(key)) return;

    const option = document.querySelector(
      `.filter-option[data-key="${key}"][data-value="${value}"]`
    );
    if (option) {
      const square = option.querySelector(".square");
      if (square) {
        square.classList.add("bg-black");
      }
    }
  });
}

function setupFilter(key) {
  const options = document.querySelectorAll(
    `.filter-option[data-key="${key}"]`
  );

  options.forEach((option) => {
    option.addEventListener("click", () => {
      const value = option.getAttribute("data-value");
      const square = option.querySelector(".square");
      const isSelected = filters[key] === value;

      if (isSelected) {
        delete filters[key];
        square.classList.remove("bg-black");
      } else {
        filters[key] = value;

        options.forEach((opt) => {
          const sq = opt.querySelector(".square");
          sq.classList.remove("bg-black");
        });

        square.classList.add("bg-black");
      }
      updateURLWithFilters();
    });
  });
}

function updateURLWithFilters() {
  const url = new URL(window.location.href);
  const params = new URLSearchParams(url.search);

  ["price", "price_min", "price_max", "color", "size", "order"].forEach(
    (key) => {
      params.delete(key);
    }
  );

  for (const key in filters) {
    const value = filters[key];
    if (key === "size") continue;
    if (key === "price") {
      if (typeof value === "string") {
        if (value.includes("&&")) {
          const [min, max] = value.split("&&");
          params.append("price_min", min);
          params.append("price_max", max);
        } else if (value.startsWith("<=")) {
          const max = value.replace("<= ", "").replace("<=", "").trim();
          params.append("price_max", max);
        } else if (value.startsWith(">=")) {
          const min = value.replace(">= ", "").replace(">=", "").trim();
          params.append("price_min", min);
        }
      }
    } else if (Array.isArray(value)) {
      if (value.length > 0) {
        params.set(key, value.join(","));
      }
    } else if (value) {
      params.set(key, value);
    }
  }

  // Reset page về 1 khi filter thay đổi
  params.set("page", "1");

  // Cập nhật URL
  const newUrl = `${url.origin}${url.pathname}?${params.toString()}`;
  window.location.href = newUrl;
}

document.addEventListener("DOMContentLoaded", () => {
  setupFilter("price");
  setupFilter("color");
  setupFilter("size");
  setupFilter("order");
  applyFiltersToUI();
});

document.getElementById("btnLoadMore")?.addEventListener("click", function () {
  const nextPage = this.getAttribute("data-page");
  const currentParams = new URLSearchParams(window.location.search);

  currentParams.set("page", nextPage);

  window.location.href = "?" + currentParams.toString();
});
