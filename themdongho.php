<!DOCTYPE html>
<html lang="en">
<?php
require './connect.php';
$sql = 'SELECT * from nhanhieu;';
$rs = $conn->query($sql);

if (isset($_POST['madh'])) {
    $madh = $_POST['madh'];
    $gt = $_POST['gioitinh'];
    $dk = $_POST['duongkinh'];
    $mota = $_POST['mota'];
    $nhanhieu = $_POST['nhanhieu'];
    $loaiday = $_POST['loaiday'];

    $filename = $_FILES['hinhanh']['tmp_name'];
    $destination = "./dongho/" . $_FILES['hinhanh']['name'];
    copy($filename, $destination);
    $sql1 = "INSERT INTO `dongho` (`sttdh`, `madongho`, `gioitinh`, `duongkinh`, `loaiday`, `mota`, `hinhanh`, `thuocnhanhieu`) VALUES (NULL, '" . $madh . "', '" . $gt . "', " . $dk . ", '" . $loaiday . "', '" . $mota . "', '" . $destination . "', " . $nhanhieu . ");";
    $conn->query($sql1);
    header("Location: ./themdongho.php");
    $conn->close();
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đồng hồ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require './header.php' ?>
    <div id="content">
        <h2>Thêm đồng hồ</h2>
        <div id=form>
            <form action="./themdongho.php" name="dangky" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <table border="1" id="table">
                    <tbody>
                        <tr>
                            <td>Mã đồng hồ</td>
                            <td><input type="text" name="madh" id="madh" onblur="checkMadh(this.value)" />
                                <p id="err" style="color: red"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>
                                <input type="radio" name="gioitinh" id="nam" value="Nam"> Nam &nbsp;
                                <input type="radio" name="gioitinh" id="nu" value="Nữ"> Nữ&nbsp;
                                <input type="radio" name="gioitinh" id="unisex" value="Unisex">Unisex
                            </td>
                        </tr>
                        <tr>
                            <td>Đường kính mặt</td>
                            <td><input type="number" name="duongkinh" id="dk" min="0" />(mm)</td>
                        </tr>
                        <tr>
                            <td>Loại dây</td>
                            <td>
                                <input type="radio" name="loaiday" id="nam" value="Da"> Da &nbsp;
                                <input type="radio" name="loaiday" id="nu" value="Thép"> Thép &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td><textarea name="mota" id="mota" cols="50" rows="3"></textarea></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td><input type="file" name="hinhanh" id=""></td>
                        </tr>
                        <tr>
                            <td>Nhãn hiệu</td>
                            <td>
                                <select name="nhanhieu" id="">
                                    <?php
                                    while ($row = $rs->fetch_assoc()) {
                                        echo '<option value=' . $row['stt'] . '>' . $row['tennhanhieu'] . '</option>';
                                    }
                                    $conn->close();
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit">Thêm</button>
                                <button type="reset">Làm lại</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script>
        let flag = true;
        const checkMadh = (madh) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if (this.responseText !== '') {
                        flag = false;
                    } else flag = true;
                }
                document.getElementById('err').innerText = this.responseText;
            }
            xmlhttp.open("GET", "process.php?check=" + madh, true);
            xmlhttp.send();
        }

        const validateForm = () => {
            return flag;
        }
    </script>
</body>

</html>