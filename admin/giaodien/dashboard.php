<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Drawer with Tailwind CSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Drawer -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <!-- App Logo and Name -->
            <div class="flex items-center p-4">
                <img src="logo.png" alt="App Logo" class="w-10 h-10 mr-3">
                <span class="text-xl font-bold">App Name</span>
            </div>

            <!-- Search Bar -->
            <div class="px-4 mb-4">
                <input 
                    type="text" 
                    placeholder="Search..." 
                    class="w-full p-2 rounded-md text-black focus:outline-none"
                >
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1">
                <a href="giaodien/dashboard.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                    <i class="bi bi-speedometer2 mr-2"></i> Dashboard
                </a>
                <a href="giaodien/sanpham.php" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                    <i class="bi bi-box-seam mr-2"></i> Sản Phẩm
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                    <i class="bi bi-truck mr-2"></i> Nhà Cung Cấp
                </a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded-md">
                    <i class="bi bi-people mr-2"></i> Khách Hàng
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold">Welcome</h1>
            <p class="mt-4">Your content goes here...</p>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
