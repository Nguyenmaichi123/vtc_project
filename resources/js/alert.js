document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault(); // Ngăn chặn submit ngay lập tức
            
            let productName = this.getAttribute("data-product-name") || "sản phẩm này";
            let confirmDelete = confirm(`Bạn có chắc chắn muốn xóa "${productName}" không?`);

            if (confirmDelete) {
                this.submit(); // Nếu người dùng xác nhận, submit form
            }
        });
    });
});
