
<?php
session_start();
include 'header.php';
include '../../Controller/EventC.php';
include '../../Controller/CommandeC.php';
require_once '../../model/Event.php';
$eventC = new EventC();
$commandeC = new CommandeC();


if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$eventByCode = $eventC->getEventbyCode($_GET["code"]);

			$itemArray = array($eventByCode["code"]=>array('id'=>$eventByCode["id"] ,'name'=>$eventByCode["name"], 'code'=>$eventByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$eventByCode["price"], 'image'=>$eventByCode["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($eventByCode["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($eventByCode["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<a id="btnCheckout" href="Commande.php?action=validate">Validate</a>
<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){

    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo $item["price"]." dt"; ?></td>
				<td  style="text-align:right;"><?php echo  number_format($item_price,2)." dt"; ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="./assets/img/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
        $_SESSION["total"]=$total_price;
		$total=str_replace(',','',$total_price);  
        $total=str_replace('.','',$total_price);       
        $total=floatval( $total_price);
       
        $total_after_promotion=$total;
		//$_SESSION['user_id']="1";
        $promotion=$commandeC->getusercommandepromotion("1");
         

        if( $promotion > 0 ){
            
            
            $total_after_promotion=$total*(1-$promotion);         
            
        }
        $_SESSION['reduction']=$total_after_promotion;
		?>

<tr>
<!--<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo $total_price ." dt"; ?></strong></td>
<td></td>-->

</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="event-grid">
	<div class="txt-heading">List Events</div>
    <div class="event-list">
	<?php
	$event_array =$eventC->listEvent();

	if (!empty($event_array)) { 
		foreach($event_array as $key=>$value){
	?>
		<div class="event-item">
			<form method="post" action="index.php?action=add&code=<?php echo $event_array[$key]["code"]; ?>">
			<div class="event-image"><img src="<?php echo $event_array[$key]["image"]; ?>" width="100%"; /></div>
			<div class="event-tile-footer">
			<div class="event-title"><?php echo $event_array[$key]["name"]; ?></div>
			<div class="event-price"><?php echo $event_array[$key]["price"]." dt"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	} 
	?>
    </div>
</div>
<?php include 'footer.php';?>