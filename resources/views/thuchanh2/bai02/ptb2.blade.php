<?php
    require_once('../resources/views/common/header.blade.php');

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'gpt') {
            $a = filter_input(INPUT_GET, 'a', FILTER_VALIDATE_FLOAT);
            $b = filter_input(INPUT_GET, 'b', FILTER_VALIDATE_FLOAT);
            $c = filter_input(INPUT_GET, 'c', FILTER_VALIDATE_FLOAT);

            if($a !== false && $b !== false && $c !== false ) {
                if($a == 0){
                    if($b == 0){
                        if($c == 0) {
                            $kq = "Phương trình vô số nghiệm";
                        }else {
                            $kq = "Phương trình vô nghiệm";
                        }
                    }else {
                        $kq = "Phương trình có 1 nghiệm: x = ". -$c/$b;
                    }
                }else {
                    $delta = pow($b, 2) - 4*$a*$c;
                    if($delta < 0) {
                        $kq = "Phương trình vô nghiệm";
                    }else if($delta == 0) {
                        $kq = "Phương trình có nghiệm kép: x = ". -$b/(2*$a);
                    }else {
                        $kq = "Phương trình có hai nghiệm phân biệt: x1 = ". (-$b - sqrt($delta))/(2*$a) ." và x2 = ".(-$b + sqrt($delta))/(2*$a);
                    }
                }
            }
        }
    }

?>

<div id="th2formdangky">
    <h1>Phương trình bậc 2</h1>
    <form action="" method="get">
        Hệ số A:
        <input type="text" style="width:20px" name="a" value="<?php if(isset($a)) echo $a;?>"> <br /> + <br />
        Hệ số B:
        <input type="text" style="width:20px" name="b" value="<?php if(isset($b)) echo $b;?>"> <br /> + <br />
        Hệ số C:
        <input type="text" style="width:20px" name="c" value="<?php if(isset($c)) echo $c;?>"> <br /> = <br />
        Kết quả:<br />
        <input type="hidden" name="action" value="gpt">
        <input type="submit" value="GPTB2">
        <?php !empty($kq)?print($kq):""; ?> <br><br>
    </form>
</div>

<?php   
    require_once('../resources/views/common/footer.php');
?>