<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="/Webbandoan2/public/assets/font-awesome-pro-v6-6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="/Webbandoan2/public/assets/css/base.css" />
    <link rel="stylesheet" href="/Webbandoan2/public/assets/css/style.css" />

    <title>Đặc sản 3 miền</title>

    <link href="/Webbandoan2/public/assets/img/logo.png" rel="icon" type="image/x-icon" />
</head>

<body>
    <?php include_once __DIR__ . '/../includes/header.php'; ?>

    <div class="Banner">
        <div class="container">
            <div class="inner-img">
                <img src="/Webbandoan2/public/assets/img/banner.jpg" alt="banner" />
            </div>
        </div>
    </div>

    <div class="home-service" id="home-service">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="inner-item">
                        <div class="inner-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="inner-info">
                            <div class="inner-chu1">GIAO HÀNG NHANH</div>
                            <div class="inner-chu2">Cho tất cả đơn hàng</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="inner-item">
                        <div class="inner-icon"><i class="fa-solid fa-shield-heart"></i></div>
                        <div class="inner-info">
                            <div class="inner-chu1">SẢN PHẨM AN TOÀN</div>
                            <div class="inner-chu2">Cam kết chất lượng</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="inner-item">
                        <div class="inner-icon"><i class="fa-solid fa-headset"></i></div>
                        <div class="inner-info">
                            <div class="inner-chu1">HỖ TRỢ 24/7</div>
                            <div class="inner-chu2">Tất cả ngày trong tuần</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="inner-item">
                        <div class="inner-icon"><i class="fa-solid fa-coins"></i></div>
                        <div class="inner-info">
                            <div class="inner-chu1">HOÀN LẠI TIỀN</div>
                            <div class="inner-chu2">Nếu không hài lòng</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Products" id="product-list">
        <div class="container">
            <div class="row">
                <?php if ($total_records > 0): ?>
                    <div class="col-xl-12">
                        <div class="inner-title">
                            <?= $isSearch ? 'Kết quả tìm kiếm' : 'Khám phá thực đơn của chúng tôi'; ?>
                        </div>
                    </div>

                    <?php foreach ($products as $product): ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="inner-item">
                                <a href="/chi-tiet?id=<?= $product->getId(); ?>" class="inner-img">
                                    <img src="<?= htmlspecialchars($product->getHinhAnh()); ?>" />
                                </a>
                                <div class="inner-info">
                                    <div class="inner-ten"><?= htmlspecialchars($product->getTen()); ?></div>
                                    <div class="inner-gia"><?= number_format($product->getGia(), 0, '.', '.'); ?>₫</div>
                                    <a href="/chi-tiet?id=<?= $product->getId(); ?>" class="inner-muahang">
                                        <i class="fa-solid fa-cart-plus"></i> ĐẶT MÓN
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="col-xl-12">
                        <div class="home-products" id="home-products">
                            <div class="no-result">
                                <div class="no-result-h">Tìm kiếm không có kết quả</div>
                                <div class="no-result-p">Xin lỗi, chúng tôi không thể tìm được kết quả hợp với tìm kiếm của
                                    bạn</div>
                                <div class="no-result-i"><i class="fa-light fa-face-sad-cry"></i></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="pagination" class="Pagination">
        <div class="container">
            <ul>
                <?php
                // Build lại Base URL cho phân trang
                $queryParams = $filters;
                // Loại bỏ các param rỗng để URL đẹp hơn
                $queryParams = array_filter($queryParams, function ($value) {
                    return $value !== '' && $value !== null;
                });

                $baseUrl = '/?'; // Hoặc route hiện tại
                
                for ($i = 1; $i <= $totalPages; $i++):
                    $queryParams['page'] = $i;
                    $pageUrl = $baseUrl . http_build_query($queryParams);
                    $activeClass = ($i == $currentPage) ? 'trang-chinh' : '';
                    ?>
                    <li>
                        <a href="<?= htmlspecialchars($pageUrl) ?>" class="inner-trang <?= $activeClass ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>

    <?php if ($isSearch && $totalProducts > 0): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var el = document.getElementById('home-service');
                if (el) el.scrollIntoView({ behavior: 'smooth' });
            });
        </script>
    <?php endif; ?>

    <?php include_once __DIR__ . '/../includes/footer.php'; ?>
    <script>
        function submitSearchForm() {
            // Đảm bảo form search trỏ về route '/' (HomeController)
            document.getElementById('search-form').submit();
        }
    </script>
</body>

</html>