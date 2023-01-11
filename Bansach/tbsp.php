<link rel="stylesheet" href="css/sa.css">
<?php
    include './database/db.php';
?>

<div class="khung">
<header class="top">
        <li><a href="trangChu.html"class="ah">Trang chủ</a></li>
        <li><a href="tbsp.php"class="ah">Toàn bộ sản phẩm</a></li>
</header>   
    <div class="title">
                        Toàn Bộ Sản Phẩm
                </div>
            <?php
                $result = $connect->query("SELECT * FROM sach");
                if (mysqli_num_rows($result) > 0):
                    while($row = $result->fetch_assoc()):
                        if(isset($_POST["edit"]) && $_POST["edit"] == $row["id"]):
            ?>

            <?php else: ?>
                <div class="bot">
                <div class="mini">  
                <div class="table-i">
                </div>
               
                <table class="table table-hover">
									<thead>
										<tr>
                                            <th>Ảnh</th>
											<th>Tên sản phẩm</th>
                                            <th>Giá thành</th>
                                            <th>Số lượng</th>
										</tr>
									</thead>
									<tbody>
                                        <tr>
                                            <td><img class="img" src="./picture/<?=$row["id"]?>.png"></td>    
                                            <td><?=$row["TenSanPham"]?></td>      
                                            <td><?=$row["GiaThanh"]?></td> 
                                            <td><?=$row["SoLuong"]?></td>   
                                        </tr>
                                    </tbody>     
										
								</table>
                    </div>
                    </div>
            <?php endif; endwhile; endif; ?>
            </div>
            <div class="endline">
                <div class="Contentend">
                    <div class="diachi">
                        <ul>
                            <a href="" class="spacing1">Địa chỉ</a>
                            <li>
                                <a href="" class="spacing">18/1,phường Tân Thới Hiệp,Quận 1</a>
                            </li>
                            <li>
                                <a href="" class="spacing">13/6/2,phường Hiệp Thành,Quận 3</a>
                            </li>
                            <li>
                                <a href="" class="spacing">FAQs</a>
                            </li>
                        </ul>
                    </div>
                    <div class="AboutContent">
                        <ul>
                            <a href="" class="spacing1">Liên lạc</a>
                            <li>
                                <a href="" class="spacing">Facebook</a>
                            </li>
                            <li>
                                <a href="" class="spacing">Zalo</a>
                            </li>
                            <li>
                                <a href="" class="spacing">Instagram</a>
                            </li>
                        </ul>
                    </div>
        </div>
    </div>
    </div>
