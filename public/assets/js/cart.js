const totalPrice = document.getElementById("totalPrice");
const textAlert = document.getElementById("textAlert");
const btnPay = document.getElementById("btnPay");
var items;


fetch("index.php?pg=get-cart")
  .then((response) => {
    if (!response.ok) {
      throw new Error("Lỗi mạng hoặc server không phản hồi.");
    }
    return response.json();
  })
  .then((data) => {
    const cartContainer = document.getElementById("cartContainer");
    cartContainer.innerHTML = "";

    if (data.quantity === 0 || data.items.length === 0) {
      cartContainer.innerHTML = `
                <h2 class="mt-5 text-2xl text-gray-700">Giỏ hàng của bạn đang trống</h2>
            `;
      return;
    }
    items = data.items;
    data.items.forEach((item) => {
      const product = item.product;

      const discount = product.discount_percent ? product.discount_percent : 0;
      const unitPrice = product.price - product.price * (discount / 100);
      const totalPriceForItem = unitPrice * item.quantity;
      const formattedTotalPrice =
        totalPriceForItem.toLocaleString("vi-VN") + "đ";
        

      const html = `
        <div class="cart-item mt-2 grid grid-cols-6 gap-4 rounded-lg p-4 mb-4 border border-gray-300" data-item-id="${
          item.id
        }" data-product-price="${unitPrice}">
            <div class="col-span-1">
                <img src="public/assets/images/products/${
                  product.images.split(",")[0]
                }" />
            </div>
                <div class="col-span-4 flex flex-col justify-start items-start">
                <p class="text-md break-words line-clamp-2">${product.name}</p>
                <span class="text-sm text-gray-700">${product.size.toUpperCase()}</span>
                <span class="text-[15px] font-bold text-gray-500">${
                  unitPrice.toLocaleString("vi-VN") + "đ"
                }</span>
            </div>
            <div class="col-span-1 flex flex-col justify-start items-end">
                <span class="text-[15px] font-bold text-black">${formattedTotalPrice}</span>
                <div class="mt-3 flex justify-between items-center w-full">
                    <button class="btn-decrease md:px-2 px-1 text-sm border border-gray-200">-</button>
                    <span class="item-quantity">${item.quantity}</span>
                    <button class="btn-increase md:px-2 px-1 text-sm border border-gray-200">+</button>
                </div>
                <button class="btn-remove mt-3 px-2 w-full border border-gray-300 text-center">Xóa</button>
            </div>
        </div>
        `;

      cartContainer.insertAdjacentHTML("beforeend", html);
    });

    initCartItemEvents();
    updateTotalPrice();
  })
  .catch((error) => {
    console.error("Lỗi khi lấy giỏ hàng:", error);
  });


function initCartItemEvents() {
    const cartItemQuantity = document.querySelectorAll(".cartItemQuantity");
    const cartItems = document.querySelectorAll(".cart-item");

    cartItems.forEach((itemEl) => {
    const itemId = itemEl.getAttribute("data-item-id");
    const quantitySpan = itemEl.querySelector(".item-quantity");
    const btnIncrease = itemEl.querySelector(".btn-increase");
    const btnDecrease = itemEl.querySelector(".btn-decrease");
    const btnRemove = itemEl.querySelector(".btn-remove");

    btnIncrease.addEventListener("click", () => {
        let currentQty = parseInt(quantitySpan.textContent);
        const newQty = currentQty + 1;

        quantitySpan.textContent = newQty;
            cartItemQuantity.forEach((c) => {
            c.textContent = parseInt(c.textContent) + 1;
        });

        updateItemPrice(itemEl);
        updateTotalPrice();

        const item = items.find(i => i.id === itemId);
        if (item) item.quantity = toString(newQty);

        const data = new URLSearchParams();
        data.append("id", itemId);
        data.append("quantity", newQty);

        fetch("index.php?pg=update-cart-item", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: data.toString(),
        })
            .catch((err) => console.error("Lỗi cập nhật giỏ hàng:", err));
    });

    btnDecrease.addEventListener("click", () => {
        let currentQty = parseInt(quantitySpan.textContent);
        if (currentQty > 1) {
        const newQty = currentQty - 1;
        quantitySpan.textContent = newQty;

        cartItemQuantity.forEach((c) => {
            c.textContent = parseInt(c.textContent) - 1;
        });

        updateItemPrice(itemEl);
        updateTotalPrice();

        const item = items.find(i => i.id === itemId);        
        if (item) item.quantity = toString(newQty);

        const data = new URLSearchParams();
        data.append("id", itemId);
        data.append("quantity", newQty);

        fetch("index.php?pg=update-cart-item", {
            method: "POST",
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            },
            body: data.toString(),
            }).catch((err) => console.error("Lỗi cập nhật giỏ hàng:", err));
        }
    });

    btnRemove.addEventListener("click", () => {
        const currentQty = parseInt(quantitySpan.textContent);

        itemEl.remove();
        updateTotalPrice();

        cartItemQuantity.forEach((c) => {
        c.textContent = parseInt(c.textContent) - currentQty;
        });

        items = items.filter(i => i.id !== itemId);

        const data = new URLSearchParams();
        data.append("id", itemId);

        fetch("index.php?pg=delete-cart-item", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: data.toString(),
        }).catch((err) => console.error("Lỗi xoá sản phẩm:", err));
    });
    });
}


