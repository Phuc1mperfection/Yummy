<?php
require_once("../components/connection.php");
$result = $conn->query("SELECT COUNT(*) AS total1 FROM thanhvien");
$row = $result->fetch_assoc();
$totalUsers = $row['total1'];

$result = $conn->query("SELECT COUNT(*) AS total2 FROM gopy");
$row = $result->fetch_assoc();
$totalBlogs = $row['total2'];

$result = $conn->query("SELECT COUNT(*) AS total3 FROM blog");
$row = $result->fetch_assoc();
$totalComments = $row['total3'];

if (!isset($_SESSION['tendangnhap'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="dashboard">
        <div class="stat">
            <h2>Số thành viên </h2>
            <p><?php echo $totalUsers; ?></p>
        </div>
        <div class="stat">
            <h2>Tổng số blog</h2>
            <p><?php echo $totalBlogs; ?></p>
        </div>
        <div class="stat">
            <h2>Tổng số góp ý</h2>
            <p><?php echo $totalComments; ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart">
        <script>
            <?php
            $result1 = $conn->query("SELECT TenMonAn, Gia FROM MonAn ");
            $labels = [];
            $data = [];
            while ($row = $result1->fetch_assoc()) {
                $labels[] = $row['TenMonAn'];
                $data[] = $row['Gia'];
            }

            ?>

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Giá món ăn',
                        color: '#ffffff',

                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: '#8A3324',
                        borderColor: '#CD7F32',

                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Biểu đồ giá món ăn',
                            fontSize: 420,
                            fontColor: '#ffffff',

                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#ffffff'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#ffffff'
                            }
                        }
                    },
                    legend: {
                        labels: {
                            fontColor: '#ffffff'
                        }
                    }
                }
            });
        </script>
    </canvas>
</body>

</html>