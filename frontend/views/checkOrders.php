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
        <link rel="stylesheet" href="../public/assets/css/output.css">
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

                <section class="mt-10 grid grid-cols-3 md:gap-10 w-full h-fit" id="ordersContiner">
                    <?php
                    $statusColors = [
                        'pending' => 'border-yellow-400 bg-yellow-50',
                        'confirmed' => 'border-blue-400 bg-blue-50',
                        'shipped' => 'border-green-400 bg-green-50',
                        'cancelled' => 'border-red-400 bg-red-50'
                    ];

                    $statusLabels = [
                        'pending' => 'Chờ xác nhận',
                        'confirmed' => 'Đang giao hàng',
                        'shipped' => 'Đã nhận được hàng',
                        'cancelled' => 'Đơn hàng bị huỷ'
                    ];
                    ?>

                    <div class="w-full h-fit md:col-span-2 col-span-3">
                        <?php if (count($orders) === 0): ?>
                            <div class="mt-10 p-6 text-center bg-yellow-50 border-l-4 border-yellow-400 rounded-xl shadow-md">
                                <p class="text-yellow-800 text-lg font-medium">Không tìm thấy đơn hàng nào.</p>
                                <p class="text-sm text-gray-600 mt-2">Bạn chưa có đơn hàng nào hoặc dữ liệu không tồn tại.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                $colorClass = $statusColors[$order['status']] ?? 'border-gray-300 bg-gray-50';
                                $label = $statusLabels[$order['status']] ?? ucfirst($order['status']);
                                ?>
                                <div class="mt-10 border-l-4 <?= $colorClass ?> rounded-xl shadow-md p-6 transition-all">
                                    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-2">
                                        <div>
                                            <h2 class="text-xl font-bold text-blue-700">Đơn hàng #<?= $order['id'] ?></h2>
                                            <p class="text-gray-600 text-sm">Ngày đặt: <?= $order['created_at'] ?></p>
                                            <p class="text-sm font-medium">
                                                Trạng thái:
                                                <span class="capitalize text-black px-2 py-1 rounded-md bg-opacity-30 <?= match ($order['status']) {
                                                                                                                            'pending' => 'bg-yellow-300',
                                                                                                                            'confirmed' => 'bg-blue-300',
                                                                                                                            'shipped' => 'bg-green-300',
                                                                                                                            'cancelled' => 'bg-red-300',
                                                                                                                            default => 'bg-gray-300',
                                                                                                                        } ?>">
                                                    <?= $label ?>
                                                </span>
                                            </p>
                                        </div>

                                        <div class="text-sm sm:text-right text-left">
                                            <p><strong>Giao đến:</strong> <?= htmlspecialchars($order['address']) ?></p>
                                            <p><strong>Điện thoại:</strong> <?= htmlspecialchars($order['phone_number']) ?></p>
                                            <?php if (!empty($order['note'])): ?>
                                                <p><strong>Ghi chú:</strong> <?= htmlspecialchars($order['note']) ?></p>
                                            <?php endif; ?>
                                            <p class="text-lg font-semibold text-red-600 mt-1">
                                                Tổng tiền: <?= number_format($order['total_price'], 0, ',', '.') ?> đ
                                            </p>
                                        </div>
                                    </div>

                                    <div class="gap-5">
                                        <?php foreach ($order['items'] as $item): ?>
                                            <div class="mt-5 border rounded-xl bg-white shadow hover:shadow-lg transition p-4 flex flex-col w-full">
                                                <div class="flex justify-start items-start">
                                                    <img
                                                        src="../public/assets/images/products/<?= explode(',', $item['images'])[0] ?>"
                                                        alt="<?= htmlspecialchars($item['name']) ?>"
                                                        class="w-20 h-20 object-cover rounded-md mb-3">
                                                    <div class="flex flex-col justify-start items-start ml-4">
                                                        <h3 class="text-base font-semibold text-gray-800"><?= $item['name'] ?></h3>
                                                        <div class="text-sm text-gray-500 mt-1">
                                                            <p>Kích thước: <?= $item['size'] ?></p>
                                                            <p>Màu: <?= $item['color'] ?></p>
                                                            <p>Chất liệu: <?= $item['material'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-auto pt-3 text-sm">
                                                    <p>Giá lúc mua: <span class="font-semibold text-green-700"><?= number_format($item['price_at_order'], 0, ',', '.') ?> đ</span></p>
                                                    <p>Số lượng: <?= $item['quantity'] ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <?php if ($order['status'] === 'pending'): ?>
                                        <!-- Form hủy đơn hàng -->
                                        <form method="POST" action="index.php?pg=change-status-order" class="mt-5">
                                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                                Hủy đơn hàng
                                            </button>
                                        </form>
                                    <?php elseif ($order['status'] === 'confirmed'): ?>
                                        <!-- Form xác nhận đã nhận hàng -->
                                        <form method="POST" action="index.php?pg=change-status-order" class="mt-5">
                                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                            <input type="hidden" name="status" value="shipped">
                                            <button type="submit" class="py-2 px-4 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                                Đã nhận được hàng
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>

                    <div class="md:px-10 md:mt-0 mt-3 px-3 md:mb-0 mb-5 w-full md:col-span-1 col-span-3 h-full">
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