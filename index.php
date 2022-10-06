<?php include 'inc/header.php'; ?>

<?php
    $sql = 'SELECT * FROM message';
    $result = mysqli_query($conn, $sql);
    $message = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<h1>Thank You Messages</h1>

<?php if (empty($message)) : ?>
    <p class="lead mt3">There is no message yet</p>
<?php endif; ?>

<?php foreach ($message as $item) : ?>
    <div class="card my-3 w-75">
        <div class="card-body text-center">
            <?php echo $item['body']; ?>
            <div class="text-secondary mt2">
                By <?php echo $item['name']; ?> on <?php echo $item['date'] ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'inc/footer.php'; ?>