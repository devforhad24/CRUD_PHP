<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'Database.php'; ?>


<!-- Data select -->
<?php 
    $db = new Database();
    $query = "SELECT * FROM tbl_user";
    $read = $db->select($query);
?>
<!-- Message -->
<?php 
    if(isset($_GET['msg'])){
        echo "<span style='color:green'>".$_GET['msg']."</span>";
    }
?>

<!-- table starts here -->
<table class="tblone">
    <tr>
        <th width="35%">Name</th>
        <th width="25%">Email</th>
        <th width="30%">Skill</th>
        <th width="10%">Action</th>
    </tr>
    <?php if($read) { ?>
    <?php while($row = $read->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td style="text-decoration:underline"><?php echo $row['email']; ?></td>
        <td><?php echo $row['skill']; ?></td>
        <td>
            <a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
    <?php }else { ?>
        <p style="color: red;">Data is Not available !!</p>
    <?php } ?>
</table>
<!-- table ends here -->
<br>
<a href="create.php">Create</a>

<?php include 'inc/footer.php'; ?>