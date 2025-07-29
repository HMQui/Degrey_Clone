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
            <form class="mt-10 grid grid-cols-5 md:gap-10 w-full">
                <div class="w-full h-fit md:col-span-3 col-span-5">
                    <h1 class="mb-3 text-3xl font-bold">Giỏ hàng của bạn</h1>
                    <hr class="w-full border-[1px] border-gray-300">
                    <div id="cartContainer"></div>
                    <div id="customerInfo" class="mt-6 flex flex-col gap-4">
                        <div>
                            <label for="note" class="block mb-1 font-medium">Ghi chú</label>
                            <textarea required id="note" rows="3" class="w-full p-2 border border-gray-300 rounded-md resize-none" placeholder="Ghi chú cho người bán..."></textarea>
                        </div>
                        <div>
                            <label for="address" class="block mb-1 font-medium">Địa chỉ</label>
                            <input required type="text" id="address" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Nhập địa chỉ nhận hàng">
                        </div>
                        <div>
                            <label for="phone" class="block mb-1 font-medium">Số điện thoại</label>
                            <input required type="text" id="phone" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
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

                        <button class="w-full bg-gray-700 text-white font-bold py-2 rounded-md cursor-not-allowed" id="btnPay" type="submit">
                            THANH TOÁN
                        </button>

                        <div class="bg-blue-100 text-sm text-gray-800 rounded-md p-3 mt-4 border border-blue-200">
                            <p class="font-semibold">Chính sách giao hàng</p>
                            <p>Hiện chúng tôi chỉ áp dụng thanh toán với đơn hàng có giá trị tối thiểu <strong>150.000đ</strong> trở lên.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once 'views/partials/footer.php' ?>
    </main>
    <script src="public/assets/js/cart.js"></script>
</body>

</html>