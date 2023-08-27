<?php  
    include 'inc/config.php';
    $msg = "";
    if (isset($_POST['submit'])) {
        $first = mysqli_real_escape_string($connect, $_POST['first']);
        $last = mysqli_real_escape_string($connect, $_POST['last']);
        $amount1 = mysqli_real_escape_string($connect, $_POST['amount1']);
        $amount2 = mysqli_real_escape_string($connect, $_POST['amount2']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $address1 = mysqli_real_escape_string($connect, $_POST['address1']);
        $address2 = mysqli_real_escape_string($connect, $_POST['address2']);
        $company = mysqli_real_escape_string($connect, $_POST['company']);
        $job = mysqli_real_escape_string($connect, $_POST['job']);
        $country = mysqli_real_escape_string($connect, $_POST['country']);
        $city = mysqli_real_escape_string($connect, $_POST['city']);
        $solution = mysqli_real_escape_string($connect, $_POST['solution']);
        $receiver = mysqli_real_escape_string($connect, $_POST['receiver']);
        $comments = mysqli_real_escape_string($connect, $_POST['comment']);
        $date = date("d:M:Y h:i:sa");

        $insert = mysqli_query($connect, "INSERT INTO complaints (first, last, usd_amount, crypto_amount, email, phone, adress, bit_address,company, job, country, city, solution, receiver, comments, date) VALUES ('$first', '$last', '$amount1', '$amount2', '$email', '$phone', '$address1', '$address2', '$company', '$job', '$country', '$city', '$solution', '$receiver', '$comments', '$date')");
        if ($insert) {
            $msg = "<div class='text-center text-success'>Message Sent</div>";
        }
        else{
            $msg = "Error! Try Again.";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <?php include 'inc/link.php'; ?>
</head>
<body>
    <?php echo $msg; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="first" required="required" placeholder="First Name">
        <input type="text" name="last" placeholder="Last Name" required="required">
        <input type="number" name="amount1" placeholder="Amount of USD/CAD lost" required="required">
        <input type="number" name="amount2" placeholder="Amount of crypto lost" required="required">
        <input type="email" name="email" placeholder="Email" required="required">
        <input type="number" name="phone" placeholder="Phone Number">
        <input type="text" name="address1" placeholder="Your Bitcoin Address" required="required">
        <input type="text" name="address2" placeholder="Address you Sent Bitcoin to" required="required">
        <input type="text" name="company" placeholder="Company" required="required">
        <input type="text" name="job" placeholder="Job Title">
        <input type="text" name="country" placeholder="Country/Region" required="required">
        <input type="text" name="city" placeholder="City" required="required">
        <input type="text" name="solution" placeholder="Solutions">
        <input type="text" name="receiver" placeholder="Who you sent your coin to" required="required">

        <textarea name="comment" placeholder="Comments"></textarea>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>

</body>
</html>