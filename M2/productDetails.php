<?php
require(__DIR__ . '/partials/nav.php');
?>
<h1>Product Details<h1>
<?php

if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  $db = getDB();
  $stmt = $db->prepare("SELECT * FROM Products WHERE id = :product_id AND visibility = true");
  try {
    $stmt->execute([":product_id" => $product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo"Problem encountered";
    "<pre>" . var_export($e, true) . "</pre>";
}
}
?>
<?php 
if(!empty($product)){
echo "<div class = 'productDetails'>";  
echo"<ul id = 'vert'>";
echo "<li><p><strong>Name: </strong>{$product['name']}</p></li>";

echo  "<li><p><strong>Category: </strong>{$product['category']}</p></li>";

echo  "<li><p><strong>Description: </strong>{$product['description']}</p>";

echo  "<li><p><strong>In stock: </strong> {$product['stock']}</p></li>";

echo "<li><p><strong>Price: <strong>$" . $product['unit_price'] . ".00</p></li>";
echo "</ul>";
echo"</div>";
}else{
  echo"<p>Product not found</p>";
}
?>
<style>
  .productDetails{
    background-color: transparent;
    padding: 20px;
  }
  h1{
    text-align: center;
  }
  li{
    display: block;
    margin-bottom: 10px; 
    background-color: transparent;
    color: white;
    list-style-type: none;

  }
  #vert{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }
  body{
    background-color: lightblue;
  }
  </style>