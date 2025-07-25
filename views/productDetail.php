<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="public/assets/css/output.css">
    <style>
        .size-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            background-color: white;
            color: black;
        }

        .size-btn.selected {
            background-color: black;
            color: white;
            border-color: black;
        }
    </style>

</head>

<body class="overflow-x-hidden">
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>
        <div class="pt-[90px] pb-10 h-fit flex-1 xl:px-56 md:px-20 px-5 w-full overflow-x-hidden">
            <!-- Routing -->
            <section class="md:mt-6 mt-2 hidden md:flex justify-start items-center gap-3 w-full">
                <a class="text-[13px]" href="index.php?pg=home">Trang chủ</a>
                <span class="text-[13px] text-[#777777]">/</span>
                <a class="text-[13px]" href="index.php?pg=products&gender=female">ÁO</a>
                <span class="text-[13px] text-[#777777]">/</span>
                <p class="text-[13px] text-[#777777]">Áo thun tay dài màu CAM TIGER Degrey Jersey long sleeve cổ tim thời trang thể thao - LONGTIGER</p>
            </section>

            <!-- Product -->
            <section class="grid md:grid-cols-2 grid-cols-1 overflow-x-hidden">
                <!-- Images -->
                <div class="grid md:grid-cols-6 grid-cols-1 gap-3 p-5">
                    <!-- Sub images desktop -->
                    <div id="thumbsDesktop" class="hidden md:flex flex-col items-center space-y-3 col-span-1"></div>

                    <!-- Main image + dots -->
                    <div class="relative col-span-6 md:col-span-5 flex flex-col items-center max-h-fit">
                        <img id="mainImage" src="" class="w-[470px] h-[470px] object-cover" alt="Main Image">

                        <!-- Dots -->
                        <div id="dotsContainer" class="flex space-x-2 mt-3 absolute left-1/2 bottom-[20px] transform -translate-x-1/2"></div>

                        <!-- Sale off -->
                        <div class="absolute top-1 left-1 w-12 h-12 bg-red-600 flex flex-col justify-center items-center text-white text-[13px] rounded-b-xl">
                            <span>-11%</span>
                            <span>OFF</span>
                        </div>
                    </div>

                    <!-- Sub images mobile -->
                    <div id="thumbsMobile" class="flex md:hidden flex-row justify-center items-center space-x-3 mt-4 col-span-6"></div>
                </div>

                <!-- Info -->
                <div class="md:py-10 flex flex-col justify-start items-start">
                    <h1 class="text-2xl font-bold">Áo thun tay dài màu CAM TIGER Degrey Jersey long sleeve cổ tim thời trang thể thao - LONGTIGER</h1>
                    <!-- Price -->
                    <div class="ml-3 mt-6 flex justify-start items-center">
                        <!-- Sale off -->
                        <span class="px-4 py-1 bg-orange-600 text-white text-[13px] font-semibold">11%</span>
                        <span class="ml-0 line-through text-lg text-[#878c8f]">450,000đ</span>
                        <span class="text-2xl text-orange-600 ml-4 font-bold">400,000đ</span>
                    </div>
                    <!-- Size options -->
                    <div class="mt-6 flex items-center">
                        <span class="text-sm">SIZE:</span>
                        <div id="sizeOptions" class="ml-30 flex space-x-3">
                            <button class="size-btn selected">S</button>
                            <button class="size-btn">M</button>
                            <button class="size-btn">L</button>
                        </div>
                    </div>
                    <hr class="my-5 w-full border-gray-300">
                    <div class="grid grid-cols-3 w-full gap-3">
                        <a href="https://facebook.com" class="px-3 py-3 col-span-1 bg-[#ebece8a6] flex justify-center items-center gap-1">
                            <i class="fa-brands fa-facebook-messenger"></i>
                            <span>Chat ngay</span>
                        </a>
                        <button class="col-span-2 text-white bg-[#2c2c2c] hover:bg-black cursor-pointer">Thêm vào giỏ</button>
                    </div>
                    <div class="mt-9 flex justify-center items-center gap-3 w-full">
                        <div class="px-3 py-4 bg-[#ebece8a6] text-center text-sm font-bold">
                            <span>MIỄN PHÍ GIAO HÀNG đơn hàng 300.000 VNĐ</span>
                        </div>
                        <div class="px-3 py-4 bg-[#ebece8a6] text-center text-sm font-bold">
                            <span>
                                Đổi hàng chưa qua sử dụng trong vòng 30 ngày
                            </span>
                        </div>
                    </div>
                    <!-- Info -->
                    <div class="mt-3 py-5 w-full flex flex-col justify-start items-start border-b-[1px] border-b-gray-300">
                        <div class="flex justify-between items-center w-full cursor-pointer" onclick="toggleInfo()">
                            <h2 class="text-lg font-bold">Thông tin sản phẩm</h2>
                            <i id="iconInfo" class="fa-solid fa-plus transition-transform duration-300"></i>
                        </div>
                        <div id="textInfo" class="overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out">
                            <div class="w-full pt-2 flex justify-start items-center">
                                <div class="text-sm flex flex-col justify-start items-start gap-1 text-gray-700">
                                    <p>- Chất liệu: vải lưới</p>
                                    <p>- Họa tiết: &nbsp;in chuyển nhiệt trực tiếp lên vải</p>
                                    <p>- Size: S/M/L</p>
                                    <p>- Thương hiệu: Degrey</p>
                                    <p>- Sản xuất: Việt Nam</p>
                                    <p>- Màu sắc và họa tiết được thiết kế riêng bởi team design DEGREY</p>
                                    <p>+ HƯỚNG DẪN BẢO QUẢN SẢN PHẨM DEGREY:</p>
                                    <p>- Giặt ở nhiệt độ bình thường, với đồ có màu tương tự.</p>
                                    <p>- Không dùng hóa chất tẩy lên sản phẩm</p>
                                    <p>- Bạn nên giặt tay và LỘN NGƯỢC ÁO trước khi giặt.</p>
                                    <p>- Không ủi trực tiếp lên hình in.</p>
                                    <p>- Hạn chế sử dụng máy sấy và ủi (nếu có) chỉ nên ủi lên vải hoặc sử dụng bàn ủi hơi nước ở nhiệt độ thích hợp.</p>
                                    <p>+ CHÍNH SÁCH ĐỔI SẢN PHẨM:</p>
                                    <p>1.Điều kiện đổi hàng</p>
                                    <p>- Bạn lưu ý giữ lại hoá đơn để đổi hàng trong vòng 30 ngày.</p>
                                    <p>- Đối với mặt hàng giảm giá, phụ kiện cá nhân (áo lót, khẩu trang, vớ ...) không nhận đổi hàng.</p>
                                    <p>- Tất cả sản phẩm đã mua sẽ không được đổi trả lại bằng tiền mặt.</p>
                                    <p>- Bạn có thể đổi size hoặc sản phẩm khác trong 30 ngày (Lưu ý: sản phẩm chưa qua sử dụng, còn tag nhãn và hóa đơn mua hàng.)</p>
                                    <p>- Bạn vui lòng gửi cho chúng mình clip đóng gói và hình ảnh của đơn hàng đổi trả của bạn, nhân viên tư vấn sẽ xác nhận và tiến hành lên đơn đổi trả cho bạn.</p>
                                    <p>2. Trường hợp khiếu nại</p>
                                    <p>- Bạn phải có video unbox hàng</p>
                                    <p>- Quay video rõ nét 6 mặt của gói hàng</p>
                                    <p>- Quay rõ: Tên người nhận, mã đơn, địa chỉ, số điện thoại.</p>
                                    <p>- Clip không cắt ghép, chỉnh sửa</p>
                                    <p>- Degrey xin không tiếp nhận giải quyết các trường hợp không thỏa các điều kiện trên.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Delivery Service -->
                    <div class="mt-3 py-5 w-full flex flex-col justify-start items-start">
                        <div class="flex justify-between items-center w-full cursor-pointer" onclick="toggleDeliveryService()">
                            <h2 class="text-lg font-bold">Dịch vụ giao hàng</h2>
                            <i id="iconDeliveryService" class="fa-solid fa-plus transition-transform duration-300"></i>
                        </div>
                        <div id="textDeliveryService" class="mt-2 overflow-hidden max-h-0 opacity-0 transition-all duration-500 ease-in-out">
                            <div class="w-full pt-2 flex justify-start items-center">
                                <div class="text-[16px] flex flex-col justify-start items-start gap-3">
                                    <div class="w-full flex justify-start items-center gap-6">
                                        <i class="fa-solid fa-user-shield"></i>
                                        <span>Cam kết 100% chính hãng Degrey</span>
                                    </div>
                                    <div class="w-full flex justify-start items-center gap-6">
                                        <i class="fa-solid fa-truck-fast"></i>
                                        <div class="flex flex-col justify-between items-start">
                                            <span>Giao hàng dự kiến:</span>
                                            <strong>Thứ 2 - Thứ 7 từ 9h00 - 17h00</strong>
                                        </div>
                                    </div>
                                    <div class="w-full flex justify-start items-center gap-6">
                                        <i class="fa-solid fa-headset"></i>
                                        <div class="flex flex-col justify-between items-start">
                                            <span>Hỗ trợ 24/7</span>
                                            <span>Với các kênh chat, email & phone</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="mb-10 w-full border-gray-300">

            <!-- Relative Products -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <h1 class="text-2xl text-center font-bold mb-5">SẢN PHẨM LIÊN QUAN</h1>

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/T-shirtFemale1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/T-shirtFemale1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Áo thun tay dài màu CAM TIGER Degrey Jersey long sleeve cổ tim thời trang thể thao
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">400,000đ</span>
                            <span class="line-through text-gray-400">450,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/T-shirtFemale1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/T-shirtFemale1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Áo thun tay dài màu CAM TIGER Degrey Jersey long sleeve cổ tim thời trang thể thao
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">400,000đ</span>
                            <span class="line-through text-gray-400">450,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>
            </section>
        </div>
        <?php include_once 'views/partials/footer.php' ?>
    </main>

    <script src="public/assets/js/productDetail.js"></script>
</body>

</html>