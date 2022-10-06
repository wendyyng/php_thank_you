<?php include 'inc/header.php'; ?>

<?php
$sql = 'SELECT * FROM message ORDER BY id DESC';
$result = mysqli_query($conn, $sql);

$message = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<h1 class="text-center m-3">Thank you, frontline and key workers. We will never forget.</h1>
<div class="container d-flex justify-content-center mb-3">
    <img alt="thank-you-img" class="w-50 rounded " src="https://images.pexels.com/photos/9988768/pexels-photo-9988768.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2">
</div>
<p class="lead text-center">Thank you to the people who are working to save lives and keep communities safe during this pandemic.</p>
<hr class="text-dark" style="height: 1px;">
<div class="container d-flex flex-column align-items-center">
    <h2>Messages of Support:</h2>
    <?php if (empty($message)) : ?>
        <p class="lead mt3">There is no message yet</p>
    <?php endif; ?>

    <?php foreach ($message as $item) : ?>
        <div class="card m-3 w-75">
            <div class="card-body text-center">
                <p><?php echo $item['body']; ?></p>
                <div class="text-secondary mt-2">
                    By <?php echo $item['name']; ?> on <?php echo date('Y/m/d', strtotime($item['date'])) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php include 'inc/footer.php'; ?>