<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - DEGREY VIETNAM</title>
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
                <h1 class="text-3xl font-normal">Quản lý người dùng</h1>
                <div class="">
                    <button onclick="toggleDialogAddUser(true)" class="py-2 px-4 rounded-md text-white bg-gradient-to-br from-[#667eea] to-[#764ba2] cursor-pointer">+ Thêm người dùng mới</button>
                </div>
            </div>
            <div class="mt-10 px-5 py-5 bg-white shadow-2xl rounded-xl flex flex-col justify-between items-center w-full">
                <div class="mb-2 flex md:flex-row flex-col justify-between items-center w-full">
                    <h2 class="text-xl">Danh sách người dùng</h2>

                    <form id="filterForm" method="GET" class="flex md:flex-row flex-col justify-between items-center gap-2">
                        <input
                            type="text"
                            name="full_name"
                            placeholder="Tên người dùng"
                            value="<?= isset($_GET['full_name']) ? htmlspecialchars($_GET['full_name']) : '' ?>"
                            class="border px-3 py-1 rounded">

                        <input
                            type="text"
                            name="userId"
                            placeholder="Id người dùng"
                            value="<?= isset($_GET['userId']) ? htmlspecialchars($_GET['userId']) : '' ?>"
                            class="border px-3 py-1 rounded">

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded">
                            Lọc
                        </button>
                    </form>
                </div>

                <div class="mt-5 w-full overflow-x-auto">
                    <table class="w-full table-auto border border-gray-300 mt-4 text-sm">
                        <thead class="bg-gray-100">
                            <tr class="text-left">
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Họ tên</th>
                                <th class="px-4 py-2 border">Vai trò</th>
                                <th class="px-4 py-2 border">Ngày tạo</th>
                                <th class="px-4 py-2 border">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border"><?= $user['id'] ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="px-4 py-2 border"><?= htmlspecialchars($user['full_name']) ?></td>
                                    <td class="px-4 py-2 border"><?= $user['role'] === 'admin' ? 'Admin' : 'Khách hàng' ?></td>
                                    <td class="px-4 py-2 border"><?= $user['created_at'] ?></td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex gap-2">
                                            <button class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500" onclick="toggleDialogEditUser(true, <?= $user['id'] ?>)">Sửa</button>
                                            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600" onclick="toggleDialogDeleteUser(true, <?= $user['id'] ?>)">Xoá</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <?php
                    $page = $params['page'] ?? 1;
                    $totalPages = ceil($totalUsers / 10);
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
    <div id="dialogWrapperAddUser" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogAddUser(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=add-user" method="POST" enctype="multipart/form-data" id="addUserForm" class="space-y-4 mt-4">
                <h2 class="text-xl font-semibold mb-4">Tạo người dùng mới</h2>

                <!-- Full Name -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">Họ tên</label>
                    <input type="text" name="full_name" id="full_name" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Quyền</label>
                    <select name="role" id="role"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="customer" selected>Customer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogAddUser(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="addUserForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Xác nhận
                </button>
            </div>
        </div>
    </div>

    <!-- Dialog edit -->
    <div id="dialogWrapperEditUser" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogEditUser(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=edit-user" method="POST" enctype="multipart/form-data" id="editUserForm" class="space-y-4 mt-4">
            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogEditUser(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="editUserForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Thay đổi
                </button>
            </div>
        </div>
    </div>

    <!-- Dialog delete -->
    <div id="dialogWrapperDeleteUser" class="fixed inset-0 bg-black/50 items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-xl w-[90%] max-w-md p-6 relative">
            <button onclick="toggleDialogDeleteUser(false)" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">
                &times;
            </button>

            <!-- Form -->
            <form action="index.php?pg=delete-user" method="POST" enctype="multipart/form-data" id="deleteUserForm" class="space-y-4 mt-4">
            </form>

            <div class="mt-5 flex justify-end gap-2">
                <button onclick="toggleDialogDeleteUser(false)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Hủy
                </button>
                <button type="submit" form="deleteUserForm" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 cursor-pointer">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    <script>
        const users = <?= json_encode($users) ?>;

        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const params = new URLSearchParams(new FormData(form));
            const queryString = params.toString();

            window.location.href = 'index.php?pg=users&' + queryString;
        });

        function toggleDialogAddUser(show) {
            document.getElementById("dialogWrapperAddUser").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperAddUser").classList.toggle("flex", show);
        }

        function toggleDialogEditUser(show, ...id) {
            document.getElementById("dialogWrapperEditUser").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperEditUser").classList.toggle("flex", show);

            const user = users.filter(p => p.id == id[0]);
            renderEditUser(user[0]);
        }

        function toggleDialogDeleteUser(show, ...id) {
            document.getElementById("dialogWrapperDeleteUser").classList.toggle("hidden", !show);
            document.getElementById("dialogWrapperDeleteUser").classList.toggle("flex", show);

            const user = users.filter(p => p.id == id[0]);
            renderDeleteUser(user[0]);
        }

        function renderEditUser(user) {
            const editForm = document.getElementById('editUserForm');

            const html = `
                <h2 class="text-xl font-semibold mb-4">Thay đổi thông tin</h2>
                <input name='id' value="${user.id}" class="hidden"/>
                <!-- Full Name -->
                <div>
                    <label for="full_name_edit" class="block text-sm font-medium text-gray-700">Họ tên</label>
                    <input type="text" name="full_name" id="full_name_edit" required value="${user.full_name}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email_edit" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email_edit" required value="${user.email}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Password -->
                <div>
                    <label for="password_edit" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
                    <input type="password" name="password" id="password_edit"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <!-- Role -->
                <div>
                    <label for="role_edit" class="block text-sm font-medium text-gray-700">Quyền</label>
                    <select name="role" id="role_edit"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="customer" ${user.role === 'customer' ? 'selected' : ''}>Customer</option>
                        <option value="admin" ${user.role === 'admin' ? 'selected' : ''}>Admin</option>
                    </select>
                </div>
            `

            editForm.innerHTML = html;
        }

        function renderDeleteUser(user) {
            const deleteForm = document.getElementById('deleteUserForm');

            const html = `
                <input name="userId" value=${user.id} class="hidden"/>
                <p>Bạn có muốn xóa người dùng: </p>
                <strong class="mb-2 text-center">${user.full_name} - ${user.email}</strong>
            `

            deleteForm.innerHTML = html;
        }
    </script>
</body>

</html>