function updateTotalPrice() {
  let total = 0;

  document.querySelectorAll(".cart-item").forEach((itemEl) => {
    const quantity = parseInt(
      itemEl.querySelector(".item-quantity").textContent
    );
    const priceText = itemEl
      .querySelector(".text-black")
      .textContent.replace("đ", "")
      .replaceAll(".", "");
    const price = parseFloat(priceText);

    total += quantity * price;
  });
  

  if (totalPrice === 0) {
    document.getElementById('customerInfo').classList.add('hidden');
  }
  else {
    document.getElementById('customerInfo').classList.remove('hidden');
  }

  if (total >= 150000) {
    textAlert.classList.add('hidden');    
    btnPay.classList.remove('cursor-not-allowed');
    btnPay.classList.add('cursor-pointer')
  }
  else {
    textAlert.classList.remove('hidden');    
    btnPay.classList.add('cursor-not-allowed');
    btnPay.classList.remove('cursor-pointer')
  }

  totalPrice.textContent = total.toLocaleString("vi-VN") + "đ";
}

function updateItemPrice(itemEl) {
  const quantity = parseInt(itemEl.querySelector(".item-quantity").textContent);
  const unitPrice = parseFloat(itemEl.getAttribute("data-product-price"));

  const totalPrice = quantity * unitPrice;
  const formatted = totalPrice.toLocaleString("vi-VN") + "đ";

  itemEl.querySelector(".text-black").textContent = formatted;
}

btnPay.addEventListener('click', (e) => {
    e.preventDefault();
    
    const note = document.getElementById('note').value.trim();
    const address = document.getElementById('address').value.trim();
    const phone = document.getElementById('phone').value.trim();

    if (!note || !address || !phone) return;

    const data = new URLSearchParams();
    data.append('cartItems', JSON.stringify(items));
    data.append('note', note);
    data.append('address', address);
    data.append('phone_number', phone);    

    fetch('index.php?pg=create-order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: data,
    })
    .then(response => response.json())
    .then(result => {
      alert('Đặt hàng thành công!');
      const cartContainer = document.getElementById("cartContainer");
      const cartItemQuantity = document.querySelectorAll(".cartItemQuantity");
      cartContainer.innerHTML = "";

      cartContainer.innerHTML = `<h2 class="mt-5 text-2xl text-gray-700">Giỏ hàng của bạn đang trống</h2>`;
      updateTotalPrice();
      cartItemQuantity.forEach((c) => c.textContent = 0);
      document.getElementById('note').value = '';
      document.getElementById('address').value = '';
      document.getElementById('phone').value = '';
    })
    .catch(error => {
        console.error('Lỗi khi gửi yêu cầu:', error);
        alert('Đặt hàng thất bại!');
    });
});
