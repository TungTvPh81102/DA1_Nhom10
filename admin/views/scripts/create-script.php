<script>
// Khai báo biến đếm
var count = 1;

// Hàm thêm hàng mới vào bảng
function addRow() {
    count++;

    var size_select = document.getElementById('size_id').innerHTML;
    var color_select = document.getElementById('color_id').innerHTML;

    // Lấy container chứa tbody của bảng
    var container = document.getElementById('product_attributes').querySelector('tbody');

    // Tạo một hàng mới
    var newRow = document.createElement('tr');

    // Thiết lập nội dung của hàng mới
    newRow.innerHTML =
        '<td>' +
        '<select class="form-control" name="size_id[]">' +
        size_select +
        '</select>' +
        '</td>' +
        '<td>' +
        '<select class="form-control" name="color_id[]">' +
        color_select +
        '</select>' +
        '</td>' +
        '<td>' +
        '<input type="number" min="1" name="quantity[]" placeholder="Nhập số lượng" class="form-control" required>' +
        '</td>' +
        '<td>' +
        '<div onclick="remove_row(this)" class="btn btn-danger delete-row">Remove</div>' +
        '</td>';

    // Thêm hàng mới vào container
    container.appendChild(newRow);
}


function remove_row(button) {
    // Lấy hàng chứa nút Xóa được nhấn
    var row = button.closest('tr');
    row.remove();
}
</script>