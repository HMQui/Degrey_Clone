<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê - DEGREY VIETNAM</title>
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
                <h1 class="text-3xl font-normal">Thống kê</h1>
            </div>
            <div class="mt-10 px-5 py-5 bg-white shadow-2xl rounded-xl flex flex-col justify-between items-center w-full">
                <div class="mb-2 flex md:flex-row flex-col justify-between items-center w-full">
                    <h2 class="text-xl">Biểu đồ</h2>

                    <div class="flex flex-row md:flex-row gap-4 mb-4">
                        <label><input type="radio" name="chartType" value="topSelling" checked onchange="drawChart()"> Top bán chạy</label>
                        <label><input type="radio" name="chartType" value="slowSelling" onchange="drawChart()"> Top bán chậm</label>
                        <label><input type="radio" name="chartType" value="topCustomer" onchange="drawChart()"> Người mua nhiều nhất</label>
                    </div>
                </div>

                <div id="chart_div" class="w-full h-fit">

                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        const topSellingProduct = <?= json_encode($topSellingProduct) ?>;
        const slowSellingProduct = <?= json_encode($slowSellingProduct) ?>;
        const topCustomer = <?= json_encode($topCustomer) ?>;        
        console.log(topCustomer);
        
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const selected = document.querySelector('input[name="chartType"]:checked').value;
            let data;
            let title;

            if (selected === 'topSelling') {
                title = 'Top sản phẩm bán chạy';
                data = [
                    ['Sản phẩm', 'Số lượng']
                ];
                topSellingProduct.forEach(p => data.push([p.product_id, parseInt(p.total_quantity)]));
            } else if (selected === 'slowSelling') {
                title = 'Top sản phẩm bán chậm';
                data = [
                    ['Sản phẩm', 'Số lượng']
                ];
                slowSellingProduct.forEach(p => data.push([p.product_id, parseInt(p.total_quantity)]));
            } else if (selected === 'topCustomer') {
                title = 'Người dùng mua nhiều nhất';
                data = [
                    ['User ID', 'Số lượng']
                ];
                topCustomer.forEach(u => data.push(['User #' + u.user_id, parseInt(u.total_quantity)]));
            }

            const chartData = google.visualization.arrayToDataTable(data);

            const options = {
                title: title,
                legend: {
                    position: 'bottom'
                },
                hAxis: {
                    title: '',
                    minValue: 0
                },
                vAxis: {
                    title: 'Số lượng'
                },
                height: 500
            };

            const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(chartData, options);
        }
    </script>
</body>

</html>