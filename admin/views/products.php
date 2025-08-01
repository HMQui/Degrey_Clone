<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm - DEGREY VIETNAM</title>
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
                <h1 class="text-3xl font-normal">Quản lý sản phẩm</h1>
                <div class="">
                    <button onclick="toggleDialogAddProduct(true)" class="py-2 px-4 rounded-md text-white bg-gradient-to-br from-[#667eea] to-[#764ba2] cursor-pointer">+ Thêm sản phẩm</button>
                    <button class="py-2 px-4 rounded-md text-white bg-gradient-to-br from-[#667eea] to-[#764ba2] cursor-pointer">📤 Xuất file Excel</button>
                </div>
            </div>
            <div class="mt-10 px-5 py-5 bg-white shadow-2xl rounded-xl flex flex-col justify-between items-center w-full">
                <div class="mb-2 flex md:flex-row flex-col justify-between items-center w-full">
                    <h2 class="text-xl">Danh sách sản phẩm</h2>

                    <form id="filterForm" method="GET" class="flex md:flex-row flex-col justify-between items-center gap-2">
                        <!-- Gender Filter -->
                        <select name="gender" class="border px-3 py-1 rounded">
                            <option value="">-- Giới tính --</option>
                            <option value="female" <?= isset($_GET['gender']) && $_GET['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
                            <option value="male" <?= isset($_GET['gender']) && $_GET['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="both" <?= isset($_GET['gender']) && $_GET['gender'] === 'both' ? 'selected' : '' ?>>Both</option>
                            <option value="null" <?= isset($_GET['gender']) && $_GET['gender'] === 'null' ? 'selected' : '' ?>>Null</option>
                        </select>

                        <select name="category" class="border px-3 py-1 rounded">
                            <option value="">-- Loại sản phẩm --</option>
                            <?php foreach ($categories as $cate): ?>
                                <option value="<?= $cate['id'] ?>" <?= isset($_GET['category']) && $_GET['category'] == $cate['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cate['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <input
                            type="text"
                            name="name"
                            placeholder="Tên sản phẩm"
                            value="<?= isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ?>"
                            class="border px-3 py-1 rounded">

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded">
                            Lọc
                        </button>
                    </form>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="table-auto w-full text-sm text-left text-gray-700 border overflow-x-auto">
                        <thead class="text-xs uppercase bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2 w-40 truncate">Tên sản phẩm</th>
                                <th class="px-4 py-2">Giá</th>
                                <th class="px-4 py-2">Giảm giá</th>
                                <th class="px-4 py-2">Giới tính</th>
                                <th class="px-4 py-2">Loại</th>
                                <th class="px-4 py-2">Sizes</th>
                                <th class="px-4 py-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2"><?= htmlspecialchars($product['id']) ?></td>

                                    <td class="px-4 py-2 w-40 truncate text-sm font-medium leading-tight" title="<?= htmlspecialchars($product['name']) ?>">
                                        <div class="line-clamp-2"><?= htmlspecialchars($product['name']) ?></div>
                                    </td>

                                    <td class="px-4 py-2"><?= number_format($product['price']) ?>₫</td>
                                    <td class="px-4 py-2"><?= $product['discount_percent'] ?>%</td>

                                    <td class="px-4 py-2 capitalize"><?= htmlspecialchars($product['gender']) ?></td>
                                    <td class="px-4 py-2"><?= htmlspecialchars($product['category_name']) ?></td>
                                    <td class="px-4 py-2">
                                        <?php if (isset($product['variants']) && is_array($product['variants'])): ?>
                                            <?php if (count($product['variants']) === 1): ?>
                                                <?= htmlspecialchars($product['variants'][0]['size']) ?>
                                            <?php else: ?>
                                                <?php
                                                $sizes = array_column($product['variants'], 'size');
                                                echo implode(', ', array_map('htmlspecialchars', $sizes));
                                                ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            Không có
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-2 space-x-2">
                                        <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded" onclick="toggleDialogEditProduct(true, <?= $product['id'] ?>)">Sửa</button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded" onclick="toggleDialogDeleteProduct(true, <?= $product['id'] ?>)">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                    <!-- Pagination -->
                    <?php
                    $page = $params['page'] ?? 1;
                    $totalPages = ceil($totalProducts / 10);
                    ?>
                    <div class="mt-4 flex space-x-2">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a
                                href="index.php?pg=products&page=<?= $i ?>"
                                class="px-3 py-1 border rounded <?= $i == $page ? 'bg-blue-500 text-white' : 'bg-white text-blue-500' ?> hover:bg-blue-100">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Dialog add -->
    <div id="dialogWrapperAddProduct" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogAddProduct(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=add-product" method="POST" enctype="multipart/form-data" id="addProductForm" class="space-y-4 mt-4">
                <h2 class="text-xl font-semibold mb-4">Thêm sản phẩm</h2>

                <!-- Basic Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="name" placeholder="Tên sản phẩm" required class="border p-2 rounded w-full">
                    <input type="number" name="price" placeholder="Giá gốc" required class="border p-2 rounded w-full">
                    <input type="number" name="discount_percent" placeholder="Giảm giá" class="border p-2 rounded w-full">
                    <input type="text" name="material" placeholder="Chất liệu" class="border p-2 rounded w-full">
                    <input type="text" name="pattern" placeholder="Hoa văn" class="border p-2 rounded w-full">
                    <input type="text" name="color" placeholder="Màu sắc" class="border p-2 rounded w-full">
                </div>

                <!-- Images -->
                <div>
                    <label class="block font-medium mb-1">Hình ảnh (2 hình):</label>
                    <input type="file" name="images[]" accept="image/*" multiple required class="border p-2 rounded w-full" />
                </div>

                <!-- Gender -->
                <div>
                    <label class="block font-medium mb-1">Giới tính:</label>
                    <select id="genderInput" name="gender" class="border p-2 rounded w-full">
                        <option value="null">Không xác định</option>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="both">Cả hai</option>
                    </select>
                </div>

                <!-- Category -->
                <div>
                    <label class="block font-medium mb-1">Phân loại sản phẩm:</label>
                    <select name="category_id" id="categorySelect" class="border p-2 rounded w-full" onchange="handleCategoryChange()" required>
                        <option value="">-- Chọn loại sản phẩm --</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" data-quantity="<?= $category['quantity_of_size'] ?>">
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="quantityInputs" class="mb-3 grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                </div>
            </form>

            <div class="flex justify-end gap-2">
                <button onclick="toggleDialogAddProduct(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="addProductForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Xác nhận
                </button>
            </div>
        </div>
    </div>

    <!-- Dialog update -->
    <div id="dialogWrapperEditProduct" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogEditProduct(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=edit-product" method="POST" enctype="multipart/form-data" id="editProductForm" class="space-y-4 mt-4"></form>

            <div class="flex justify-end gap-2">
                <button onclick="toggleDialogEditProduct(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="editProductForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Thay đổi
                </button>
            </div>
        </div>
    </div>

    <!-- Dialog delete -->
    <div id="dialogWrapperDeleteProduct" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogDeleteProduct(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <form action="index.php?pg=delete-product" method="POST" enctype="multipart/form-data" id="deleteProductForm" class="space-y-4 mt-4"></form>

            <div class="flex justify-end gap-2">
                <button onclick="toggleDialogDeleteProduct(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="deleteProductForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Xác nhận xóa
                </button>
            </div>
        </div>
    </div>
    <script>
        const products = <?= json_encode($products) ?>;
        const categories = <?= json_encode($categories) ?>;

        function toggleDialogAddProduct(show) {
            document.getElementById("dialogWrapperAddProduct").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperAddProduct").classList.toggle("flex", show);
        }

        function toggleDialogEditProduct(show, ...id) {
            document.getElementById("dialogWrapperEditProduct").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperEditProduct").classList.toggle("flex", show);

            const product = products.filter(p => p.id == id[0]);
            renderEditProduct(product[0]);
        }

        function toggleDialogDeleteProduct(show, ...id) {
            document.getElementById("dialogWrapperDeleteProduct").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperDeleteProduct").classList.toggle("flex", show);

            const product = products.filter(p => p.id == id[0]);
            renderDeleteProduct(product[0]);
        }

        function handleCategoryChange() {
            const select = document.getElementById('categorySelect');
            const quantity = select.options[select.selectedIndex].getAttribute('data-quantity');
            const container = document.getElementById('quantityInputs');
            container.innerHTML = '';

            if (quantity === '3') {
                container.innerHTML = `
                <input type="number" name="quantity_of_size_s" placeholder="Size S" class="border p-2 rounded w-full" required>
                <input type="number" name="quantity_of_size_m" placeholder="Size M" class="border p-2 rounded w-full" required>
                <input type="number" name="quantity_of_size_l" placeholder="Size L" class="border p-2 rounded w-full" required>
            `;
            } else if (quantity === '1') {
                document.getElementById('genderInput').value = 'null';
                container.innerHTML = `
                <input type="text" name="freesize_name" placeholder="50x50x60cm" class="border p-2 rounded w-full" required>
                <input type="number" name="freesize_quantity" placeholder="Số lượng" class="border p-2 rounded w-full" required>
            `;
            }
        }

        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const params = new URLSearchParams(new FormData(form));
            const queryString = params.toString();

            window.location.href = 'index.php?pg=products&' + queryString;
        });

        function renderEditProduct(product) {
            const editForm = document.getElementById('editProductForm');
            const variants = product.variants;

            let htmlVariants = '';
            let quantity = variants.length;
            if (quantity === 3) {
                htmlVariants += `
                    <div class="flex flex-col">
                        <label for="quantity_of_size_s" class="mb-1 font-medium text-sm">Số lượng size S</label>
                        <input type="number" id="quantity_of_size_s" name="quantity_of_size_s" placeholder="Size S"
                            class="border p-2 rounded w-full" value="${variants.filter(v => v.size === 's')[0].quantity}" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="quantity_of_size_m" class="mb-1 font-medium text-sm">Số lượng size M</label>
                        <input type="number" id="quantity_of_size_m" name="quantity_of_size_m" placeholder="Size M"
                            class="border p-2 rounded w-full" value="${variants.filter(v => v.size === 'm')[0].quantity}" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="quantity_of_size_l" class="mb-1 font-medium text-sm">Số lượng size L</label>
                        <input type="number" id="quantity_of_size_l" name="quantity_of_size_l" placeholder="Size L"
                            class="border p-2 rounded w-full" value="${variants.filter(v => v.size === 'l')[0].quantity}" required>
                    </div>
                `;
            } else if (quantity === 1) {
                document.getElementById('genderInput').value = 'null';
                htmlVariants += `
                    <div class="flex flex-col md:col-span-2">
                        <label for="freesize_name" class="mb-1 font-medium text-sm">Tên size</label>
                        <input type="text" id="freesize_name" name="freesize_name" placeholder="50x50x60cm"
                            class="border p-2 rounded w-full" value="${variants[0].size}" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="freesize_quantity" class="mb-1 font-medium text-sm">Số lượng</label>
                        <input type="number" id="freesize_quantity" name="freesize_quantity" placeholder="Số lượng"
                            class="border p-2 rounded w-full" value="${variants[0].quantity}" required>
                    </div>
                `;
            }

            const html = `
                <h2 class="text-xl font-semibold mb-4">Chỉnh sửa sản phẩm</h2>

                <input name="productId" value="${product.id}" class="hidden"/>

                <!-- Basic Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="name" placeholder="Tên sản phẩm" required class="border p-2 rounded w-full" value="${product.name}">
                    <input type="number" name="price" placeholder="Giá gốc" required class="border p-2 rounded w-full" value="${product.price}">
                    <input type="number" name="discount_percent" placeholder="Giảm giá" class="border p-2 rounded w-full" value="${product.discount_percent}">
                    <input type="text" name="material" placeholder="Chất liệu" class="border p-2 rounded w-full" value="${product.material}">
                    <input type="text" name="pattern" placeholder="Hoa văn" class="border p-2 rounded w-full" value="${product.pattern}">
                    <input type="text" name="color" placeholder="Màu sắc" class="border p-2 rounded w-full" value="${product.color}">
                </div>

                <!-- Images -->
                <div>
                    <div class="flex justify-start items-center w-full">
                        <img class="w-30 h-30" src="../public/assets/images/products/${product.images.split(',')[0]}"/>
                        <img class="w-30 h-30" src="../public/assets/images/products/${product.images.split(',')[1]}"/>
                    </div>
                </div>

                <!-- Gender -->
                <div>
                    <label class="block font-medium mb-1">Giới tính:</label>
                    <select name="gender" class="border p-2 rounded w-full">
                        <option value="null" ${product.gender === 'null' ? 'selected' : ''}>Không xác định</option>
                        <option value="male" ${product.gender === 'male' ? 'selected' : ''}>Nam</option>
                        <option value="female" ${product.gender === 'female' ? 'selected' : ''}>Nữ</option>
                        <option value="both" ${product.gender === 'both' ? 'selected' : ''}>Both</option>
                    </select>
                </div>

                <div id="quantityInputs" class="mb-3 grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                        ${htmlVariants}
                </div>
            `

            editForm.innerHTML = html;

            const originalFormData = new FormData(editProductForm);
            window.originalFormDataObj = {};
            originalFormData.forEach((value, key) => {
                window.originalFormDataObj[key] = value;
            });
        }

        function renderDeleteProduct(product) {
            const deleteForm = document.getElementById('deleteProductForm');

            html = `
                <input name="productId" value=${product.id} class="hidden"/>
                <p>Bạn có muốn xóa sản phẩm: </p>
                <strong class="mb-2 text-center">${product.name}</strong>
            `

            deleteForm.innerHTML = html;
        }

        document.getElementById("editProductForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const currentFormData = new FormData(this);
            const changedData = new FormData();

            currentFormData.forEach((value, key) => {
                if (key === 'images[]') return;

                const originalValue = window.originalFormDataObj[key];
                if (value !== originalValue) {
                    changedData.append(key, value);
                }
            });

            const imageInput = document.querySelector('input[name="images[]"]');
            if (imageInput && imageInput.files.length > 0) {
                for (const file of imageInput.files) {
                    changedData.append('images[]', file);
                }
            }

            changedData.append('productId', window.originalFormDataObj['productId']);

            if ([...changedData.keys()].length === 1) {
                alert("Không có thay đổi nào!");
                toggleDialogEditProduct(false);
                return;
            }

            const tempForm = document.createElement("form");
            tempForm.action = "index.php?pg=edit-product";
            tempForm.method = "POST";
            tempForm.enctype = "multipart/form-data";
            tempForm.style.display = "none";

            for (const [key, value] of changedData.entries()) {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = key;
                input.value = value;
                tempForm.appendChild(input);
            }

            document.body.appendChild(tempForm);
            tempForm.submit();
        });
    </script>
</body>

</html>