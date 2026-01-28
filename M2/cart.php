<?php
require(__DIR__ . "/partials/nav.php");
?>
<h2>Your Cart</h2>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["clearCart"])){
  $db = getDB();
  $user_id = get_user_id();
  $stmt = $db->prepare("DELETE FROM Cart WHERE user_id = :user_id");
  $stmt -> execute([":user_id" => $user_id]);  
  $_SESSION['success'] = "Your cart has been cleared";
  header("Location: cart.php");
  exit;
}
if(isset($_GET['product_id'])){
  $user_id = get_user_id();
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
if(!empty($product)){
    $stmt = $db->prepare("SELECT * FROM Cart WHERE product_id = :product_id AND user_id = :user_id");
    $stmt -> execute([":product_id" => $product_id, ":user_id" => $user_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$existing){
      $desired_quantity = 1;
      $stmt = $db->prepare("INSERT into Cart (product_id, user_id, desired_quantity, unit_price) VALUES (:product_id, :user_id, :desired_quantity, :unit_price)");
      $stmt -> execute([":product_id" => $product_id, ":user_id" => $user_id, ":desired_quantity" => $desired_quantity, ":unit_price" => $product['unit_price']]);
      $SESSION["success"] = "*Item has been added to cart";
    }
  }
}
?>
<table>
  <tr>
    <th>Name</th>
    <th>Quanity</th>
    <th>Unit Price</th>
    <th>Subtotal</th>
    <th>Details</th>
</tr>
<?php
$user_id = get_user_id();
  $db = getDB();
  $stmt= $db->prepare("SELECT Cart.*, pr.name, pr.unit_price FROM Cart JOIN Products AS pr ON Cart.product_id = pr.id WHERE Cart.user_id = :user_id");
  $stmt -> execute([":user_id" => $user_id]);
  $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $subtotal = 0;
  if(is_array($cartItems) && count($cartItems) > 0){
    foreach($cartItems as $cartItem){
            echo '<tr>';
            echo '<td>' . $cartItem["name"] . '</td>';
            echo '<td>
                  <form method = "POST">
                  <input type= "number" name="desired_quantity" value ="' .$cartItem["desired_quantity"] . '" required min ="0">
                   <input type="hidden" name="product_id" value="' . $cartItem["product_id"] . '">
                  <input type = "submit" name = "modify" value = "Change">
                  </form>
                  </td>';
                  
            if(isset($_POST["modify"]) && isset($_POST["product_id"]) && $_POST["product_id"] == $cartItem["product_id"]){
              $product_id = $_POST["product_id"];
              $quantityItem = $_POST["desired_quantity"];
              if($quantityItem > 0){
                  $stmt = $db->prepare("UPDATE Cart SET desired_quantity = :quantity WHERE product_id = :product_id AND user_id = :user_id");
                  $stmt -> execute([":quantity"=> $quantityItem, ":product_id" => $product_id, ":user_id" => $user_id]);
                }
              else{
                $stmt = $db->prepare("DELETE FROM Cart WHERE user_id = :user_id AND product_id = :product_id");
                $stmt -> execute([":user_id" => $user_id, ":product_id" => $product_id]);
                echo "Item has been removed from cart => Quantity was set to 0";
              }
              header("Location: cart.php");
              exit;
            }   
            echo '<td>' .$cartItem["unit_price"] . '</td>';
            echo '<td>' . number_format($cartItem["unit_price"] * $cartItem["desired_quantity"], 2) . '</td>';
            $subtotal +=  $cartItem["unit_price"] * $cartItem["desired_quantity"];
            echo '<td><a href="productDetails.php?product_id=' . urlencode($cartItem["product_id"]) . '"> View Details</a></td>'; 
            echo '</tr>';
          }
  }
        else{
          echo"<tr><td>Your cart is empty. </td></tr>";
        }

?>
</table>
<p>Cart total: <?php echo number_format($subtotal, 2)?></p>
<form method = "POST">
      <input type = "submit" name = "clearCart" value = "DELETE ALL">
</form>
<?php 
  if(isset($SESSION["success"])): ?>
    <p id = 'message'><?php echo $SESSION["success"]; ?></p>
 <?php unset($SESSION["success"]); ?>
<?php endif;?>
<style>
table { 
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  }
  td, th {
    border: 1px solid #dddddd; 
    text-align: left; padding: 8px;
   } 
   tr:nth-child(even) { background-color: #dddddd; }
  
  input[type="submit"]{
    padding: 10px;
    border: none;
    border-radius: 10px;
    color: #fff;
    background-color: red;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}
table a{
  display: block;
  padding: 10px 20px;
  background-color: navy;
  color: white;
  margin-top: 10px;
  width: fit-content;
  font-family: sans-serif;
  text-decoration: none;
}
p{
  vertical-align: middle;
  font-size: 20px;
  text-align: center;
}
body{
  background-color: #04AA6D;
}
#message{
  vertical-align: middle;
  font-size: 20px;
  text-align: center;
  color: #8B0000;
}
</style>
