



document.addEventListener("DOMContentLoaded", function () {
    console.log("Dashboard.js đã tải!");

    // Kiểm tra phần tử có tồn tại trước khi truy cập
    var revenueChartEl = document.getElementById("revenueChart");

    if (revenueChartEl) {
        try {
            // Biểu đồ doanh thu
            var revenueCtx = revenueChartEl.getContext("2d");
            var months = JSON.parse(document.getElementById("monthsData").value || "[]");
            var revenueData = JSON.parse(document.getElementById("revenueData").value || "[]");
           

            console.log("Months:", months);
            console.log("Revenue Data:", revenueData);

            new Chart(revenueCtx, {
                type: "line",
                data: {
                    labels: months,
                    datasets: [{
                        label: "Doanh thu (VND)",
                        data: revenueData,
                        borderColor: "#28a745",
                        backgroundColor: "rgba(40, 167, 69, 0.2)",
                        fill: true
                    }]
                }
            });
        } catch (error) {
            console.error("Lỗi khi vẽ biểu đồ:", error);
        }
    } else {
        console.error("Không tìm thấy phần tử canvas #revenueChart!");
    }
});
// Biểu đồ trạng thái đơn hàng
    var orderStatusCtx = document.getElementById("orderStatusChart").getContext("2d");
    new Chart(orderStatusCtx, {
        type: "doughnut",
        data: {
            labels: ["Chờ xử lý", "Đang xử lý", "Đã xác nhận", "Đang giao", "Hoàn thành", "Đã hủy"],
            datasets: [{
                data: JSON.parse(document.getElementById("orderStatusData").value),
                backgroundColor: ["#ffcc00", "#007bff", "#17a2b8", "#ffc107", "#28a745", "#dc3545"]
            }]
        }
    });