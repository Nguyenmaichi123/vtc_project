import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const currentUrl = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
        if (link.getAttribute("href") === currentUrl) {
            link.classList.add("active-link");
        }
    });

    $(document).on("click", ".add-to-cart", function (event) {
        event.preventDefault();

        var productId = $(this).data("id");

        var body = $("body");
        for (var i = 0; i < 5; i++) {
            body.animate({ marginLeft: "-10px" }, 50).animate(
                { marginLeft: "10px" },
                50
            );
        }
        body.animate({ marginLeft: "0px" }, 50);

        $.ajax({
            url: "/add-to-session",
            method: "POST",
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("Giỏ hàng sau khi thêm:", response.cart);

                // Cập nhật số lượng giỏ hàng
                updateCart();

                // Cuộn lên trên
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function (xhr) {
                console.error("Lỗi khi thêm sản phẩm:", xhr.responseText);
            },
        });
    });

    function updateCart() {
        $.ajax({
            url: "/cart/get",
            method: "GET",
            success: function (response) {
                $("#cart-count").text(response.totalQuantity || 0);
            },
            error: function (xhr) {
                console.error("Lỗi khi cập nhật giỏ hàng:", xhr.responseText);
            },
        });
    }

    updateCart();

    $(document).on("click", "#test3", function () {
        var music = document.getElementById("background-music");
        var body = $("body");

        for (var i = 0; i < 5; i++) {
            body.animate({ marginLeft: "-10px" }, 50).animate(
                { marginLeft: "10px" },
                50
            );
        }
        body.animate({ marginLeft: "0px" }, 50);

        if (music.paused) {
            music
                .play()
                .then(() => {
                    $(this).addClass("text-danger");
                    console.log("Nhạc đang phát...");
                })
                .catch((error) => {
                    console.error("Trình duyệt chặn phát nhạc:", error);
                });
        } else {
            music.pause();
            $(this).removeClass("text-danger");
            console.log("Nhạc đã tắt.");
        }
    });
});
