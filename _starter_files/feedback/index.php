<?php include './components/header.php'; 

$name = $email = $body = '';
$nameERROR = $emailERROR = $bodyERROR = '';

if (empty($_POST['name'])){
  $nameERROR = 'Name is required.';
}else{
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
}

if (empty($_POST['email'])){
  $emailERROR = 'Email is required.';
}else{
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
}

if (empty($_POST['body'])){
  $bodyERROR = 'Feedback is required.';
}else{
  $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
}

if (empty($nameERROR) && empty($emailERROR) && empty($bodyERROR)){
  $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
  if (mysqli_query($conn, $sql)){
    header('Location: feedback.php');
  }else{
    echo 'Error ' . mysqli_errno($conn);
  }
}
?>
    <img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Traversy Media</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" style="<?php echo $nameERROR? 'border-style: solid; border-color: red;': null; ?>" id="name" name="name" placeholder="Enter your name">
        <div>
          <?php echo $nameERROR?>
        </div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" style="<?php echo $emailERROR? 'border-style: solid; border-color: red;': null; ?>" id="email" name="email" placeholder="Enter your email">
        <?php echo $emailERROR?>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control" style="<?php echo $bodyERROR? 'border-style: solid; border-color: red;': null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
        <?php echo $bodyERROR?>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
<?php include './components/footer.php'; ?>
