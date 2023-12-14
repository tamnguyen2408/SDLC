$(document).ready(function () {
    // Xóa nội dung trong ô tìm kiếm khi form được submit
    $("form").submit(function () {
        $("input[name='name']").val(''); // Xóa giá trị của ô tìm kiếm
    });
});