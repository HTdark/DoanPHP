<form action="indexAD.php?act=updateformLoai" method="POST" class="mb-6 bg-white p-4 rounded shadow-md">
    <input type="hidden" name="idloaisp" value="<?= $kqone['idloaisp'] ?>">
    
    <div class="flex space-x-4 mb-4">
        <label for="tenloai" class="w-1/3 text-sm font-medium text-gray-700">Tên Loại Sản Phẩm</label>
        <input type="text" id="tenloai" name="tenloai" value="<?= $kqone['tenloai'] ?>" class="w-2/3 p-2 border border-gray-300 rounded-md">
    </div>

    <button type="submit" name="capnhat" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Cập nhật</button>
</form>
