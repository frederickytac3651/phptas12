<?php
$name = $age = $gender = $email = $address = $contact = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);
    $contact = trim($_POST["contact"]);

    if ($name == "" || $age == "" || $gender == "" || $email == "" || $address == "" || $contact == "") {
        $error = "Please fill in all fields.";
    } elseif ($age < 1 || $age > 100) {
        $error = "Please enter a valid age.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email.";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $contact)) {
        $error = "Contact number must contain 10-11 digits.";
    } else {
        echo "<h2>Registration Successful!</h2>";
        echo "Name: $name<br>";
        echo "Age: $age<br>";
        echo "Gender: $gender<br>";
        echo "Email: $email<br>";
        echo "Address: $address<br>";
        echo "Contact: $contact";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">
    <h2>Registration Form</h2>

    <?php if ($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>

        <input type="number" name="age" placeholder="Age" min="1" max="100" required>

        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="email" name="email" placeholder="Email" required>

        <input type="text" name="address" placeholder="Address" required>

        <input type="tel" name="contact" placeholder="Contact Number"
               pattern="[0-9]{10,11}" required>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>