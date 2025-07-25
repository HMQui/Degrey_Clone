<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - DEGREY VIETNAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>

        <!-- Wrapper with background image -->
        <div class="pt-[90px] pb-20 flex-1 w-full flex justify-center items-center bg-cover bg-center" style="background-image: url('public/assets/images/About1.png');">
            <!-- White Sign Up Box -->
            <div class="mt-7 bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
                <h1 class="text-3xl font-bold text-center mb-6">Đăng ký DEGREY</h1>

                <form action="index.php?pg=sign_up_submit" method="POST" class="space-y-6 w-full">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            required
                            placeholder="Nguyễn Văn A"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            required
                            placeholder="you@example.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Nhập lại mật khẩu</label>
                        <input
                            type="password"
                            name="confirm_password"
                            id="confirm_password"
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition-colors">
                            Đăng ký
                        </button>
                    </div>

                    <p class="text-sm text-center text-gray-600">
                        Đã có tài khoản?
                        <a href="index.php?pg=sign-in" class="text-black hover:underline">Đăng nhập</a>
                    </p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>