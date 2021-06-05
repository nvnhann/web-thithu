<?php
require './connect.php';
if (isset($_GET['check'])) {
    $sql = "SELECT * FROM dongho WHERE madongho = '" . $_GET['check'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows) {
        echo 'Mã đồng hồ đã trùng. Vui lòng nhập lại!';
    } else echo '';

    $conn->close();
}
