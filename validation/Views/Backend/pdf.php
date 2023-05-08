<?php 

include '../../Controller/CommandeC.php';
include '../../Controller/UserC.php';
include './assets/plugins/vendor/autoload.php';

require_once './assets/plugins/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once './assets/plugins/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once './assets/plugins/vendor/phpmailer/phpmailer/src/Exception.php';
//require_once './assets/plugins/vendor/twilio/sdk/src/Twilio/Rest/Client.php';
//use Twilio\Rest\Client;
use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;


// Remove the temporary file
//unlink($tmpfname);

$order_id=0;

if(isset($_GET['order_id'])){
    
    $order_id= $_GET['order_id']; 
    $commandeC = new CommandeC();
    $commandeDetail=$commandeC->getCommandeDetailsbyId($order_id);

    $commandeEvents=$commandeC->getCommandeEventsbyId($order_id);
    
    
    $id_user=$commandeDetail['id_user'];    
    $userC = new UserC();
    $userinfos=$userC->getuserbyID($id_user);
	
	
	$total=$commandeDetail['total'];
	$total_after_promotion=$commandeDetail['total_after_promotion'];

	$login=$userinfos['login'];
	$email=$userinfos['email'];
	$ddn=$userinfos['ddn'];


	// Build the HTML content with PHP variables
	$html = '
	<html>
	<head>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
	</head>
	<body>
		<h1>Order Details</h1>
		<table>
			<tr>
				<th>Event</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
			</tr>';
	foreach ($commandeEvents as $item) {

	$name=$item['name'];
	$price=$item['price'];
	$quantity_event=$item['quantity_event'];
	$price=$item['price'];
	$subtotal=intval($item['quantity_event'])*intval($item['price']);

	$html.='<tr><td>'.$name.'</td><td>'.$price.' DT</td><td>'.$quantity_event.'</td><td>'.$subtotal. ' DT</td>
	</tr>';
	} 

	$html .= '<tr>
	<td colspan="3">Total:</td>
	<td>'.$total.' DT</td>
	</tr>';

	if(floatval($commandeDetail['total'])!=floatval($commandeDetail['total_after_promotion'])){
		$html .='<tr>
		<td colspan="3">Total After Promotion:</td>
		<td>'.$total_after_promotion.' DT</td>
		</tr>';

	}
	


	$html .='</table><table>
	<tr>
		<th colspan="2">Client Information</th>
	</tr>
	<tr>
		<td>Full Name:</td>
		<td>'.$login.'</td>
	</tr>
	
	<tr>
		<td>Email:</td>
		<td>'.$email.'</td>
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td>'.$ddn.'</td>
	</tr>
	
	</table></body></html>';
		

	// Create a new Dompdf instance
	$dompdf = new Dompdf();

	// Load HTML content into Dompdf instance
	$dompdf->loadHtml($html);

	// Set paper size and orientation
	$dompdf->setPaper('A4', 'portrait');

	// Render HTML as PDF
	$dompdf->render();

	// Output generated PDF to browser for download
	
	$tmpfname = tempnam(sys_get_temp_dir(), 'pdf');
	file_put_contents($tmpfname, $dompdf->output());
	if(isset($_GET['mail'])){
		
		
		// Create a new PHPMailer instance
		$mail = new PHPMailer();
		
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'abdelwahed.raed.esprit@gmail.com';
		$mail->Password = 'droyzfbmqzjliusy';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		//abdelwahed_raed1234
		
		// Set the recipient, subject, and body of the email
		$mail->setFrom('abdelwahed.raed.esprit@gmail.com', 'Raed Abdelwahed');
		$mail->addAddress('abdelwahed.raed.esprit@gmail.com', 'Recipient Name');
		$mail->Subject = 'Nouvelle Facture';
		$mail->Body = 'Bonjour,Veuillez trouver ci-joint les détails de votre facture.';
		
		// Add the PDF as an attachment
		$mail->addAttachment($tmpfname, 'order.pdf');
		
		// Send the email
		if (!$mail->send()) {
			echo 'Error sending email: ' . $mail->ErrorInfo;
		} else {
			echo 'Email sent!';
		}
		
		// Remove the temporary file
		unlink($tmpfname);

		//send Sms

		/*$account_sid = 'ACcfc1355c7abdf4631613940388bf8275';
		$auth_token = '5e8b8fe091ab3aacf90b177bf41a1afc';
		$twilio_number = '+13203628658';
		$client = new Client($account_sid, $auth_token);

		$client->messages->create(
			// Where to send a text message (your customer's phone number)
			'+21628880533',
			array(
				'from' => $twilio_number,
				'body' => 'Veuillez consulter votre mail vous avez une nouvelle facture'
			)
		);*/



		
	}else{
		$dompdf->stream("order_details.pdf");
	}
	

   
}





