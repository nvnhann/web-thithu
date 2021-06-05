<?php
require './connect.php';
$rs = $conn->query("SELECT * FROM `dongho` ORDER BY sttdh DESC LIMIT 2");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require './header.php'; ?>
    <div id="content">
        <?php
        echo "<div id='cnt'>";
        while ($row = $rs->fetch_assoc()) {
            echo "
            <div>
                <img src=" . $row['hinhanh'] . " alt='' />
                <div>
                <p>Mã đồng hồ: " . $row['madongho'] . "</p>
                <p>Giới tính: " . $row['gioitinh'] . "</p>
                <p>Đường kính mặt: " . $row['duongkinh'] . "(mm)</p>
                <p>Loại dây: " . $row['loaiday'] . "</p>
                <p>Mô tả: " . $row['mota'] . "</p>
                </div>
             </div>

            ";
        }
        echo "</div>"
        ?>

        <div id="footer">
            <p>Số đề - số máy:</p>
            <p>Bây giờ là: 
            <?php
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                echo date("h:i:sa");?></p>
        </div>
    </div>
</body>

</html>