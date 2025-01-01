<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'Database.php'; ?>


<!-- Data GET -->
<?php 
    $db = new Database();
    $query = "SELECT * FROM tbl_user";
    $read = $db->select($query);
?>
<!-- table starts here -->
<table class="tblone">
    <tr>
        <th width="30%">Name</th>
        <th width="30%">Email</th>
        <th width="15%">Skill</th>
        <th width="25%">Action</th>
    </tr>
    <?php if($read) { ?>
    <?php while($row = $read->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['skill']; ?></td>
        <td>
            <a style="text-decoration: none;" href="update.php?id=<?php echo $row['id']; ?>">Edit |</a>
            <a style="text-decoration: none;" href="update.php?id=<?php echo $row['id']; ?>">| Delete</a>
        </td>
    </tr>
    <?php } ?>
    <?php }else { ?>
        <p style="color: red;">Data is Not available !!</p>
    <?php } ?>
</table>
<!-- table ends here -->

<?php include 'inc/footer.php'; ?>