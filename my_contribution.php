<?php
// 1. Connection (Replace with your database details)
$conn = mysqli_connect("localhost", "root", "", "your_database_name");

// 2. INSERT LOGIC (Save Button)
if(isset($_POST['save'])) {
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "INSERT INTO form (emp_name, emp_gender, emp_email, emp_department, emp_address) 
              VALUES ('$name', '$gender', '$email', '$department', '$address')";

    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data saved into Database');</script>";
    }
}

// 3. UPDATE LOGIC (Modify Button)
if(isset($_POST['update'])) {
    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $email      = $_POST['email'];
    $department = $_POST['department'];
    $address    = $_POST['address'];

    $query = "UPDATE form SET emp_name = '$name', emp_gender = '$gender', 
              emp_email = '$email', emp_department = '$department', 
              emp_address = '$address' WHERE id = '$id'";

    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Record Updated')</script>";
    }
}
?>

<script>
    function checkdelete() {
        return confirm('Are you sure you want to delete this record?');
    }
</script>

<div class="btn-container">
    <input type="submit" name="save" value="Save" style="background-color: green;">
    <input type="submit" name="update" value="Modify" style="background-color: orange;">
    <input type="submit" name="delete" value="Delete" style="background-color: red;" onclick="return checkdelete()">
    <input type="reset" value="Clear" style="background-color: blue;">
</div>