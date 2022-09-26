<?php

$action = filter_input(INPUT_POST,'action');

if(!empty($action) && $action == 'dangky') {
    $hoten = filter_input(INPUT_POST,'hoten');
    $gioitinh = filter_input(INPUT_POST,'gioitinh',FILTER_VALIDATE_INT);
    $diachi = filter_input(INPUT_POST,'diachi');
    $ngaysinh = filter_input(INPUT_POST,'ngaysinh');
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $honnhan = filter_input(INPUT_POST,'honnhan');
    $nghenghiep = filter_input(INPUT_POST,'nghenghiep');
    $sothich = filter_input(INPUT_POST,'sothich',FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
    $ghichu = filter_input(INPUT_POST,'ghichu');
}


require_once('../resources/views/common/header.blade.php');

?>
<h3 style="color:red">THÔNG TIN CÁ NHÂN BẠN ĐÃ ĐĂNG KÝ</h3>
<table width="300">
    <tr>
        <td>Họ và tên:</td>
        <td><?php echo $hoten; ?></td>
    </tr>
    <tr>
        <td>Giới tính</td>
        <td>
            <?php
                switch($gioitinh)
                {
                case 0:
                echo "Nữ";break;
                case 1:
                echo "Nam";break;
                case 2:
                echo "Khác";
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><?php echo $diachi; ?></td>
    </tr>
    <tr>
        <td>Ngày sinh</td>
        <td><?php echo $ngaysinh; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <td>Tình trạng hôn nhân</td>
        <td><?php echo $honnhan; ?></td>
    </tr>
    <tr>
        <td>Nghề nghiệp</td>
        <td><?php echo $nghenghiep; ?></td>
    </tr>
    <tr>
        <td>Sở thích</td>
        <td>
            <?php
                if(!empty($sothich))
                foreach($sothich as $value)
                    echo $value . ", ";
            ?>
        </td>
    </tr>
    <tr>
        <td>Ghi chú</td>
        <td><?php echo $ghichu; ?></td>
    </tr>
</table>
<br><br>
<a href="{{ route('thuchanh2-dangky') }}">Trở về</a>

<?php
    require_once('../resources/views/common/footer.php');
?>