<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	$category_query = "SELECT * FROM categories WHERE cat_id!=1";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li class='active'><a href='index.php'>Home</a></li>
                    <li><a href='store.php'>Electronics</a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            
            $sql = "SELECT COUNT(*) AS count_items FROM products,categories WHERE product_cat=cat_id";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            
            
            
			echo "
					
                    
                               <li class='categoryhome' cid='$cid'><a href='store.php'>$cat_name</a></li>
                    
			";
		}
        
		echo "</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	}
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page'>$i</a></li>
            
            
		";
	}
}
function fun($a) {
	$i = 10;
	return $i + $a;
	$i++;             // dead code
  }
  $url = "http://example.com"; // Sensitive
  $url = "ftp://anonymous@example.com"; // Sensitive
  $url = "telnet://anonymous@example.com"; // Sensitive
  
  $con = ftp_connect('example.com'); // Sensitive
  
  $trans = (new Swift_SmtpTransport('XXX', 1234)); // Sensitive
  
  $mailer = new PHPMailer(true); // Sensitive
  
  define( 'FORCE_SSL_ADMIN', false); // Sensitive
  define( 'FORCE_SSL_LOGIN', false); // Sensitive
function myEncrypt($cipher, $key, $data, $mode, $iv, $options, $padding, $infile, $outfile, $recipcerts, $headers, $nonce, $ad, $pub_key_ids, $env_keys)
{
    mcrypt_ecb ($cipher, $key, $data, $mode); // Sensitive
    mcrypt_cfb($cipher, $key, $data, $mode, $iv); // Sensitive
    mcrypt_cbc($cipher, $key, $data, $mode, $iv); // Sensitive
    mcrypt_encrypt($cipher, $key, $data, $mode); // Sensitive

    openssl_encrypt($data, $cipher, $key, $options, $iv); // Sensitive
    openssl_public_encrypt($data, $crypted, $key, $padding); // Sensitive
    openssl_pkcs7_encrypt($infile, $outfile, $recipcerts, $headers); // Sensitive
    openssl_seal($data, $sealed_data, $env_keys, $pub_key_ids); // Sensitive

    sodium_crypto_aead_aes256gcm_encrypt ($data, $ad, $nonce, $key); // Sensitive
    sodium_crypto_aead_chacha20poly1305_encrypt ($data, $ad, $nonce, $key); // Sensitive
    sodium_crypto_aead_chacha20poly1305_ietf_encrypt ($data, $ad, $nonce, $key); // Sensitive
    sodium_crypto_aead_xchacha20poly1305_ietf_encrypt ($data, $ad, $nonce, $key); // Sensitive
    sodium_crypto_box_seal ($data, $key); // Sensitive
    sodium_crypto_box ($data, $nonce, $key); // Sensitive
    sodium_crypto_secretbox ($data, $nonce, $key); // Sensitive
    sodium_crypto_stream_xor ($data, $nonce, $key); // Sensitive
}


if(isset($_POST["getProducthome"])){
	$limit = 3;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else if($start == 0){
		$start = 0;
	}
	else{
		$start = 1;
	}
	//TESTTESTTESTTEST3
	#new EDIT
	$filename = $_GET["filename"];
	include $filename . ".php";
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            
            $cat_name = $row["cat_title"];
			echo "
				
                       <div class='product-widget'>
                                <a href='product.php?p=$pro_id'> 
									<div class='product-img'>
										<img src='product_images/$pro_image' alt=''>
									</div>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price'>$pro_price<del class='product-old-price'>$990.00</del></h4>
									</div></a>
								</div>
                        
			";
		}
	}
}


if(isset($_POST["gethomeProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 71 AND 74";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
        
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            
            $cat_name = $row["cat_title"];
            
			echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
                                </div>
							
                        
			";
		}
        ;
      
}
    
	}
    
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            $cat_name = $row["cat_title"];
			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
			";
		}
	}