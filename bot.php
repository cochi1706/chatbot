<!-- Created By CodingNepal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHÁT BÓT MẪU GIÁO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">Chátbót Mẫu Giáo</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <!-- tin nhắn đầu tiên của chat -->
                <div class="msg-header">
                    <p>Chàooooo</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <!-- trường chứa nội dung người dùng nhập vào để gửi đi -->
                <input id="data" type="text" placeholder="Nhắn gì cho tôi đi..." required>
                <!-- button để thực hiện việc gửi tin -->
                <button id="send-btn">Gửi</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // khi người dùng click vào button "Gửi"
            $("#send-btn").on("click", function(){
                // lấy tin nhắn người dùng nhập vào
                $value = $("#data").val();
                // tạo đối tượng là một tin nhắn chứa nội dung người dùng đã nhập
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                // thêm đối tượng trên vào cuối chat
                $(".form").append($msg);
                // xoá đoạn tin vừa gửi khỏi trường chứa nội dung người dùng nhập vào 
                $("#data").val('');

                // thực hiện thao tác với database, chương trình php khác mà không cần phải reload lại toàn bộ web
                $.ajax({
                    // gửi data là đoạn tin người dùng dùng nhập vào tới message.php
                    url: 'message.php',
                    type: 'POST',
                    data: 'input='+$value,
                    // thao tác với kết quả trả về từ message.php: 
                    success: function(result){
                        // tạo đối tượng là tin nhắn trả lời từ botchat
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        // thêm đối tượng trên vào cuối chat
                        $(".form").append($replay);
                        // tự động scroll khung chat xuống khi có tin nhắn mới
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
</body>
</html>