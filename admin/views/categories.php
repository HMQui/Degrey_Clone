<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phân loại - DEGREY VIETNAM</title>
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
                <h1 class="text-3xl font-normal">Phân loại sản phẩm</h1>
                <div class="">
                    <button onclick="toggleDialogAddCategory(true)" class="py-2 px-4 rounded-md text-white bg-gradient-to-br from-[#667eea] to-[#764ba2] cursor-pointer">+ Thêm loại sản phẩm mới</button>
                </div>
            </div>
            <div class="mt-10 px-5 py-5 bg-white shadow-2xl rounded-xl flex flex-col justify-between items-center w-full">
                <div class="mb-2 flex md:flex-row flex-col justify-between items-center w-full">
                    <h2 class="text-xl">Danh sách loại sản phẩm</h2>
                </div>

                <div class="mt-5 w-full overflow-x-auto">
                    <table class="w-full table-auto border border-gray-300 mt-4 text-sm">
                        <thead class="bg-gray-100">
                            <tr class="text-left">
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Tên</th>
                                <th class="px-4 py-2 border">Phân loại</th>
                                <th class="px-4 py-2 border">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border"><?= $category['id'] ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($category['name']) ?></td>
                                    <td class="px-4 py-2 border"><?= $category['quantity_of_size'] === '1' ? 'Khác' : 'Quần/Áo' ?></td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500" onclick="toggleDialogEditCategory(true, '<?= $category['id'] ?>')">Sửa</button>
                                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="toggleDialogDeleteCategory(true, '<?= $category['id'] ?>')">Xoá</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Dialog add -->
    <div id="dialogWrapperAddCategory" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogAddCategory(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=add-category" method="POST" enctype="multipart/form-data" id="addCategoryForm" class="space-y-4 mt-4">
                <h2 class="text-xl font-semibold mb-4">Tạo loại sản phẩm mới</h2>

                <!-- Id -->
                <div>
                    <label for="id" class="block text-sm font-medium text-gray-700">Id</label>
                    <input type="text" name="id" id="id" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Quantity of Size -->
                <div>
                    <label for="quantity_of_size" class="block text-sm font-medium text-gray-700">Loại</label>
                    <select name="quantity_of_size" id="quantity_of_size" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="3">Áo/Quần</option>
                        <option value="1">Khác</option>
                    </select>
                </div>
            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogAddCategory(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="addCategoryForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Xác nhận
                </button>
            </div>
        </div>
    </div>

    <!-- Dialog edit -->
    <div id="dialogWrapperEditCategory" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogEditCategory(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=edit-category" method="POST" enctype="multipart/form-data" id="editCategoryForm" class="space-y-4 mt-4">
            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogEditCategory(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="editCategoryForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Thay đổi
                </button>
            </div>
        </div>
    </div>

    <!-- Dialog delete -->
    <div id="dialogWrapperDeleteCategory" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogDeleteCategory(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=delete-category" method="POST" enctype="multipart/form-data" id="deleteCategoryForm" class="space-y-4 mt-4">
            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogDeleteCategory(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="deleteCategoryForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <script>
        const categories = <?= json_encode($categories) ?>;


        function toggleDialogAddCategory(show) {
            document.getElementById("dialogWrapperAddCategory").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperAddCategory").classList.toggle("flex", show);
        }

        function toggleDialogEditCategory(show, ...id) {
            document.getElementById("dialogWrapperEditCategory").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperEditCategory").classList.toggle("flex", show);

            const category = categories.filter(p => p.id == id[0]);            
            renderEditCategory(category[0]);
        }

        function toggleDialogDeleteCategory(show, ...id) {
            document.getElementById("dialogWrapperDeleteCategory").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperDeleteCategory").classList.toggle("flex", show);

            const category = categories.filter(p => p.id == id[0]);
            renderDeleteCategory(category[0]);
        }

        function renderEditCategory(category) {
            const editForm = document.getElementById('editCategoryForm');

            const html = `
                <h2 class="text-xl font-semibold mb-4">Thay đổi thông tin</h2>
                <input name='id' value="${category.id}" class="hidden"/>
                <!-- Id -->
                <div>
                    <label for="id_edit" class="block text-sm font-medium text-gray-700">Id</label>
                    <input type="text" name="id" id="id_edit" required value="${category.id}" disabled
                        class="cursor-not-allowed mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Name -->
                <div>
                    <label for="name_edit" class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" name="name" id="name_edit" required value="${category.name}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Quantity of Size -->
                <div>
                    <label for="quantity_of_size_edit" class="block text-sm font-medium text-gray-700">Loại</label>
                    <select name="quantity_of_size" id="quantity_of_size_quantity_of_size_edit" required disabled
                        class="cursor-not-allowed mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="3" ${category.quantity_of_size === '3' ? 'selected' : ''}>Áo/Quần</option>
                        <option value="1" ${category.quantity_of_size === '1' ? 'selected' : ''}>Khác</option>
                    </select>
                </div>
            `

            editForm.innerHTML = html;
        }

        function renderDeleteCategory(category) {
            const deleteForm = document.getElementById('deleteCategoryForm');

            const html = `
                <input name="id" value=${category.id} class="hidden"/>
                <p>Bạn có muốn xóa: </p>
                <strong class="mb-2 text-center">${category.id} - ${category.name}</strong>
            `

            deleteForm.innerHTML = html;
        }
    </script>
</body>

</html>