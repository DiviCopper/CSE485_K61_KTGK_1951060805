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
            <a class="btn btn-danger" href="http://localhost/Project/src/update.php/">Thêm</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã độc giả</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Năm sinh</th>
                    <th scope="col">Nghề nghiệp</th>
                    <th scope="col">Ngày cấp thẻ</th>
                    <th scope="col">Ngày hết hạn</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Bước 01: Kết nối Database Server
                    $conn = mysqli_connect('localhost','root','','1951060805_libraries');
                    if(!$conn){
                        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
                    }
                    // Bước 02: Thực hiện truy vấn
                    $sql = "SELECT madg, hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi FROM docgia";
                    $result = mysqli_query($conn,$sql);
                    // Bước 03: Xử lý kết quả truy vấn
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                            <tr>
                                <th scope="row"><?php echo $row['madg']; ?></th>
                                <td><?php echo $row['hovaten']; ?></td>
                                <td><?php echo $row['gioitinh']; ?></td>
                                <td><?php echo $row['namsinh']; ?></td>
                                <td><?php echo $row['nghenghiep']; ?></td>
                                <td><?php echo $row['ngaycapthe']; ?></td>
                                <td><?php echo $row['ngayhethan']; ?></td>
                                <td><?php echo $row['diachi']; ?></td>
                                <td><a href="update_employee.php?id=<?php echo $row['madg']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a href="delete_employee.php?id=<?php echo $row['madg']; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                <?php
                        }
                    }
                    // Bước 04: Đóng kết nối Database Server
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src = "script.js"> </script>
</body>
</html>