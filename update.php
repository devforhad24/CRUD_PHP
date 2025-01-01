<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'Database.php'; ?>

<!-- Data select -->
<?php 
    $id = $_GET['id'];
    $db = new Database();
    $query = "SELECT * FROM tbl_user WHERE id = $id";
    $getData = $db->select($query)->fetch_assoc();
 
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($db->link,$_POST['name']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

        if($name == '' || $email == '' || $skill == ''){
            $error = "Field must not be Empty !!";
        }else{
            $query = "UPDATE tbl_user SET name = '$name', email = '$email', skill = '$skill' WHERE id = $id";
            $update = $db->update($query);
        }
    }
?>

<!-- delete query -->
<?php 
if(isset($_POST['delete'])){
    $query = "DELETE FROM tbl_user WHERE id = $id";
    $deleteData = $db->delete($query);
}
?>

<!-- Message -->
<?php 
    if(isset($error)){
        echo "<span style='color:red'>".$error."</span>";
    }
?>

<!-- table starts here -->
<form action="update.php?id=<?php echo $id; ?>" method="POST">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" value="<?php echo $getData['name'] ?>"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" value="<?php echo $getData['email'] ?>"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" value="<?php echo $getData['skill'] ?>"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="submit" value="Update">
            <input type="reset" value="Cancel">
            <input onclick="return confirm('Are you sure you want to delete this item?');" type="submit" name="delete" value="Delete">
        </td>
    </tr>
    
</table>
</form>
<!-- table ends here -->
<br>
<a href="index.php">Go To Back</a>

<?php include 'inc/footer.php'; ?>