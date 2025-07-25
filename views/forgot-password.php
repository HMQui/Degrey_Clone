<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu - DEGREY VIETNAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>

        <div class="pt-[90px] pb-20 flex-1 w-full flex justify-center items-center bg-cover bg-center" style="background-image: url('public/assets/images/About1.png');">
            <!-- White Box -->
            <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
                <h1 class="text-3xl font-bold text-center mb-6">QUÊN MẬT KHẨU</h1>

                <form id="forgotForm" onsubmit="handleForgotPassword(event)" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email đã đăng ký</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            placeholder="you@example.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition-colors">
                        Gửi yêu cầu
                    </button>

                    <p class="text-sm text-center text-gray-600">
                        Đã nhớ mật khẩu?
                        <a href="index.php?pg=sign-in" class="text-black hover:underline">Đăng nhập</a>
                    </p>
                </form>
            </div>
        </div>

    </main>

    <!-- Dialog -->
    <div id="dialog" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 max-w-[90%] w-full md:max-w-md shadow-lg">
            <h3 class="text-lg font-semibold mb-4">Thông báo</h3>
            <p class="mb-4">Chúng tôi sẽ liên hệ bạn qua email đã cung cấp nếu tài khoản tồn tại trong hệ thống.</p>
            <button onclick="closeDialog()" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Đóng</button>
        </div>
    </div>

    <script>
        function handleForgotPassword(event) {
            event.preventDefault(); // Không submit thực sự
            // TODO: Xử lý gửi email ở server tại đây nếu cần

            // Hiện dialog
            document.getElementById("dialog").classList.remove("hidden");
        }

        function closeDialog() {
            document.getElementById("dialog").classList.add("hidden");
        }
    </script>
</body>

</html>