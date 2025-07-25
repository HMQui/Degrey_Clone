<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nữ - DEGREY VIETNAM</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="public/assets/css/output.css">
    <link rel="stylesheet" href="public/assets/css/productsDiscovery.css">
</head>

<body class="overflow-x-hidden">
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>
        <div class="pt-[90px] pb-20 h-fit flex-1 xl:px-56 md:px-20 px-5 w-full overflow-x-hidden">
            <!-- Routing -->
            <section class="md:mt-6 mt-2 hidden md:flex justify-start items-center gap-3 w-full">
                <a class="text-[13px]" href="index.php?pg=home">Trang chủ</a>
            </section>

            <!-- Slider -->
            <section class="w-fit h-fit">
                <img src="public/assets/images/DiscoverySlider.png" alt="Slider" class="w-full h-full">
            </section>

            <!-- Filter -->
            <section class="flex flex-col justify-start items-start">
                <h1 class="ml-3 mb-8 text-2xl font-bold">Nữ | Women</h1>
                <!-- Filter desktop -->
                <div class="hidden md:flex flex-col justify-between items-start gap-3 w-full">
                    <div class="flex justify-start items-center text-lg font-semibold gap-3">
                        <i class="fa-solid fa-filter"></i>
                        <h2 class="">Bộ Lọc</h2>
                    </div>
                    <div class="flex justify-between items-center md:gap-2 xl:gap-5 w-full">
                        <!-- Price -->
                        <div onmouseover="handleChangeIconOnMouseOver(this)" onmouseout="handleChangeIconOnMouseOut(this)" class="px-4 py-2 relative flex-1 flex justify-between items-center max-w-[230px] min-w-[100px] border-[1px] border-gray-300 cursor-pointer rounded-none group">
                            <span class="text-[13ox] font-bold">Lọc giá</span>
                            <i class="fa-solid fa-sort-down"></i>
                            <!-- Options -->
                            <div class="py-2 cursor-default absolute top-full left-0 w-full border border-gray-300 z-[99] opacity-0 scale-y-95 pointer-events-none group-hover:opacity-100 group-hover:scale-y-100 group-hover:pointer-events-auto origin-top transition-all duration-300 ease-out bg-white shadow-md">
                                <ul class="flex flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="price"
                                        data-value="<=100000">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">Dưới 100,000đ</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="price"
                                        data-value="100000&&250000">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">100,000đ - 250,000đ</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="price"
                                        data-value="250000&&500000">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">250,000đ - 500,000đ</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="price"
                                        data-value="500000&&800000">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">500,000đ - 800,000đ</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="price"
                                        data-value=">=800000">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">Trên 800,000đ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Color -->
                        <div onmouseover="handleChangeIconOnMouseOver(this)" onmouseout="handleChangeIconOnMouseOut(this)" class="px-4 py-2 relative flex-1 flex justify-between items-center max-w-[230px] min-w-[100px] border-[1px] border-gray-300 cursor-pointer rounded-none group">
                            <span class="text-[13ox] font-bold">Lọc màu</span>
                            <i class="fa-solid fa-sort-down"></i>
                            <!-- Options -->
                            <div class="py-2 absolute top-full left-0 w-full border border-gray-300 z-[99] opacity-0 scale-y-95 pointer-events-none group-hover:opacity-100 group-hover:scale-y-100 group-hover:pointer-events-auto origin-top transition-all duration-300 ease-out bg-white shadow-md">
                                <ul class="flex flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="white">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-gray-100"></div>
                                        <span class="text-sm">Trắng</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="gray">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-gray-300"></div>
                                        <span class="text-sm">Xám</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="black">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-black"></div>
                                        <span class="text-sm">Đen</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="green">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-green-500"></div>
                                        <span class="text-sm">Xanh lá</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="blue">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-blue-500"></div>
                                        <span class="text-sm">Xanh biển</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="red">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-red-700"></div>
                                        <span class="text-sm">Đỏ</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="yellow">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-yellow-200"></div>
                                        <span class="text-sm">Vàng</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="color"
                                        data-value="pink">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <div class="rounded-full w-3 h-3 bg-pink-500"></div>
                                        <span class="text-sm">Hồng</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Size -->
                        <div onmouseover="handleChangeIconOnMouseOver(this)" onmouseout="handleChangeIconOnMouseOut(this)" class="px-4 py-2 relative flex-1 flex justify-between items-center max-w-[230px] min-w-[100px] border-[1px] border-gray-300 cursor-pointer rounded-none group">
                            <span class="text-[13ox] font-bold">Kích thước</span>
                            <i class="fa-solid fa-sort-down"></i>
                            <!-- Options -->
                            <div class="py-2 cursor-default absolute top-full left-0 w-full border border-gray-300 z-[99] opacity-0 scale-y-95 pointer-events-none group-hover:opacity-100 group-hover:scale-y-100 group-hover:pointer-events-auto origin-top transition-all duration-300 ease-out bg-white shadow-md">
                                <ul class="flex flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="size"
                                        data-value="s">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">S</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="size"
                                        data-value="l">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">L</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="size"
                                        data-value="m">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">M</span>
                                    </li>
                                    <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="size"
                                        data-value="xs">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">XS</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--  -->
                        <div onmouseover="handleChangeIconOnMouseOver(this)" onmouseout="handleChangeIconOnMouseOut(this)" class="px-4 py-2 relative flex-1 flex justify-between items-center max-w-[230px] min-w-[100px] border-[1px] border-gray-300 cursor-pointer rounded-none group">
                            <div>
                                <i class="fa-solid fa-arrow-down-a-z"></i>
                                <span class="text-[13ox] font-bold">Sắp xếp</span>
                            </div>
                            <i class="fa-solid fa-sort-down"></i>
                            <!-- Options -->
                            <div class="py-2 cursor-default absolute top-full left-0 w-full border border-gray-300 z-[99] opacity-0 scale-y-95 pointer-events-none group-hover:opacity-100 group-hover:scale-y-100 group-hover:pointer-events-auto origin-top transition-all duration-300 ease-out bg-white shadow-md">
                                <ul class="flex flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="order"
                                        data-value="name-asc">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">Tên: A-Z</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="order"
                                        data-value="name-desc">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">Tên: Z-A</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="order"
                                        data-value="price-asc">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">Giá: Tăng dần</span>
                                    </li>
                                    <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                        data-key="order"
                                        data-value="price-desc">
                                        <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                        <span class="text-sm">Giá: Giảm dần</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Filter mobile -->
                <div class="md:hidden flex justify-between items-center gap-0 w-full">
                    <!-- Filter -->
                    <div class="py-1 px-2 relative max-w-1/2 flex-1 border-[1px] border-gray-300 border-r-0 flex justify-between items-center">
                        <div onclick="toggleMenuFilter(this, 'menu')" class="flex justify-between items-center cursor-pointer w-full">
                            <div class="flex justify-start items-center gap-2 font-semibold text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z" />
                                </svg>
                                <h2>BỘ LỌC</h2>
                            </div>
                            <i id="icon-menu-mobile" class="fa-solid fa-plus toggle-icon"></i>
                        </div>
                    </div>
                    <!-- Order -->
                    <div class="py-1 px-2 relative max-w-1/2 flex-1 border-[1px] border-gray-300 flex justify-between items-center">
                        <div onclick="toggleMenuFilter(this, 'order')" class="flex justify-between items-center cursor-pointer w-full">
                            <div class="flex justify-start items-center gap-2 font-semibold text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path d="m80-280 150-400h86l150 400h-82l-34-96H196l-32 96H80Zm140-164h104l-48-150h-6l-50 150Zm328 164v-76l202-252H556v-72h282v76L638-352h202v72H548ZM360-760l120-120 120 120H360ZM480-80 360-200h240L480-80Z" />
                                </svg>
                                <h2>SẮP XẾP</h2>
                            </div>
                            <i id="icon-order-mobile" class="fa-solid fa-plus toggle-icon"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Filter mobile menu -->
            <section class="py-2 w-full">
                <!-- Menu filter -->
                <div id="filter-menu-mobile" class="px-6 w-full hidden">
                    <!-- Price -->
                    <div class="flex flex-col justify-start items-start gap-2 w-full">
                        <div onclick="toggleOptionFilter(this, 'price')" class="flex justify-between items-center w-full">
                            <span class="text-sm font-semibold">Lọc giá</span>
                            <i class="fa-solid fa-plus toggle-icon"></i>
                        </div>
                        <ul id="filter-menu-mobile-price" class="hidden flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                            <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="price"
                                data-value="<=100000">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">Dưới 100,000đ</span>
                            </li>
                            <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="price"
                                data-value="100000&&250000">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">100,000đ - 250,000đ</span>
                            </li>
                            <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="price"
                                data-value="250000&&500000">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">250,000đ - 500,000đ</span>
                            </li>
                            <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="price"
                                data-value="500000&&800000">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">500,000đ - 800,000đ</span>
                            </li>
                            <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="price"
                                data-value=">=800000">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">Trên 800,000đ</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Color -->
                    <div class="mt-3 flex flex-col justify-start items-start w-full">
                        <div onclick="toggleOptionFilter(this, 'color')" class="flex justify-between items-center w-full">
                            <span class="text-sm font-semibold">Màu sắc</span>
                            <i class="fa-solid fa-plus toggle-icon"></i>
                        </div>
                        <ul id="filter-menu-mobile-color" class="hidden flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="white">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-gray-100"></div>
                                <span class="text-sm">Trắng</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="gray">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-gray-300"></div>
                                <span class="text-sm">Xám</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="black">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-black"></div>
                                <span class="text-sm">Đen</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="green">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-green-500"></div>
                                <span class="text-sm">Xanh lá</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="blue">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-blue-500"></div>
                                <span class="text-sm">Xanh biển</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="red">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-red-700"></div>
                                <span class="text-sm">Đỏ</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="yellow">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-yellow-200"></div>
                                <span class="text-sm">Vàng</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="color"
                                data-value="pink">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <div class="rounded-full w-3 h-3 bg-pink-500"></div>
                                <span class="text-sm">Hồng</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Size -->
                    <div class="mt-3 flex flex-col justify-start items-start w-full">
                        <div onclick="toggleOptionFilter(this, 'size')" class="flex justify-between items-center w-full">
                            <span class="text-sm font-semibold">Kích thước</span>
                            <i class="fa-solid fa-plus toggle-icon"></i>
                        </div>
                        <ul id="filter-menu-mobile-size" class="hidden flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="size"
                                data-value="s">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">S</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="size"
                                data-value="l">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">L</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="size"
                                data-value="m">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">M</span>
                            </li>
                            <li class="filter-option py-1 px-2 flex justify-start items-center gap-3 w-full"
                                data-key="size"
                                data-value="xs">
                                <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                                <span class="text-sm">XS</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Menu order -->
                <div id="filter-order-mobile" class="px-6 w-full hidden">
                    <ul class="flex flex-col justify-start items-start gap-1 w-full max-h-[200px] overflow-y-auto">
                        <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                            data-key="order"
                            data-value="name-asc">
                            <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                            <span class="text-sm">Tên: A-Z</span>
                        </li>
                        <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                            data-key="order"
                            data-value="name-desc">
                            <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                            <span class="text-sm">Tên: Z-A</span>
                        </li>
                        <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                            data-key="order"
                            data-value="price-asc">
                            <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                            <span class="text-sm">Giá: Tăng dần</span>
                        </li>
                        <li class="filter-option py-2 px-2 flex justify-start items-center gap-3 w-full"
                            data-key="order"
                            data-value="price-desc">
                            <div class="square w-3 h-3 border-[1px] border-gray-300"></div>
                            <span class="text-sm">Giá: Giảm dần</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- List product -->
            <section id="list-product" class="mt-10 flex flex-col justify-center items-center">

                <?php if (empty($products)): ?>
                    <div class="text-center text-gray-500 py-10">
                        Không tìm thấy sản phẩm nào phù hợp.
                    </div>
                <?php else: ?>

                    <!-- Desktop layout -->
                    <div class="grid-cols-5 gap-2 lg:grid hidden">
                        <?php foreach ($products as $product): ?>
                            <?php
                            $images = explode(',', $product['images']);
                            $image1 = $images[0] ?? 'default.jpg';
                            $image2 = $images[1] ?? $image1;
                            $price = number_format($product['price'], 0, ',', '.') . 'đ';
                            $oldPrice = number_format($product['price'] * 1.1, 0, ',', '.') . 'đ';
                            ?>
                            <a href="index.php?pg=products&id=<?= $product['id'] ?>" class="group space-y-2 hover:shadow-xs">
                                <div class="relative w-full aspect-square overflow-hidden">
                                    <img src="public/assets/images/products/<?= $image1 ?>"
                                        alt=""
                                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                                    <img src="public/assets/images/products/<?= $image2 ?>"
                                        alt=""
                                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                                </div>
                                <div class="px-2 pb-3 space-y-2">
                                    <p class="text-sm leading-snug line-clamp-2">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </p>
                                    <div class="flex justify-start items-center gap-3 text-sm">
                                        <span class="font-semibold text-black"><?= $price ?></span>
                                        <span class="line-through text-gray-400"><?= $oldPrice ?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- Mobile layout -->
                    <div class="grid grid-cols-2 gap-3 lg:hidden">
                        <?php foreach (array_slice($products, 0, 6) as $product): ?>
                            <?php
                            $images = explode(',', $product['images']);
                            $image1 = $images[0] ?? 'default.jpg';
                            $image2 = $images[1] ?? $image1;
                            $price = number_format($product['price'], 0, ',', '.') . 'đ';
                            $oldPrice = number_format($product['price'] * 1.1, 0, ',', '.') . 'đ';
                            ?>
                            <a href="index.php?pg=products&id=<?= $product['id'] ?>" class="group space-y-2 hover:shadow-xs">
                                <div class="relative w-full aspect-square overflow-hidden">
                                    <img src="public/assets/images/products/<?= $image1 ?>"
                                        alt=""
                                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                                    <img src="public/assets/images/products/<?= $image2 ?>"
                                        alt=""
                                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                                </div>
                                <div class="px-2 pb-3 space-y-2">
                                    <p class="text-sm leading-snug line-clamp-2">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </p>
                                    <div class="flex justify-start items-center gap-3 text-sm">
                                        <span class="font-semibold text-black"><?= $price ?></span>
                                        <span class="line-through text-gray-400"><?= $oldPrice ?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>

            </section>

            <!-- Loading more -->
            <?php if ($hasMore): ?>
                <?php
                $nextPage = $page + 1;
                $queryParams = $_GET;
                $queryParams['page'] = $nextPage;
                $queryString = http_build_query($queryParams);
                ?>
                <section id="load-more" class="mt-8 w-full flex justify-center items-center">
                    <a
                        class="py-2 min-w-[306px] border-[1px] border-gray-500 rounded-md text-gray-800 cursor-pointer text-center"
                        href="index.php?<?= htmlspecialchars($queryString) ?>">
                        Xem thêm các sản phẩm tương tự
                    </a>
                </section>
            <?php endif; ?>


        </div>
        <?php include_once 'views/partials/footer.php' ?>
    </main>

    <script src="public/assets/js/productsDiscovery.js"></script>
</body>

</html>