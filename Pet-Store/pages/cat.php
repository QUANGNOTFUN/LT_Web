<?php
// Khai báo các thông số kết nối cơ sở dữ liệu
$host = "localhost";
$dbname = "pet-store";
$username = "root";
$password = "";

try {
    // Tạo đối tượng PDO để kết nối với cơ sở dữ liệu MySQL
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thực hiện truy vấn để lấy tất cả các sản phẩm thuộc danh mục 'cat'
    $stmt = $conn->prepare("SELECT * FROM pets WHERE idLoai = :idLoai");
    $stmt->bindParam(':idLoai', $idLoai);
    $idLoai = 'cat'; // Danh mục cần lọc
    $stmt->execute();

    // Lưu kết quả truy vấn vào một mảng
    $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<div class="pets-gird">
    <?php if (!empty($pets)): ?>
    <?php foreach ($pets as $pet): ?>
    <div class="container-pets">
        <img src="<?php echo htmlspecialchars($pet['urlImg']); ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>">
        <div class="row">
            <p class="name-pet"><?php echo htmlspecialchars($pet['name']); ?></p>
            <button class="heart" id="button1">❤</button>
        </div>
        <p class="text-price">Giá: <span class="price"><?php echo number_format($pet['price'], 0, ',', '.'); ?>đ</span>
            ➱
            <?php echo number_format($pet['priceSale'], 0, ',', '.'); ?>đ</p>
        <button class="button view-detail" id="button2">Xem chi tiết</button>
        <button class="button order" id="order-cat"
            onclick="addToPet('<?php echo htmlspecialchars($pet['id'], ENT_QUOTES, 'UTF-8'); ?>')">
            Thêm giỏ hàng
        </button>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p>Chưa có sản phẩm nào.</p>
    <?php endif; ?>
</div>