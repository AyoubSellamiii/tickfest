<?php
session_start();
include 'header.php';
include '../../Controller/CommandeC.php';
require_once '../../model/Commande.php';
$commandeC = new CommandeC();

?>
<div id="shopping-cart">
<div class="txt-heading">Commande Détail</div>

<?php
if(isset($_SESSION["cart_item"])){
     
      $_SESSION["user_id"]="1";
      $userid=$_SESSION["user_id"];
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
                  </tr>
                  <?php
                  $total_quantity += $item["quantity"];
                  $total_price += ($item["price"]*$item["quantity"]);
          }
         
?>
  
  <tr>
 <td colspan="2" align="right">Total:</td>
  <td align="right"><?php echo $total_quantity; ?></td>
  <td align="right" colspan="2"><strong><?php echo number_format($total_price, 2)." dt"; ?></strong></td>

  
  </tr>
 <?php 
 if(isset($_SESSION['reduction'])){?>
    <tr>
    <td colspan="2" align="right">Total Aprés Réduction:</td>
     <td align="right"></td>
     <td align="right" colspan="2"><strong><?php echo $_SESSION['reduction']." dt"; ?></strong></td>
   
     
     </tr>
<?php }?>
  </tbody>
  </table>		
   
    <a id="btnCheckout" href="Commande.php?action=validate_fn">Validate</a>
</div>
<?php 
if(!empty($_GET["action"])  && $_GET["action"]=="validate_fn") {


  $order_id= $commandeC->savecommandedetail( $userid,$_SESSION['cart_item'] ,$_SESSION['total']);

    echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script type='text/javascript'>
    jQuery.ajax({
      type: 'GET',
      url: 'http://localhost/tickfest-gestion-user/Views/Backend/pdf.php',
      data: {
        order_id: $order_id,
        mail :'yes'
      },
      success: function(response) {
        //console.log(response);
      },
      error: function(error) {
        //console.log(error);
      }
    });
    alert('commande passée avec succée,un email vous ait envoyé avec les détails de votre facture');
    window.location.href='index.php';
    </script>";
    session_destroy();
 
}

} 

 include 'footer.php';?>

