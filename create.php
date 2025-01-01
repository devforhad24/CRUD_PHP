<?php include 'inc/header.php'; ?>
<?php include 'config.php'; ?>
<?php include 'Database.php'; ?>


<!-- Data Post -->
<?php 
    $db = new Database();
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($db->link,$_POST['name']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

        if($name == '' || $email == '' || $skill == ''){
            $error = "Field must not be Empty !!";
        }else{
            $query = "INSERT INTO tbl_user(name,email,skill) VALUES ('$name','$email','$skill')";
            $create = $db->insert($query);
        }
    }
?>

<!-- Message -->
<?php 
    if(isset($error)){
        echo "<span style='color:red'>".$error."</span>";
    }
?>

<!-- table starts here -->
<form action="create.php" method="POST">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Plase enter name"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="email" placeholder="Plase enter email"></td>
    </tr>
    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" placeholder="Plase enter skill"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Cancel">
        </td>
    </tr>
    
</table>
</form>
<!-- table ends here -->
<br>
<a href="index.php">Go To Back</a>

<?php include 'inc/footer.php'; ?>