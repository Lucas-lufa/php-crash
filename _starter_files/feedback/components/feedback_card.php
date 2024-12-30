<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (empty($feedback)){
    echo 'No feedback';
}
?>

<?php foreach($feedback as $item): ?>
    <div class="card my-3">
        <div class="card-body">
            <?php echo $item['body'] ?><br>
            By <?php echo $item['name'] ?><br>
            <?php echo $item['email']?><br>
            <?php echo $item['date'] ?><br>
        </div>
    </div>
<?php endforeach; ?>