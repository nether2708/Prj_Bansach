<link rel="stylesheet" href="css\sp.css">
<?php
    include './database/db.php';
    if(isset($_POST["added"])) {
        if (isset($_FILES["img"])) {
            $file_name = $_FILES['img']['name'];
            $file_tmp =$_FILES['img']['tmp_name'];
            move_uploaded_file($file_tmp,"./picture/{$_POST['id']}.png");

            $sql = "INSERT INTO sach (id,TenSanPham,GiaThanh,SoLuong) VALUES ({$_POST['id']},'{$_POST['TenSanPham']}',{$_POST['GiaThanh']},{$_POST['SoLuong']})";
            if ($connect->query($sql) === TRUE) {
            }
        }
    }

    if(isset($_POST["edited"])) {
        $sql = "UPDATE sach SET TenSanPham='{$_POST['TenSanPham']}',GiaThanh={$_POST['GiaThanh']},SoLuong={$_POST['SoLuong']} WHERE id={$_POST['edited']}";
        if ($connect->query($sql) === TRUE) {
            $alert_type = "success";
        }
    }

    if(isset($_POST["delete"])) {
        unlink("./picture/{$_POST['delete']}.png");
        $sql = "DELETE FROM sach WHERE id={$_POST["delete"]}";
        if ($connect->query($sql) === TRUE) {
        }
    }
?>
<div class="khung">
<a class="main" href="trangchuadmin.html"target="_blank">Trang Chủ</a>
<form class="main-box" method="POST" enctype="multipart/form-data">
    <div class="main-title">
        Tìm kiếm sản phẩm
    </div>
    <div class="search-box">
        <input class="search-input" placeholder="Tên sản phẩm"name="search">
        <button class="search-btn" name="search-submit">Tìm</button>
    </div>
    <div class="main-content">
        <div class="main-table">
            <div class="table-hd">THÊM SẢN PHẨM
                   
            </div>
            <div class="table-hd">Mã sản phẩm
                <input class="table-input-id" name="id">
            </div>
            
            <div class="table-hd">Tên Sản Phẩm
                <input class="table-input-tsp" name="TenSanPham">
            </div>
            <div class="table-hd">Giá Thành
                <input class="table-input-gia" name="GiaThanh">
            </div>
            <div class="table-hd">Số Lượng
                <input class="table-input-sl" name="SoLuong">
            </div>
           <div class="tbl">
            <div class="table-hd">
                <div class="table-them">
                    <input  name="img" type="file" id="img" style="display:none;" accept="image/*">
                    <label for="img" class="table-btn">Chọn ảnh</label>
                    <div class="table-i">
                    <button class="table-btn" name="added">Thêm</button></div>
                    
                </div>
            </div>
                    </div>
                </div>
                
                <div class="table-i">
                    
                </div>
                <div class="table-i">
                    
                </div>
                <div class="table-i">
                    
                </div>
                <div class="table-i">
                    
                </div>
                

               
            <div class="main-title">
    
                        Toàn Bộ Sản Phẩm
                </div>
                <?php
                $search_sql = (isset($_POST["search-submit"]) && $_POST["search"] !== "") ? " WHERE TenSanPham LIKE '%{$_POST["search"]}%'" : "";
                $result = $connect->query("SELECT * FROM sach{$search_sql}");

                if (mysqli_num_rows($result) > 0):
                    while($row = $result->fetch_assoc()):
                        if(isset($_POST["edit"]) && $_POST["edit"] == $row["id"]):
            ?>
                <div class="table-i">
                    <img class="table-img" src="./picture/<?=$row["id"]?>.png">
                </div>
                <div class="table-i"><?=$row["id"]?></div>
                <div class="table-i">
                    <input class="table-input" name="TenSanPham" value="<?=$row["TenSanPham"]?>">
                </div>
                <div class="table-i">
                    <input class="table-input" name="GiaThanh" value="<?=$row["GiaThanh"]?>">
                </div>
                <div class="table-i">
                    <input class="table-input" name="SoLuong" value="<?=$row["SoLuong"]?>">
                </div>
                <div class="table-i">
                    <button class="btn-sua" name="edited" value=<?=$row["id"]?>>Sửa</button>
                </div>
            <?php else: ?>
              
                <div class="bot">
                
                <div class="mini">
                
                <div class="table-i">
                 <img class="table-img" src="./picture/<?=$row["id"]?>.png">  
                </div>
                <div class="table-i"><?=$row["TenSanPham"]?></div>
                <div class="table-i"><?=$row["GiaThanh"]?></div>
                <div class="table-i"><?=$row["SoLuong"]?></div>
                 <div class="table-i">
                 <button class="icon-box" name="edit" value="<?=$row["id"]?>">Sửa
                    </button>
                     <button class="icon-box" name="delete" value="<?=$row["id"]?>">Xóa
                    </button>
                    </ul>
                    </div>
                    </div>
            <?php endif; endwhile; endif; ?>
            </div>
        </div>
    </div>
    </div>
</form>