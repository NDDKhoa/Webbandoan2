<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="assets/font-awesome-pro-v6-6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="assets/css/base.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Đặc sản 3 miền</title>
    <link href="./assets/img/logo.png" rel="icon" type="image/x-icon" />
  </head>

  <body>
    <!-- header top  -->

    <header class="header-top">
      <div class="container">
        <div class="inner-wrap">
          <div class="inner-left">
            <a href="login.html"
              ><img src="assets/img/logo.png" alt="logo"
            /></a>
          </div>

          <div class="inner-middle">
            <form action="" class="inner-find">
              <input type="text" placeholder="Tìm Kiếm món ăn..." />
              <a href="timkiem-login.php" class="inner-button-find">
                <i class="fa-solid fa-magnifying-glass"></i>
              </a>
            </form>
          </div>

          <div class="inner-right">
            <div class="inner-account">
              <a
                class="inner-icon"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fa-regular fa-user"></i>
              </a>
              <a
                class="inner-info"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <div class="inner-register">Tài khoản</div>
                <div class="nav-link dropdown-toggle">
                <?php 
                session_start();
                ob_start();
                include "connect.php";
                echo "<p class='username'>" . $_SESSION['tenkh'] . "</p>";
                if(!isset($_SESSION['PhoneNumber'])){
                  header('location:login.php');
                }
                ?>
                </div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="account.php"
                    ><i class="fa-regular fa-circle-user"></i>Tài khoản của
                    tôi</a
                  >
                  <a class="dropdown-item" href="productss.php"
                    ><i class="fa-solid fa-cart-shopping"></i>Đơn hàng đã mua</a
                  >
                  <a class="dropdown-item" href="logout.php"
                    ><i class="fa-solid fa-right-from-bracket"></i>Thoát tài
                    khoản</a
                  >
                </div>
              </a>
            </div>
            <div
              class="inner-shopping"
              data-toggle="modal"
              data-target="#cartModal"
            >
              <div class="inner-icon">
                <i class="fa-solid fa-basket-shopping"></i>
                <span class="inner-so">2</span>
              </div>
              <span class="inner-text-shopping">Giỏ hàng</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal login -->

      <div
        class="modal fade modal-form"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="inner-title">Đăng nhập tài khoản</h5>
              <p class="inner-desc">
                Đăng nhập thành viên để mua hàng và nhận những ưu đãi đặc biệt
                từ chúng tôi
              </p>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="sdt">Số điện thoại</label>
                      <input
                        type="text"
                        id="sdt"
                        class="form-control"
                        placeholder="Nhập số điện thoại"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="mk">Mật khẩu</label>
                      <input
                        type="password"
                        id="mk"
                        class="form-control"
                        placeholder="Nhập mật khẩu"
                      />
                    </div>
                  </div>
                  <div class="col-12">
                    <a href="login.html" class="button"> Đăng nhập </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal login -->

      <!-- Modal shopping -->

      <div
        class="modal fade right"
        id="cartModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="cartModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <div class="inner-shopping">
                <div class="inner-icon">
                  <i class="fa-solid fa-basket-shopping"></i>
                </div>
                <span class="inner-text-shopping">Giỏ hàng</span>
              </div>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="cart-item">
                <div class="inner-product">
                  <img src="assets/img/products/banhmi.webp" alt="Product 1" />
                  <div class="inner-gia">20.000 ₫</div>
                </div>
                <div class="inner-info">
                  <div class="inner-ten">Bánh mì</div>
                  <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-" />
                    <input class="input-qty" type="text" value="1" />
                    <input class="plus is-form" type="button" value="+" />
                  </div>
                </div>
              </div>
              <div class="cart-item">
                <div class="inner-product">
                  <img src="assets/img/products/bunbohue.jpg" alt="Product 2" />
                  <div class="inner-gia">50.000 ₫</div>
                </div>
                <div class="inner-info">
                  <div class="inner-ten">Bún bò Huế</div>
                  <div class="buttons_added">
                    <input class="minus is-form" type="button" value="-" />
                    <input class="input-qty" type="text" value="1" />
                    <input class="plus is-form" type="button" value="+" />
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="inner-tong">
                <div class="inner-text-tong">Tổng tiền:</div>
                <div class="inner-gia-tong">70.000 ₫</div>
              </div>
              <div class="inner-nut">
                <button
                  type="button"
                  class="inner-tm"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <i class="fa-solid fa-plus"></i>Thêm món
                </button>
                <a href="thanhtoan.html" class="inner-tt">Thanh toán</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- End Modal shopping -->
    </header>

    <!-- End header top  -->

    <!-- header bottom  -->

    <header class="header-bottom">
      <div class="container">
        <div class="inner-menu">
          <ul>
            <li>
              <a href="login.php">TRANG CHỦ</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN CHAY</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN MẶN</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN LẨU</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN ĂN VẶT</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN TRÁNG MIỆNG</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">NƯỚC UỐNG</a>
            </li>
            <li>
              <a href="timkiemnangcao-login.php">MÓN KHÁC</a>
            </li>
          </ul>

        </div>
      </div>
    </header>

    <!-- End header bottom  -->

    <!-- Account -->

    <div class="Account">
      <div class="container">
        <form action="">
          <div class="row">
            <div class="col-xl-12">
              <div class="inner-title">Thông tin tài khoản của bạn</div>
              <div class="inner-desc">
                Quản lý thông tin để bảo mật tài khoản
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <?php
              include "connect.php";
              if (!isset($_SESSION['PhoneNumber'])) {
                header('location:login.php');
                exit(); 
            }
              $phone = $_SESSION['PhoneNumber'];
              $sql = "SELECT * FROM Khachhang WHERE sodienthoai = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("s",$phone);
              $stmt->execute();
              $result = $stmt->get_result();
              if($result->num_rows >0){
                $row = $result->fetch_assoc();
              } else{
                echo "Không tìm thấy thông tin người dùng!";
                exit();
              }
              $stmt->close();
              $conn->close();
              ?>
              <div class="form-group">
                <label for="name1">Họ và tên</label>
                
                <input
                  type="text"
                  id="name1"
                  class="form-control"
                  value="<?php echo htmlspecialchars($row['tenkh']); ?>"
                />
    
              </div>
              <div class="form-group">
                <label for="phone">Số điện thoại</label>
               
                <input
                  type="text"
                  id="phone"
                  class="form-control"
                  value="<?php echo htmlspecialchars($row['sodienthoai']); ?>"
                  disabled
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
              
                <input
                  type="text"
                  id="email"
                  class="form-control"
                  value="<?php echo htmlspecialchars($row['Email']); ?>"
                />
              </div>
              <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input
                  type="text"
                  id="diachi"
                  class="form-control"
                  value="<?php echo htmlspecialchars($row['diachi']); ?>"
                />
              </div>
              <button class="button" onclick="capNhat()">
                <i class="fa-regular fa-floppy-disk"></i>
                Lưu thay đổi
              </button>
            </div>
            <?php 
            ?>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="form-group">
                <label for="mk1">Mật khẩu hiện tại</label>
                <input
                  type="text"
                  id="mk1"
                  class="form-control"
                  placeholder="Nhập mật khẩu hiện tại"
                />
              </div>
              <div class="form-group">
                <label for="mk3">Mật khẩu mới</label>
                <input
                  type="text"
                  id="mk3"
                  class="form-control"
                  placeholder="Nhập mật khẩu mới"
                />
              </div>
              <div class="form-group cach-duoi">
                <label for="mk4">Xác nhận mật khẩu mới</label>
                <input
                  type="text"
                  id="mk4"
                  class="form-control"
                  placeholder="Nhập lại mật khẩu mới"
                />
              </div>
              <button class="button" onclick="thayDoi()">
                <i class="fa-solid fa-key"></i>
                Đổi mật khẩu
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- End Account -->

    <!-- Footer-top -->

    <div class="Footer-top">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-12">
            <div class="inner-logo">
              <img src="assets/img/logo.png" alt="logo" />
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="inner-text">
              <div class="inner-chu1">Đăng ký nhận tin</div>
              <div class="inner-chu2">Nhận thông tin mới nhất từ chúng tôi</div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-6">
            <form action="" class="inner-form">
              <input type="text" placeholder="Nhập email của bạn" />
              <button class="inner-sub">
                ĐĂNG KÝ <i class="fa-solid fa-arrow-right"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- End Footer-top -->

    <!-- Footer-middle -->

    <div class="Footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="inner-text">Về chúng tôi</div>
            <p class="inner-desc">
              Đặc Sản 3 Miền là thương hiệu được thành lập vào năm 2023 với tiêu
              chí đặt chất lượng sản phẩm lên hàng đầu.
            </p>
            <div class="inner-icon">
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-text">liên kết</div>
            <ul>
              <li>
                <a href="#"
                  ><i class="fa-solid fa-arrow-right"></i>Về chúng tôi</a
                >
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Thực đơn</a>
              </li>
              <li>
                <a href="#"
                  ><i class="fa-solid fa-arrow-right"></i>Điều khoản</a
                >
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Liên Hệ</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Tin tức</a>
              </li>
            </ul>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-text">thực đơn</div>
            <ul class="inner-menu">
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Điểm tâm</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Món chay</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Món mặn</a>
              </li>
              <li>
                <a href="#"><i class="fa-solid fa-arrow-right"></i>Nước uống</a>
              </li>
              <li>
                <a href="#"
                  ><i class="fa-solid fa-arrow-right"></i>Tráng miệng</a
                >
              </li>
            </ul>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="inner-text">liên hệ</div>
            <div class="inner-contact">
              <div class="inner-icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="inner-diachi">
                <div class="inner-chu1">40/15 Tô Hiệu, P. Tân Thới Hòa</div>
                <div class="inner-chu2">Quận Tân Phú, TP Hồ Chí Minh</div>
              </div>
            </div>
            <div class="inner-contact">
              <div class="inner-icon">
                <i class="fa-solid fa-phone"></i>
              </div>
              <div class="inner-diachi">
                <div class="inner-chu1">0123 456 789</div>
                <div class="inner-chu2">0987 654 321</div>
              </div>
            </div>
            <div class="inner-contact">
              <div class="inner-icon">
                <i class="fa-regular fa-envelope"></i>
              </div>
              <div class="inner-diachi">
                <div class="inner-chu1">hđkn@gmail.com</div>
                <div class="inner-chu2">gacon@domain.com</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Footer-middle -->

    <!-- Footer-bottom -->

    <div class="Footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="inner-end">
              Copyright 2023 ĐS3M. All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Footer-bottom -->

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
