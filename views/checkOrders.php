<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra đơn hàng - DEGREY VIETNAM</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hệ thống cửa hàng - DEGREY VIETNAM</title>
        <link rel="stylesheet" href="public/assets/css/output.css">
    </head>

    <body class="overflow-x-hidden">
        <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
            <?php include_once 'views/partials/header.php' ?>
            <div class="pt-[90px] pb-20 h-fit flex-1 xl:px-56 md:px-20 px-5 w-full overflow-x-hidden">
                <!-- Routing -->
                <section class="md:mt-6 mt-2 flex justify-start items-center gap-3 w-full">
                    <a class="text-[13px]" href="index.php?pg=home">Trang chủ</a>
                    <span class="text-[13px] text-[#777777]">/</span>
                    <p class="text-[13px] text-[#777777]">Kiểm tra đơn hàng</p>
                </section>

                <section class="mt-10 grid grid-cols-3 md:gap-10 w-full">
                    <div class="w-full h-fit md:col-span-2 col-span-3">
                        <h1 class="text-3xl font-bold">Kiểm tra đơn hàng</h1>
                        <div class="mt-10 py-4 px-5 min-w-[445px] w-full max-h-[500px] overflow-y-auto bg-gray-200">
                            <div class="py-4 px-5 m-auto bg-white w-full h-full rounded-md shadow-md">
                                <!-- Header -->
                                <div class="py-4 px-5 bg-gradient-to-b from-sky-400 to-blue-500 rounded-md">
                                    <h2 class="text-center text-white font-bold text-lg">
                                        🔍 Kiểm tra đơn hàng của bạn
                                    </h2>
                                </div>

                                <!-- Form -->
                                <form class="mt-5 space-y-4">
                                    <!-- Phương thức kiểm tra -->
                                    <div class="text-sm text-gray-700">Phương thức kiểm tra</div>
                                    <div class="flex items-center gap-5">
                                        <label class="flex items-center gap-2">
                                            <input type="radio" name="method" checked class="accent-blue-500">
                                            <span class="text-sm text-gray-800">Số điện thoại</span>
                                        </label>
                                        <label class="flex items-center gap-2">
                                            <input type="radio" name="method" class="accent-blue-500">
                                            <span class="text-sm text-gray-800">Email</span>
                                        </label>
                                    </div>

                                    <!-- Input -->
                                    <div>
                                        <label class="block text-sm text-gray-700 mb-1" for="input-info">Số điện thoại:</label>
                                        <input id="input-info" type="text" placeholder="0xx"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    </div>

                                    <!-- Thông báo -->
                                    <p class="text-xs text-gray-600">
                                        Nếu quý khách có bất kỳ thắc mắc nào, xin vui lòng gọi DEGREY qua hotline
                                        <span class="font-semibold text-blue-700">0336311117</span>
                                    </p>

                                    <!-- Button -->
                                    <div class="text-right">
                                        <button type="submit"
                                            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md transition-all">
                                            Xem ngay
                                        </button>
                                    </div>

                                    <!-- Lỗi -->
                                    <div class="text-red-600 text-sm font-medium mt-2">
                                        Không tìm thấy dữ liệu.
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="md:px-10 md:mt-0 mt-3 px-3 md:mb-0 mb-5 w-full h-10 md:col-span-1 col-span-3">
                        <h3 class="pb-5 text-[18px] font-bold border-b-[1px] border-gray-300">Danh mục page</h3>
                        <div class="pb-3 pt-3 border-b-[1px] border-gray-300">
                            <a class="text-[15px]" href="index.php?pg=products">SẢN PHẨM DEGREY</a>
                        </div>
                        <div class="pb-3 pt-3 border-b-[1px] border-gray-300">
                            <a class="text-[15px]" href="index.php?pg=stores">STORE | CỬA HÀNG</a>
                        </div>
                        <div class="pb-3 pt-3 border-b-[1px] border-gray-300">
                            <a class="text-[15px]" href="index.php?pg=about-us">DEGREY | ABOUT US</a>
                        </div>
                        <div class="relative group w-fit overflow-hidden">
                            <img src="public/assets/images/crocodilo.jpg" alt="Croco" class="transition-all duration-500 group-hover:-translate-y-1 group-hover:shadow-xl">

                            <div class="pointer-events-none absolute inset-0 before:absolute before:top-0 before:left-[-75%] before:h-full before:w-1/2 before:skew-x-[-20deg] before:bg-white/30 before:transition-all before:duration-700 group-hover:before:left-[150%]">
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <?php include_once 'views/partials/footer.php' ?>
        </main>
    </body>

    </html>
</body>

</html>