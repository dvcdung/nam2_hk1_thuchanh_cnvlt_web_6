<?php

use Illuminate\Validation\Rules\Exists;

    require_once('../resources/views/common/header.blade.php');

    if(!empty($_POST['str'])) {
        $str = filter_input(INPUT_POST, 'str');
        $data = array();
        $data[] = explode(" ", $str);
        $data[] = implode(" ", $data[0]);
        $data[] = array('sokytu' => strlen($str), 'sotu' => str_word_count($str));
        $data[] = array('vitri' => strpos("tin", $str), 'chuoimoi' => str_replace("tin tin", "tin", $str));
        $data[] = strtoupper($str);
        $data[] = ucfirst($str);
        $data[] = md5($str);

        echo "<br/><span style='color:red'>-----------------1. Tách chuỗi đã cho thành một mảng các phần tử --
        ------------------------</span><br/>";
        echo "<span style='color:blue'>Tách chuỗi: \"$str\"</span>";
        echo "<pre>";
        var_dump($data[0]);
        echo "</pre>";

        echo "<span style='color:red'>-----------------Chuyển đổi mảng thành chuỗi --------------------------
        </span><br/>";
        echo var_dump($data[1]);
        echo "<br/><span style='color:red'>-----------------2. Đếm số ký tự và từ trong chuỗi----------------------
        ----</span><br/>";
        echo "Số ký từ trong chuỗi : " . $data[2]['sokytu'] . "<br/>";
        echo "Sô từ trong chuỗi : " . $data[2]['sotu'];
        echo "<br/><span style='color:red'>-----------------3. Tìm kiếm chuỗi “tin” trong chuỗi đã cho. Nếu
        tìm thấy thì thay thế thành chuỗi “tin tin” còn không thì thông báo không tìm thấy chuỗi-----------------
        ---------</span><br/>";
        if($data[3]['vitri'])
        {
        echo "Tìm thấy và thay thế thành công !";
        echo "<br/> Chuỗi sau khi thay thế :" . $data[3]['chuoimoi'];
        }
        else
        echo "Không tìm thấy !";

        echo "<br/><span style='color:red'>-----------------4. Chuyển đổi sang chữ hoa--------------------------
        </span><br/>";
        echo "Chuỗi hoa: " . $data[4];
        echo "<br/><span style='color:red'>-----------------5. Chuyển đổi sang dạng tiêu đề------------------------
        --</span><br/>";
        echo "Chuỗi tiêu đề: " . $data[5];
        echo "<br/><span style='color:red'>-----------------6. Mã hóa chuỗi thành 32 ký tự-------------------------
        -</span><br/>";
        echo "Chuỗi tiêu đề: " . $data[6];
    }
?>


<h1>Xử lý chuỗi</h1>
<form action="{{ route('thuchanh3-xulychuoi'); }}" method="post">
    @csrf
    <input type="text" name="str">
    <input type="hidden" name="dathuchien">
    <input type="submit" value="Thực hiện">
</form>



<?php
    require_once('../resources/views/common/footer.php');
?>