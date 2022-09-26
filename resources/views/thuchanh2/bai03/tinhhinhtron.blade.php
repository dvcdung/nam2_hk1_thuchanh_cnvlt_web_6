<?php
    define("pi", 3.14);

    if(isset($_GET['htron'])) {
        if($_GET['htron'] == 'tinh') {
            $r = filter_input(INPUT_GET, 'r', FILTER_VALIDATE_FLOAT);
            
            $p = 2*pi*$r;
            $s = pi*pow($r, 2);
        }
    }
?>

@extends('thuchanh2/layout_thuchanh2')

@section('main-content')
    
<div id="th2formdangky">
    <h1>Tính toán về hình tròn</h1>
    <div>
        <form action="" method="get">
            Nhập bán kính hình tròn: 
            <input style="border: none" type="text" name="r" placeholder="...nhập bán kính ở đây...">
            <input type="hidden" name="htron" value="tinh"><br>
            <input type="submit" value="Tính toán">
        </form>
    </div><br>
<h3>Kết quả:</h3>
    <div>
        <table>
            <tr>
                <td>Chu vi hình tròn:</td>
                <td><?php echo (isset($p)) ?  $p : '' ?></td>
            </tr>
            <tr>
                <td>Diện tích hình tròn:</td>
                <td><?php echo (isset($s)) ?  $s : '' ?></td>
            </tr>
        </table>
    </div>
</div>

@endsection