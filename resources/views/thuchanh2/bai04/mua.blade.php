<?php
    if(isset($_GET['mua'])) {
        if($_GET['mua'] == 'mua') {
            $m = filter_input(INPUT_GET, 'm');
            
            switch($m) {
                case 'x':
                    $m = "Xuân";
                    break;
                case 'h':
                    $m = "Hạ";
                    break;
                
                case 't':
                    $m = "Thu";
                    break;
                        
                case 'd':
                    $m = "Đông";
                    break;
                default:
                    $m = "Vui lòng kiểm tra lại kí tự đã nhập";
            }
        }
    }
?>

@extends('thuchanh2/layout_thuchanh2')
@section('main-content')
        
    <div id="th2formdangky">
        <h1>Mùa</h1>
        <div>
            <form action="" method="get">
                Nhập ký tự đại diện trong các từ [x, h, t, d]: 
                <input style="border: none" type="text" name="m" placeholder="...nhập ở đây...">
                <input type="hidden" name="mua" value="mua"><br>
                <input type="submit" value="Xem">
            </form>
        </div><br>
    <h3>Kết quả:</h3>
        <div>
            <table>
                <tr>
                    <td>Mùa:</td>
                    <td><?php echo isset($m) ? $m : '' ?></td>
                </tr>
            </table>
        </div>
    </div>

@endsection