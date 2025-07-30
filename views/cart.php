<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn - DEGREY VIETNAM</title>
</head>

<body class="overflow-x-hidden">
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>
        <div class="pt-[90px] pb-20 h-fit flex-1 xl:px-56 md:px-20 px-5 w-full overflow-x-hidden">
            <!-- Routing -->
            <section class="md:mt-6 mt-2 flex justify-start items-center gap-3 w-full">
                <a class="text-[13px]" href="index.php?pg=home">Trang chủ</a>
                <span class="text-[13px] text-[#777777]">/</span>
                <p class="text-[13px] text-[#777777]">Giỏ hàng</p>
            </section>
            <div class="mt-10 grid grid-cols-5 md:gap-10 w-full">
                <div class="w-full h-fit md:col-span-3 col-span-5">
                    <h1 class="mb-3 text-3xl font-bold">Giỏ hàng của bạn</h1>
                    <hr class="w-full border-[1px] border-gray-300">
                    <div id="cartContainer"></div>
                    <form id="customerInfo" class="mt-6 flex flex-col gap-4" action="index.php?pg=create-order" method="POST">
                        <div>
                            <label for="note" class="block mb-1 font-medium">Ghi chú</label>
                            <textarea required name="note" id="note" rows="3" class="w-full p-2 border border-gray-300 rounded-md resize-none" placeholder="Ghi chú cho người bán..."></textarea>
                        </div>
                        <div>
                            <label for="address" class="block mb-1 font-medium">Địa chỉ</label>
                            <input required type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Nhập địa chỉ nhận hàng">
                        </div>
                        <div>
                            <label for="phone" class="block mb-1 font-medium">Số điện thoại</label>
                            <input required type="text" name="phoneNumber" id="phone" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Nhập số điện thoại">
                        </div>
                    </form>
                </div>
                <div class="md:px-10 md:mt-0 mt-3 px-3 md:mb-0 mb-5 w-full h-auto md:col-span-2 col-span-5">
                    <div class="w-full bg-white">
                        <h2 class="font-bold text-lg mb-3 border-b border-dashed pb-2">Thông tin đơn hàng</h2>

                        <div class="flex justify-between items-center text-sm font-semibold mb-3">
                            <span>Tổng tiền:</span>
                            <span class="text-red-600 text-lg font-bold" id="totalPrice">0đ</span>
                        </div>

                        <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1 mb-3">
                            <li>Phí vận chuyển sẽ được tính ở trang thanh toán.</li>
                            <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
                        </ul>

                        <div class="text-sm text-red-700 bg-red-100 border border-red-200 rounded-md p-3 mb-4" id="textAlert">
                            Giỏ hàng của bạn hiện chưa đạt mức tối thiểu để thanh toán.
                        </div>

                        <button class="w-full bg-gray-700 text-white font-bold py-2 rounded-md cursor-not-allowed" id="btnPay" type="submit" form="customerInfo">
                            THANH TOÁN
                        </button>

                        <div class="bg-blue-100 text-sm text-gray-800 rounded-md p-3 mt-4 border border-blue-200">
                            <p class="font-semibold">Chính sách giao hàng</p>
                            <p>Hiện chúng tôi chỉ áp dụng thanh toán với đơn hàng có giá trị tối thiểu <strong>150.000đ</strong> trở lên.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'views/partials/footer.php' ?>
    </main>
    <script>
        const cartItems = <?= json_encode($cartItems) ?>;
        const isLoggined = <?= json_encode(isset($_SESSION['user'])) ?>;
        const totalQuantity = <?= json_encode($totalQuantity) ?>;
        const cartContainer = document.getElementById("cartContainer");
        const totalPrice = document.getElementById("totalPrice");
        const customerInfoForm = document.getElementById("customerInfo");

        updateTotalPrice();
        cartContainer.innerHTML = "";

        if (totalQuantity.quantity === 0 || cartItems.length === 0) {
            cartContainer.innerHTML = `
                <h2 class="mt-5 text-2xl text-gray-700">Giỏ hàng của bạn đang trống</h2>
            `;
        } else {
            cartItems.forEach(item => {
                const quantity = item.quantity;
                const product = item.product;

                const discount = product.discount_percent ? product.discount_percent : 0;
                const unitPrice = product.price - product.price * (discount / 100);
                const totalPriceForItem = unitPrice * quantity;
                const formattedTotalPrice =
                    totalPriceForItem.toLocaleString("vi-VN") + "đ";

                const html = `
                <div class="mt-2 grid grid-cols-6 gap-4 rounded-lg p-4 mb-4 border border-gray-300" data-item-id="${item.id}" data-product-price="${unitPrice}">
                    <div class="col-span-1">
                        <img src="public/assets/images/products/${product.images.split(",")[0]}" />
                    </div>
                        <div class="col-span-4 flex flex-col justify-start items-start">
                        <p class="text-md break-words line-clamp-2">${product.name}</p>
                        <span class="text-sm text-gray-700">${product.size.toUpperCase()}</span>
                        <span class="text-[15px] font-bold text-gray-500">${unitPrice.toLocaleString("vi-VN") + "đ"}</span>
                    </div>
                    <form action="index.php?pg=update-cart-item" method="POST" class="update-cart-form col-span-1 flex flex-col justify-start items-end w-full">
                        <input type="hidden" name="productVariantId" value="${item.product_variant_id}">
                        <input type="hidden" name="quantity" class="quantity-input" value="${quantity}">
    
                        <span class="text-[15px] font-bold text-black">${formattedTotalPrice}</span>
                        <div class="mt-3 flex justify-between items-center w-full">
                            <button type="button" class="btn-decrease md:px-2 px-1 text-sm border border-gray-200">-</button>
                            <span class="item-quantity">${quantity}</span>
                            <button type="button" class="btn-increase md:px-2 px-1 text-sm border border-gray-200">+</button>
                        </div>
                        <button type="submit" name="action" value="remove" class="btn-remove mt-3 px-2 w-full border border-gray-300 text-center">Xóa</button>
                    </form>

                </div>
                `;
                cartContainer.insertAdjacentHTML("beforeend", html);
            });
            handleUpdateCartItem();
        }

        function handleUpdateCartItem() {
            document.querySelectorAll('.update-cart-form').forEach(form => {
                const quantityInput = form.querySelector('.quantity-input');
                const quantityDisplay = form.querySelector('.item-quantity');

                form.querySelector('.btn-increase').addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();

                    let current = parseInt(quantityInput.value);
                    current++;

                    quantityInput.value = current;
                    form.submit();
                });

                form.querySelector('.btn-decrease').addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();

                    let current = parseInt(quantityInput.value);
                    if (current > 1) {
                        current--;
                        quantityInput.value = current;
                        form.submit();
                    }
                });
            });
        }

        function updateTotalPrice() {
            let total = 0;

            cartItems.forEach(item => {
                const quantity = item.quantity;
                const product = item.product;
                const price = product.price;
                const discountPercent = product.discount_percent;

                const finalPrice = price * ((1 - discountPercent / 100)) * quantity;

                total += finalPrice;
            })

            if (totalPrice === 0) {
                document.getElementById('customerInfo').classList.add('hidden');
            } else {
                document.getElementById('customerInfo').classList.remove('hidden');
            }

            if (total >= 150000) {
                textAlert.classList.add('hidden');
                btnPay.classList.remove('cursor-not-allowed');
                btnPay.classList.add('cursor-pointer')
            } else {
                textAlert.classList.remove('hidden');
                btnPay.classList.add('cursor-not-allowed');
                btnPay.classList.remove('cursor-pointer')
            }

            totalPrice.textContent = total.toLocaleString("vi-VN") + "đ";
        }

        customerInfoForm.addEventListener('submit', (e) => {
            if (cartItems.length <= 0 || !isLoggined) {
                if (!isLoggined) {
                    alert('Bạn cần phải đăng nhập.')
                }
                e.preventDefault();
                return;
            }
        })
    </script>

</body>

</html>