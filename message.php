<?php
    // kết nối tới database trên phpmyadmin
    $conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");
    // chuỗi được người dùng nhập vào qua biến input từ bot.php
    $getMesg = mysqli_real_escape_string($conn, $_POST['input']);
    // tạo câu truy vấn
    $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
    // truy vấn đến database
    $run_query = mysqli_query($conn, $check_data) or die("Error");
    // nếu trên database có dữ liệu để trả lời:
    if (mysqli_num_rows($run_query) > 0){
        // lấy row data dưới dạng mảng
        $fetch_data = mysqli_fetch_assoc($run_query);
        // lấy kết quả muốn trả về là giá trị của replies trong row trên
        $replay = $fetch_data['replies'];
        // trả về kết quả
        echo $replay;
    }
    else {
        /* nếu trên database không có dữ liệu ứng với yêu cầu
        trả về hàm sau:*/
        echo "Xin lỗi, tôi chưa có dữ liệu để trả lời bạn.";
    }
?>