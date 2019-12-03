<?php

//fetch_item.php

include('database_connection.php');

//main page items

$query = "SELECT * FROM tbl_product ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
<div class="col-md-3" style="padding:10px 10px 60px 10px;">  
            <div  class="card" style="border:none; background-color:#f1f1f1; height:350px;" align="center">
            	<img src="images/'.$row["image"].'" class="card-img-top" /><br />
            	<h4 class="text-info">'.$row["name"].'</h4>
            	<h4 class="text-danger">$ '.$row["price"] .'</h4>
            	<input type="range" name="quantity" id="quantity' . $row["id"] .'" class="form-control" min="1" max="10" />
            	<input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
            	<input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px; border-radius:0;" class="btn btn-primary form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
}


?>