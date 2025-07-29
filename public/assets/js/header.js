function openSearchDialog() {
  document.getElementById("searchDialog").classList.remove("hidden");
}

function closeSearchDialog() {
  document.getElementById("searchDialog").classList.add("hidden");
}

document.addEventListener("DOMContentLoaded", function () {
  const input = document.querySelector("input[type='text']");
  const suggestions = document.querySelector(".mt-4");
  const productList = document.querySelector(".product-list");

  input.addEventListener("focus", function () {
    if (input.value.trim() === "") {
      suggestions.classList.remove("hidden");
      productList.innerHTML = "";
    }
  });

  input.addEventListener("blur", function () {
    if (input.value.trim() === "") {
      suggestions.classList.add("hidden");
      productList.innerHTML = "";
    }
  });

  input.addEventListener("input", function () {
    const value = input.value.trim();

    if (value === "") {
      suggestions.classList.remove("hidden");
      productList.innerHTML = "";
    } else {
      suggestions.classList.add("hidden");

      fetch(`index.php?pg=search-products&keyword=${encodeURIComponent(value)}`)
        .then((res) => res.text())
        .then((html) => {
          productList.innerHTML = html;
        })
        .catch(() => {
          productList.innerHTML = `<p class="text-gray-500 mt-4">Không tìm thấy sản phẩm nào phù hợp.</p>`;
        });
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // const cartToggle = document.getElementById("cart-toggle");
  // const cartMenu = document.getElementById("cart-menu");
  // cartToggle.addEventListener("click", function (e) {
  //   e.stopPropagation();
  //   cartMenu.classList.toggle("hidden");
  //   cartMenu.classList.toggle("flex");
  // });
  // document.addEventListener("click", function (e) {
  //   const isClickInside = cartToggle.contains(e.target);
  //   if (!isClickInside) {
  //     cartMenu.classList.add("hidden");
  //     cartMenu.classList.remove("flex");
  //   }
  // });
});

document.addEventListener("DOMContentLoaded", function () {
  // const cartToggle = document.getElementById("cart-toggle-lg");
  // const cartMenu = document.getElementById("cart-menu-lg");
  // cartToggle.addEventListener("click", function (e) {
  //   e.stopPropagation();
  //   cartMenu.classList.toggle("hidden");
  //   cartMenu.classList.toggle("flex");
  // });
  // document.addEventListener("click", function (e) {
  //   const isClickInside = cartToggle.contains(e.target);
  //   if (!isClickInside) {
  //     cartMenu.classList.add("hidden");
  //     cartMenu.classList.remove("flex");
  //   }
  // });
});

// Cart mobile
function openCartDialogMobie() {
  document.getElementById("cartDialogMobile").classList.remove("hidden");
}

function closeCartDialogMobile() {
  document.getElementById("cartDialogMobile").classList.add("hidden");
}

// Navbar mobile
document.addEventListener("DOMContentLoaded", function () {
  const tabs = {
    navbarMobileMale: "male",
    navbarMobileFemale: "female",
    navbarMobileAccessory: "accessory",
    navbarMobileHelp: "help",
  };

  const menuData = {
    male: [
      {
        name: "Tất cả | All",
        link: "index.php?pg=products&gender=male",
      },
      {
        name: "Áo thun | Tshirt",
        link: "index.php?pg=products&category=tshirt&gender=male",
      },
      {
        name: "Áo ba lỗ | Tank tops",
        link: "index.php?pg=products&category=tanktop&gender=male",
      },
      {
        name: "Áo khoác | Jackets",
        link: "index.php?pg=products&category=jacket&gender=male",
      },
      {
        name: "Áo tay dài | Long sleeves",
        link: "index.php?pg=products&category=long-sleeves&gender=male",
      },
      {
        name: "Quần | Pants & Shorts",
        link: "index.php?pg=products&category=pants-shorts&gender=male",
      },
    ],
    female: [
      {
        name: "Tất cả | All",
        link: "index.php?pg=products&gender=female",
      },
      {
        name: "Áo thun | Tshirt",
        link: "index.php?pg=products&category=tshirt&gender=female",
      },
      {
        name: "Áo khoác | Jackets",
        link: "index.php?pg=products&category=jacket&gender=female",
      },
      {
        name: "Áo tay dài | Long sleeves",
        link: "index.php?pg=products&category=long-sleeves&gender=female",
      },
      {
        name: "Áo ba lỗ | Tank tops",
        link: "index.php?pg=products&category=tanktop&gender=female",
      },
      {
        name: "Quần | Pants & Shorts",
        link: "index.php?pg=products&category=pants-shorts&gender=female",
      },
    ],
    accessory: [
      {
        name: "Balo | Backpacks",
        link: "index.php?pg=products&category=backpack",
      },
      {
        name: "Túi xách | Handbags",
        link: "index.php?pg=products&category=handbag",
      },
      { name: "Nón | Caps", link: "index.php?pg=products&category=cap" },
      {
        name: "Giày & Dép | Shoes & Sandals",
        link: "index.php?pg=products&category=shoes-sandal",
      },
    ],
    help: [
      {
        name: "Kiểm tra đơn hàng",
        link: "index.php?pg=check-orders",
      },
      { name: "Cửa hàng", link: "index.php?pg=stores" },
      {
        name: "Giới thiệu",
        link: "index.php?pg=about-us",
      },
    ],
  };

  const optionList = document.querySelector("#mobileMenuOptions");
  const tabElements = Object.keys(tabs).map((id) =>
    document.getElementById(id)
  );

  function setActiveTab(activeId) {
    tabElements.forEach((el) => {
      if (el.id === activeId) {
        el.classList.remove("text-gray-500", "border-gray-300", "font-medium");
        el.classList.add("text-black", "border-black", "font-bold");
      } else {
        el.classList.remove("text-black", "border-black", "font-bold");
        el.classList.add("text-gray-500", "border-gray-300", "font-medium");
      }
    });

    const key = tabs[activeId];
    const items = menuData[key];

    optionList.innerHTML = "";

    items.forEach((item) => {
      const li = document.createElement("li");
      li.className = "py-10";
      li.innerHTML = `<a href="${item.link}" class="text-lg text-black font-semibold">${item.name}</a>`;
      optionList.appendChild(li);
    });
  }

  tabElements.forEach((el) => {
    el.addEventListener("click", () => setActiveTab(el.id));
  });

  setActiveTab("navbarMobileMale");
});

function openNavbarMobile() {
  document.getElementById("navbarMobile").classList.remove("hidden");
}

function closeNavbarMobile() {
  document.getElementById("navbarMobile").classList.add("hidden");
}

fetch("index.php?pg=get-cart")
  .then((response) => {
    if (!response.ok) {
      throw new Error("Lỗi mạng hoặc server không phản hồi.");
    }
    return response.json();
  })
  .then((data) => {
    const cartQuantityElement = document.querySelectorAll(".cartItemQuantity");
    if (cartQuantityElement) {
      cartQuantityElement.forEach((c) => {
        c.textContent = data.quantity;
      });
    }
  })
  .catch((error) => {
    console.error("Lỗi khi lấy giỏ hàng:", error);
  });
