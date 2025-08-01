<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống cửa hàng - DEGREY VIETNAM</title>
    <link rel="stylesheet" href="../public/assets/css/output.css">
</head>

<body>
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>
        <div class="pt-[90px] pb-20 h-fit flex-1 xl:px-56 md:px-20 px-5 w-full overflow-x-hidden">
            <!-- Routing -->
            <section class="md:mt-6 mt-2 flex justify-start items-center gap-3 w-full">
                <a class="text-[13px]" href="index.php?pg=home">Trang chủ</a>
                <span class="text-[13px] text-[#777777]">/</span>
                <p class="text-[13px] text-[#777777]">Hệ thống cửa hàng</p>
            </section>

            <section class="mt-10 grid grid-cols-3 md:gap-10 w-full">
                <div class="w-fit h-fit md:col-span-2 col-span-3">
                    <h1 class="text-3xl font-bold">Hệ thống cửa hàng</h1>
                    <h1 class="mt-14 ml-5 text-4xl text-center font-bold">
                        <i class="fa-solid fa-location-pin text-lg"></i>
                        69 đường D10, P.Tây Thạnh, Q.Tân Phú, TP. Hồ Chí Minh
                    </h1>
                    <div class="mt-5 grid grid-cols-1 lg:grid-cols-2 gap-1 w-full">
                        <img src="../public/assets/images/Store1-1.jpg" alt="Store 1" class="w-[360px] h-[480px] object-cover mr-auto ml-auto">
                        <img src="../public/assets/images/Store1-2.jpg" alt="Store 2" class="w-[360px] h-[480px] object-cover mr-auto ml-auto">
                    </div>
                    <div class="flex flex-col justify-start items-start w-full">
                        <p class="mt-5 text-[15px] font-bold flex justify-start items-center gap-2">
                            <span>Hotline: </span>
                            <strong class="font-bold">
                                <a href="tel:0336311117">0336311117</a>
                            </strong>
                        </p>
                        <div class="pb-7 pt-5 border-b-[1px] border-gray-300 flex justify-start items-center gap-3 w-full">
                            <img src="../public/assets/Icons/FacebookIcon.png" alt="Fb" class="w-8 h-8 object-cover">
                            <a href="https://www.facebook.com/degrey.saigon" class="text-sm">https://www.facebook.com/degrey.saigon</a>
                        </div>
                        <div class="pb-7 pt-5 border-b-[1px] border-gray-300 flex justify-start items-center gap-3 w-full">
                            <img src="../public/assets/Icons/InsIcon.png" alt="Fb" class="w-8 h-8 object-cover">
                            <a href="https://www.instagram.com/degrey.saigon/" class="text-sm">https://www.instagram.com/degrey.saigon/</a>
                        </div>
                        <div class="pb-7 pt-5 border-b-[1px] border-gray-300 flex justify-start items-center gap-3 w-full">
                            <img src="../public/assets/Icons/TikTokIcon.png" alt="Fb" class="w-8 h-8 object-cover">
                            <a href="https://www.tiktok.com/@degreyvn" class="text-sm">https://www.tiktok.com/@degreyvn</a>
                        </div>
                        <div class="pb-7 pt-5 border-b-[1px] border-gray-300 flex justify-start items-center gap-3 w-full">
                            <img src="../public/assets/Icons/YtbIcon.png" alt="Fb" class="w-8 h-8 object-cover">
                            <a href="https://www.youtube.com/degreyvn" class="text-sm">https://www.youtube.com/degreyvn</a>
                        </div>
                        <div class="pb-7 pt-5 border-b-[1px] border-gray-300 flex justify-start items-center gap-3 w-full">
                            <img src="../public/assets/Icons/ShopeeIcon.png" alt="Fb" class="w-8 h-8 object-cover">
                            <a href="https://shopee.vn/degrey.vn" class="text-sm">https://shopee.vn/degrey.vn</a>
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
                        <img src="../public/assets/images/crocodilo.jpg" alt="Croco" class="transition-all duration-500 group-hover:-translate-y-1 group-hover:shadow-xl">

                        <div class="pointer-events-none absolute inset-0 before:absolute before:top-0 before:left-[-75%] before:h-full before:w-1/2 
              before:skew-x-[-20deg] before:bg-white/30 
              before:transition-all before:duration-700 
              group-hover:before:left-[150%]">
                        </div>
                    </div>

                </div>
            </section>

        </div>
        <?php include_once 'views/partials/footer.php' ?>
    </main>
</body>

</html>