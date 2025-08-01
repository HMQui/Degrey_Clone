<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="w-full py-10 h-full md:py-0 md:min-h-screen text-white flex flex-col justify-start items-center bg-gradient-to-br from-[#667eea] to-[#764ba2]">
        <h1 class="mt-10 text-center text-xl">
            Admin panel
        </h1>
        <hr class="my-10 border-white border-[1px] w-full">
        <div class="w-full h-fit flex flex-col justify-start items-start gap-2">
            <a href="index.php?pg=products" class="pl-9 py-3 w-full hover:bg-[rgba(255,255,255,0.2)]"><i>📦</i> Sản phẩm</a>
            <a href="index.php?pg=categories" class="pl-9 py-3 w-full hover:bg-[rgba(255,255,255,0.2)]"><i>📊</i> Phân loại</a>
            <a href="index.php?pg=users" class="pl-9 py-3 w-full hover:bg-[rgba(255,255,255,0.2)]"><i>👤</i> Người dùng</a>
            <a href="index.php?pg=orders" class="pl-9 py-3 w-full hover:bg-[rgba(255,255,255,0.2)]"><i>🛍</i> Đơn hàng</a>
            <a href="index.php?pg=analysis" class="pl-9 py-3 w-full hover:bg-[rgba(255,255,255,0.2)]"><i>📈</i> Thống kê</a>
            <hr class="border-white border-[1px] w-full">
            <a href="index.php?pg=sign-out" class="pl-9 py-3 w-full hover:bg-[rgba(255,255,255,0.2)]"><i>🚪</i> Đăng xuất</a>
        </div>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        const page = params.get('pg');

        const links = document.querySelectorAll("a[href^='index.php?pg=']");

        links.forEach(link => {
            const url = new URL(link.href, window.location.origin);
            const linkPg = url.searchParams.get('pg');

            if (linkPg === page) {
                link.classList.add('bg-[rgba(255,255,255,0.4)]', 'border-l-[4px]', 'border-white');
            }
        });
    </script>
</body>

</html>