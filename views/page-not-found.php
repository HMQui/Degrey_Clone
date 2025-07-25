<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Không tìm thấy trang - DEGREY VIETNAM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">
    <main class="flex flex-col min-h-screen min-w-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php' ?>

        <div class="pt-[90px] pb-20 flex-1 w-full flex justify-center items-center bg-white">
            <div class="text-center">
                <h1 class="text-[100px] font-extrabold text-gray-800 drop-shadow-md">404</h1>
                <h2 class="text-2xl md:text-3xl font-bold text-black mb-4">Không tìm thấy trang</h2>
                <p class="text-gray-700 mb-6 text-sm md:text-base">
                    Trang bạn đang tìm kiếm có thể đã bị xóa, chuyển đi, thay đổi link<br>
                    hoặc chưa bao giờ tồn tại
                </p>
                <a href="index.php?pg=home" class="inline-block px-6 py-2 bg-black text-white font-semibold rounded hover:bg-gray-800 transition">
                    TRỞ VỀ TRANG CHỦ
                </a>
            </div>
        </div>


        <?php include_once 'views/partials/footer.php' ?>
    </main>
</body>

</html>