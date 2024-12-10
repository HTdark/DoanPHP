<?php
include './model/homeAD.php';

$product_count = count_products();
$customer_count = count_customers();
$supplier_count = count_suppliers();
$employee_count = count_employees();
?>

<div class="text-center bg-aquamarine p-4 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Thống Kê</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-medium">Sản phẩm</h3>
            <p class="text-2xl font-bold text-blue-600"><?php echo $product_count; ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-medium">Khách hàng</h3>
            <p class="text-2xl font-bold text-green-600"><?php echo $customer_count; ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-medium">Nhà cung cấp</h3>
            <p class="text-2xl font-bold text-red-600"><?php echo $supplier_count; ?></p>
        </div>
         <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-medium">Nhân viên</h3>
            <p class="text-2xl font-bold text-yellow-600"><?php echo $employee_count; ?></p>
        </div> -
    </div>
</div>
