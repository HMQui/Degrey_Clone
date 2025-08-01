<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng - DEGREY VIETNAM</title>
    <link rel="stylesheet" href="../public/assets/css/output.css">
</head>

<body class="overflow-x-hidden">
    <div class="w-screen h-full grid grid-cols-12">
        <!-- Menu bar -->
        <div class="col-span-12 md:col-span-4 lg:col-span-2 w-full h-full">
            <?php include_once 'views/partials/menu.php' ?>
        </div>

        <!-- Handling -->
        <div class="py-5 md:px-5 px-1 col-span-12 md:col-span-8 lg:col-span-10 w-full h-fit bg-gray-50">
            <div class="px-5 py-5 bg-white shadow-2xl rounded-xl flex md:flex-row md:gap-0 gap-5 flex-col justify-between items-center">
                <h1 class="text-3xl font-normal">Phân loại đơn hàng</h1>
            </div>
            <div class="mt-10 px-5 py-5 bg-white shadow-2xl rounded-xl flex flex-col justify-between items-center w-full">
                <div class="mb-2 flex md:flex-row flex-col justify-between items-center w-full">
                    <h2 class="text-xl">Danh sách loại đơn hàng</h2>

                    <form id="filterForm" method="GET" class="flex md:flex-row flex-col justify-between items-center gap-2">
                        <input
                            type="text"
                            name="user_id"
                            placeholder="Id khách hàng"
                            value="<?= isset($_GET['user_id']) ? htmlspecialchars($_GET['user_id']) : '' ?>"
                            class="border px-3 py-1 rounded">

                        <input
                            type="text"
                            name="order_id"
                            placeholder="Id đơn hàng"
                            value="<?= isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : '' ?>"
                            class="border px-3 py-1 rounded">

                        <select name="status" class="border p-2 rounded w-full">
                            <option value="" <?= !isset($_GET['status']) || $_GET['status'] === '' ? 'selected' : '' ?>>-- Tất cả trạng thái --</option>
                            <option value="pending" <?= isset($_GET['status']) && $_GET['status'] === 'pending' ? 'selected' : '' ?>>Chờ xác nhận</option>
                            <option value="confirmed" <?= isset($_GET['status']) && $_GET['status'] === 'confirmed' ? 'selected' : '' ?>>Đang vận chuyển</option>
                            <option value="shipped" <?= isset($_GET['status']) && $_GET['status'] === 'shipped' ? 'selected' : '' ?>>Đã nhận được hàng</option>
                            <option value="cancelled" <?= isset($_GET['status']) && $_GET['status'] === 'cancelled' ? 'selected' : '' ?>>Hủy</option>
                        </select>


                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded">
                            Lọc
                        </button>
                    </form>
                </div>

                <div class="mt-5 w-full overflow-x-auto">
                    <?php if (empty($orders)): ?>
                        <div class="text-center text-gray-500 py-10">Không có đơn hàng nào.</div>
                    <?php else: ?>
                        <?php foreach ($orders as $order): ?>
                            <div class="border rounded-lg p-4 mb-6 shadow-sm">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="font-semibold text-lg">Đơn hàng #<?= $order['id'] ?></div>
                                        <div class="text-sm text-gray-500"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded text-sm" onclick="toggleDialogEditOrder(true, <?= $order['id'] ?>)">Sửa</button>
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 grid-cols-1 gap-2 text-sm mb-3">
                                    <div><strong>Khách hàng ID:</strong> <?= $order['user_id'] ?></div>
                                    <div><strong>Trạng thái:</strong> <?= ucfirst($order['status']) ?></div>
                                    <div><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['phone_number']) ?></div>
                                    <div><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['address']) ?></div>
                                    <div><strong>Ghi chú:</strong> <?= htmlspecialchars($order['note']) ?></div>
                                    <div><strong>Tổng tiền:</strong> <?= number_format($order['total_price'], 0, ',', '.') ?>đ</div>
                                </div>

                                <table class="w-full table-auto text-xs md:text-sm border border-gray-200 mb-2">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="border px-2 py-1">Ảnh</th>
                                            <th class="border px-2 py-1">Tên sản phẩm</th>
                                            <th class="border px-2 py-1">Size</th>
                                            <th class="border px-2 py-1">Giá</th>
                                            <th class="border px-2 py-1">Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order['items'] as $item): ?>
                                            <tr>
                                                <td class="border px-2 py-1">
                                                    <?php
                                                    $images = explode(',', $item['images']);
                                                    $imagePath = '../public/assets/images/products/' . trim($images[0]);
                                                    ?>
                                                    <img src="<?= $imagePath ?>" alt="product image" class="w-12 h-12 object-cover rounded">
                                                </td>
                                                <td class="border px-2 py-1"><?= htmlspecialchars($item['name']) ?></td>
                                                <td class="border px-2 py-1"><?= htmlspecialchars($item['size']) ?></td>
                                                <td class="border px-2 py-1"><?= number_format($item['price_at_order'], 0, ',', '.') ?>đ</td>
                                                <td class="border px-2 py-1"><?= $item['quantity'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>

                        <!-- Pagination -->
                        <?php
                        $page = $params['page'] ?? 1;
                        $limit = 10;
                        $totalPages = ceil($totalOrders / $limit);
                        $queryStr = http_build_query(array_merge($_GET, ['page' => '']));
                        ?>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <a href="index.php?pg=orders&<?= $queryStr . $i ?>"
                                    class="px-3 py-1 border rounded <?= $i == $page ? 'bg-blue-500 text-white' : 'bg-white text-blue-500' ?> hover:bg-blue-100">
                                    <?= $i ?>
                                </a>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>

    <!-- Dialog edit -->
    <div id="dialogWrapperEditOrder" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogEditOrder(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=edit-order" method="POST" enctype="multipart/form-data" id="editOrderForm" class="space-y-4 mt-4">
            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogEditOrder(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="editOrderForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Thay đổi
                </button>
            </div>
        </div>
    </div>

    <script>
        const orders = <?= json_encode($orders) ?>;
        console.log(orders);
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const params = new URLSearchParams(new FormData(form));
            const queryString = params.toString();

            window.location.href = 'index.php?pg=orders&' + queryString;
        });

        function toggleDialogEditOrder(show, ...id) {
            document.getElementById("dialogWrapperEditOrder").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperEditOrder").classList.toggle("flex", show);

            const order = orders.filter(p => p.id == id[0]);
            renderEditOrder(order[0]);
        }

        function renderEditOrder(order) {
            const editForm = document.getElementById('editOrderForm');

            const html = `
                <h2 class="text-xl font-semibold mb-4">Thay đổi thông tin</h2>
                <input name='id' value="${order.id}" class="hidden"/>
                <!-- Phone Number -->
                <div>
                    <label for="phone_number_edit" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="phone_number" id="phone_number_edit" required value="${order.phone_number}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Address -->
                <div>
                    <label for="address_edit" class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" name="address" id="address_edit" required value="${order.address}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Note -->
                <div>
                    <label for="note_edit" class="block text-sm font-medium text-gray-700">Ghi chú</label>
                    <input type="text" name="note" id="note_edit" required value="${order.note}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status_edit" class="block text-sm font-medium text-gray-700">Loại</label>
                    <select name="status" id="status_edit" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Chờ xác nhận</option>
                        <option value="confirmed" ${order.status === 'confirmed' ? 'selected' : ''}>Đang giao hàng</option>
                        <option value="shipped" ${order.status === 'shipped' ? 'selected' : ''}>Đã nhận được hàng</option>
                        <option value="cancelled" ${order.status === 'cancelled' ? 'selected' : ''}>Hủy</option>
                    </select>
                </div>
            `

            editForm.innerHTML = html;
        }
    </script>
</body>

</html>