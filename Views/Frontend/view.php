<?php
include './functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// Check if the ID param in the URL exists
if (!isset($_GET['id'])) {
    exit('No ID specified!');
}
// MySQL query that selects the eventby the ID column, using the ID GET request variable
$stmt = $pdo->prepare('SELECT * FROM events WHERE id = ?');
$stmt->execute([ $_GET['id'] ]);
$event= $stmt->fetch(PDO::FETCH_ASSOC);
// Check if event exists
if (!$event) {
    exit('Invalid event ID!');
}
// Update status
if (isset($_GET['status']) && in_array($_GET['status'], array('open', 'closed', 'resolved'))) {
    $stmt = $pdo->prepare('UPDATE events SET status = ? WHERE id = ?');
    $stmt->execute([ $_GET['status'], $_GET['id'] ]);
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}
// Check if the comment form has been submitted
if (isset($_POST['msg']) && !empty($_POST['msg'])) {
    // Insert the new comment into the "events_comments" table
    $stmt = $pdo->prepare('INSERT INTO events_comments (event_id, msg) VALUES (?, ?)');
    $stmt->execute([ $_GET['id'], $_POST['msg'] ]);
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM events_comments WHERE event_id = ? ORDER BY created DESC');
$stmt->execute([ $_GET['id'] ]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('event')?>

<div class="content view">

	<h2><?=htmlspecialchars($event['title'], ENT_QUOTES)?> <span class="<?=$event['status']?>">(<?=$event['status']?>)</span></h2>

    <div class="event">
        <p class="created"><?=date('F dS, G:ia', strtotime($event['created']))?></p>
        <p class="msg"><?=nl2br(htmlspecialchars($event['msg'], ENT_QUOTES))?></p>
    </div>

    <div class="btns">
        <a href="view.php?id=<?=$_GET['id']?>&status=closed" class="btn red">Close</a>
        <a href="view.php?id=<?=$_GET['id']?>&status=resolved" class="btn">Resolve</a>
    </div>

    <div class="comments">
        <?php foreach($comments as $comment): ?>
        <div class="comment">
            <div>
                <i class="fas fa-comment fa-2x"></i>
            </div>
            <p>
                <span><?=date('F dS, G:ia', strtotime($comment['created']))?></span>
                <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
            </p>
        </div>
        <?php endforeach; ?>
        <form action="" method="post">
            <textarea name="msg" placeholder="Enter your comment..."></textarea>
            <input type="submit" value="Post Comment">
        </form>
    </div>

</div>

<?=template_footer()?>