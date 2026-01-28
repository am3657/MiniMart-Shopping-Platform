<?php
require(__DIR__ . '/partials/nav.php');
?>
<h1> Welcome to Decathlon Shop </h1>
<div class = "container">
<form method="GET">
    <div>
        <label for="category">Category: </label>
        <input type="text" name="category" value ="<?php echo isset($_GET["category"])? $_GET["category"]: '';?>"/>
    </div>
    <div>
        <label for="name">Search by name</label>
        <input type="text" name="name" value = "<?php echo isset($_GET["name"])? $_GET["name"]: '';?>">
    </div>
    <div>
        <label for="sort">Sort by</label>
        <select name = "sort">
          <option value = "ascending">Low to High</option>
          <option value = "descending">High to Low</option>
        </select>
    </div>
    <input type="submit" value="Apply Fliters"/>
</form>
</div>

<?php
  // am3657
  $db = getDB();
    $category = isset($_GET["category"])? "%" . $_GET["category"] . "%" : '';
    $name =  isset($_GET["name"])? "%" . $_GET["name"] . "%": '';
    $sort = isset($_GET["sort"]) ? $_GET["sort"] : "ascending";
    $sort_order = ($sort === "ascending")? "ASC" : "DESC";
    $query = "SELECT * FROM Products WHERE visibility = true";
    if($category !== ''){
      $query .= " AND category LIKE :category";
    }
    if($name !== ''){
      $query .= " AND name LIKE :name";
    }
    $query .= " ORDER by unit_price $sort_order LIMIT 10";

    $stmt = $db->prepare($query);
         try {
             $params = [];
             if($category != ''){
              $params[":category"] = $category;
             }
             if($name != ''){
              $params[":name"] = $name;
             }

             $stmt->execute($params);
             $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (Exception $e) {
             echo"Problem encountered";
             "<pre>" . var_export($e, true) . "</pre>";
         }

?>

<table>
  <tr>
    <th>Category</th>
    <th>name</th>
  </tr>
<?php
     if (isset($products) && count($products) > 0) {
          foreach($products as $product){
            echo "<tr>";
            echo '<td>'.$product["category"] . '</td>';
            echo '<td>' . $product["name"] . '</td>';
            echo'<td><a href="productDetails.php?product_id=' . urlencode($product["id"]) . '"> View Details</a></td>';
            $logged = false;
            if(is_logged_in()){
              $logged = true;
            }
            //am3657
            echo '<td><a href="' .($logged ?"cart.php?product_id=" . urlencode($product["id"]) : "#") . '">Add to cart</a><td>';
            echo "</tr>";
          }
          echo count($products);
        }
      else{
        echo "<tr>";
        echo '<td> Products not found. Please reload the screen! </td>';
        echo "<tr>";
      }
?>
</table>
<style>
  body{
  background-color: #90D5FF;
  }
  table { font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;}
  td, th {
    border: 1px solid #dddddd; 
    text-align: left; padding: 8px;
   } 
   tr:nth-child(even) { background-color: #dddddd; }

   .container{
    margin: 60px auto;
    max-width: 500px;
    background-color: #fff;
    padding: 30px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
input[type = "submit"]{
    padding: 10px;
    border: none;
    border-radius: 10px;
    color: #fff;
    background-color: navy;
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
table a:hover{
  background-color: black;
  color: white;
}
</style>

