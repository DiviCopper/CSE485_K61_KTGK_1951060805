<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí thư viện</title>
    <link rel="icon" type="image/x-icon" href="images/Logo-DH-Thuy-Loi.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h5 class="text-center text-primary mt-5">HỆ THỐNG QUẢN LÍ THƯ VIỆN</h5>
        <div>
            <a class="btn btn-primary" href="http://localhost/Project/src/home.php/">Trang chủ</a>
        </div>
        <div class="container">
        <h5 class="text-center text-danger mt-5">Thêm độc giả</h5>
        <form action="process-update.php" method="post">
            <div class="form-group">
                <label for="txtmadg">Mã độc giả</label>
                <input type="text" class="form-control" id="txtmadg" name="txtmadg" placeholder="Mã độc giả" value="<?php echo $row['madg']; ?>">
            </div>

            <div class="form-group">
                <label for="txtHoTen">Họ và tên</label>
                <input type="text" class="form-control" id="txtHoTen" name="txtHoTen" placeholder="Nhập họ tên" value="<?php echo $row['hovaten']; ?>">
            </div>
            
            <div class="form-group">
                <label for="txtChucVu">Giới tính</label>
                <input type="text" class="form-control" id="txtChucVu" name="txtChucVu" placeholder="Nhập chức vụ" value="<?php echo $row['chucvu']; ?>">
            </div>

            <div class="form-group">
                <label for="txtSoMayBan">Năm sinh</label>
                <input type="tel" class="form-control" id="txtSoMayBan" name="txtSoMayBan" placeholder="Nhập số máy bàn" value="<?php echo $row['sodt_coquan']; ?>">
            </div>
            <div class="form-group">
                <label for="txtSoDiDong">Nghề nghiệp</label>
                <input type="tel" class="form-control" id=txtSoDiDong" name="txtSoDiDong" placeholder="Số di động" value="<?php echo $row['sodt_didong']; ?>">
                
            </div>
            <div class="form-group">
                <label for="txtEmail">Ngày cấp thẻ</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Nhập email" value="<?php echo $row['email']; ?>">
               
            </div>
            <div class="form-group">
                <label for="txtEmail">Ngày hết hạn</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Nhập email" value="<?php echo $row['email']; ?>">
               
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Đơn vị</label>
                <select class="form-control" id="cboDocgia" name="cboDocgia">
                    <!-- Truy vấn dữ liệu để Hiển thị lựa chọn Đơn vị -->
                    <?php 
                        // Bước 01: Kết nối Database Server
                        $conn = mysqli_connect('localhost','root','','1951060805_libraries');
                        if(!$conn){
                            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                        }
                        // Bước 02: Thực hiện truy vấn
                        $sql = "SELECT * FROM docgia";

                        $result = mysqli_query($conn,$sql);

                        // Bước 03: Xử lý kết quả truy vấn
                        if(mysqli_num_rows($result)){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['madg'] == $ma_donvi){
                                    echo '<option selected value="'.$row['madg'].'">'.$row['ten_donvi'].'</option>';
                                }else{
                                    echo '<option value="'.$row['madg'].'">'.$row['ten_donvi'].'</option>';
                                }

                            }
                        }

                        // Bước 03: Đóng kết nối
                        mysqli_close($conn);
                    ?>
               
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu lại</button>
        </form>
    </div>    
    </div>
    <script src = "script.js"> </script>
</body>
</html>