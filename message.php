<?php include 'inc/header.php'; ?>

<?php
$name = $email = $body = ''; //set all to empty string
$nameErr = $emailErr = $bodyErr = '';

//Form submit
if (isset($_POST['submit'])) {
    //Validate name
    if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    //Validate email
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    //Validate body
    if (empty($_POST['body'])) {
        $bodyErr = 'Message is required';
    } else {
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
        //Add to the database
        $sql = "INSERT INTO message (name, email, body) VALUES('$name', '$email', '$body')";

        if (mysqli_query($conn, $sql)) {
            //Success
            header('Location: index.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
echo $nameErr;
echo $name;
?>

<div class="container m-4 p-4 flex-column d-flex justify-content-center align-items-center">
    <h2>Submit Messages of Support</h2>
    <p class="lead text-center">We are collecting messages of support for the frontline workers.
        Submit an online form below to send a message</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-50 card p-3">
        <div class="mb-3">
            <label for="name" class="form-label">Name*</label>
            <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name">
            <div class="invalid-message">
                <?php echo $nameErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email">
            <div class="invalid-message">
                <?php echo $emailErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Message*</label>
            <textarea class="form-control <?php echo $bodyErr ? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your message"></textarea>
            <div class="invalid-message">
                <?php echo $bodyErr; ?>
            </div>
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">

        </div>
    </form>

</div>
<?php include 'inc/footer.php'; ?>