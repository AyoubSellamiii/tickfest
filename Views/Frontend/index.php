<?php
include 'functions.php';
// coonex avec mysql avec fonction
$pdo = pdo_connect_mysql();
// recuperations avec requete des evenement dans la base 
$stmt = $pdo->prepare('SELECT * FROM events ORDER BY created DESC');
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('events')?>

<div class="content home">

<div class="btns">
		<a href="create.php" class="btn">Create event</a>
	</div>


	<p>Welcome to the index page. You can view the list of events below.</p>


	<div class="events-list">
		<?php foreach ($events as $event): ?>
		<a href="view.php?id=<?=$event['id']?>" class="event">
			<span class="con">
				<?php if ($event['status'] == 'open'): ?>
				<i class="far fa-clock fa-2x"></i>
				<?php elseif ($event['status'] == 'resolved'): ?>
				<i class="fas fa-check fa-2x"></i>
				<?php elseif ($event['status'] == 'closed'): ?>
				<i class="fas fa-times fa-2x"></i>
				<?php endif; ?>
			</span>
			<span class="con">
				<span class="title"><?=htmlspecialchars($event['title'], ENT_QUOTES)?></span>
				<span class="msg"><?=htmlspecialchars($event['msg'], ENT_QUOTES)?></span>
			</span>
			<span class="con created"><?=date('F dS, G:ia', strtotime($event['created']))?></span>
		</a>
		<?php endforeach; ?>
	</div>

</div>

<?=template_footer()?>