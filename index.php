

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
        // $comments = mysqli_real_escape_string($connect, $_POST['comment']);
        $sign = mysqli_real_escape_string($connect, $_POST['sign']);
        $role = mysqli_real_escape_string($connect, $_POST['role']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);
        $hash = mysqli_real_escape_string($connect, $_POST['hash']);
        $call = mysqli_real_escape_string($connect, $_POST['call']);
        $date = date("d:M:Y h:i:sa");

        $insert = mysqli_query($connect, "INSERT INTO complaints (first, last, usd_amount, crypto_amount, email, phone, adress, bit_address, company, job, country, city, solution, receiver, description, sign, role, hash, cal, date) VALUES ('$first', '$last', '$amount1', '$amount2', '$email', '$phone', '$address1', '$address2', '$company', '$job', '$country', '$city', '$solution', '$receiver', '$description', '$sign', '$role', '$hash', '$call', '$date')");
        if ($insert) {
            $msg = "<div class='text-center text-success' style='text-align: center'>Message Sent</div>";
        }
        else{
            $msg = "<div class='text-center text-danger' style='text-align: center'>Error! Try Again.</div>";
        }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECLAIM CRYPTO</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/jpg" href="admin/upload/<?php 
    $sql = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
            while ( $rw = mysqli_fetch_array($sql)) {
                echo $rw['image'];    
                }
            ?>">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 id="title">
                Submit a case. Get a quote.
            </h1>
            <p id="description">
                We care about your crypto contact us today!!!
            </p>
        </header>
        <?php echo $msg; ?>
        <form method="post" enctype="multipart/form-data">
            <!-- First Name Section -->
            <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text"
                name="first" id="firstname" placeholder="Enter Your FirstName" class="formControl"  required="required">
            </div>
            <!-- End Of First Name Section -->

            <!-- Last Name Section -->
            <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text"
                name="last" id="lastname" placeholder="Enter Your LastName" class="formControl"  required>
            </div>
            <!-- End Of Last Name Section -->

            <!-- USD Lost Section -->
            <div class="form-group">
                <label for="USD lost">Amount of USD/CAD lost</label>
                <input type="number"
                name="amount1" id="usdlost" class="formControl" placeholder="$100,000 USD" required>
            </div>
            <!-- End Of USD Lost Section -->

            <!-- Crypto Lost -->
            <div class="form-group">
                <label for="crypto lost">Amount of Crypto Lost</label>
                <input type="number"
                name="amount2" id="cryptolost" class="formControl" placeholder="1btc" required>
            </div>
            <!-- End OF Crypto Lost-->

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                name="email" id="email" class="formControl" placeholder="jack@gmail.com" required>
            </div>
            <!-- End Of Email-->

            <!-- Number -->
            <div class="form-group">
                <label for="number">Phone number</label>
                <input type="number"
                name="phone" id="number" class="formControl" placeholder="(123) 456-789" required>
            </div>
            <!-- End Of NUmber-->

            <!-- Bitcoim Address -->
            <div class="form-group">
                <label for="address">Your Bitcoin Address</label>
                <input type="text"
                name="address1" id="address" class="formControl" placeholder="1A1zP5Qefi2DMPTfTL5SLmv7DivfNa" required>
            </div>
            <!-- End Address -->

            <!-- Address Sent-->
            <div class="form-group">
                <label for="adsent">Address you sent coins to</label>
                <input type="text"
                name="address2" id="adsent" class="formControl"  placeholder="1A1zP5Qefi2DMPTfTL5SLmv7DivfNa" required >
            </div>
            <!-- End Of Address Sent-->

             <!-- Company -->
             <div class="form-group">
                <label for="company">Company</label>
                <input type="text"
                name="company"  placeholder="Enter the Name of the Company" id="company" class="formControl"  required>
            </div>
            <!-- End Of Company -->

             <!-- Job -->
             <div class="form-group">
                <label for="job">Job Title</label>
                <input type="text"
                name="job" id="job" placeholder="Enter The Job Title" class="formControl"  required>
            </div>
            <!-- End Of Job -->

             <!--Region-->
             <div class="form-group">
                <label for="region">Country/Region</label>
                <input type="text"
                name="country" id="region" placeholder="Enter Your Country/Region" class="formControl"  required>
            </div>
            <!-- End Of Region-->

             <!--City-->
             <div class="form-group">
                <label for="city">City</label>
                <input type="text"
                name="city" id="city"  placeholder="Enter Your City" class="formControl"  required>
            </div>
            <!-- End Of City-->

           

            <!-- Select Section -->
            <div class="form-group">
                <p id="quest">Support Request Type</p>
                <select name="solution" id="dropdown" class="formControl" required>
                <option disabled selected>Please Select</option>
                <option>Wallet Recovery</option>
                <option>Swim Swap Attack</option>
                <option>Fake Ponzi Scheme</option>
                <option>Ransomeware Attack</option>
                <option>Cross Chain Recovery</option>
                <option>Crypto Exchange Support Subpoena</option>
                <option>Deceased Beneficiary Custody Transfer</option>
                <option>Fraud/ Corruption Prevention and Detect</option>
              
                </select>
            </div>
            <!-- End Select Section-->

            <!-- Report Section-->
            <div class="form-group">
                <p id="quest">Are you reporting on behalf of a business ?</p>
                <select name="role" id="dropdown" class="formControl" required>
                <option disabled selected>Yes/No</option>
                <option>Yes</option>
                <option>No</option>
                </select>
            </div>
            <!-- End Report Section-->

            <!-- Description  Section -->
            <div class="form-group">
                <p id="quest">Description of Incident</p>
                <textarea name="description" id="description" cols="30" rows="5" class="textarea" placeholder="Someone told me to send 1BTC and they will send me 2btc back" required ></textarea>
            </div>
            <!-- End Of Decription Section-->

            <!-- Info subj section-->
            <div class="form-group">
                <p id="quest">Information About The Subject(s) Who Victimized You</p>
                <textarea name="receiver" id="subject" cols="30" rows="5" class="textarea" placeholder="Usernames, Emails, Phone Numbers" ></textarea>
            </div>
            <!-- end Info subj section-->

            <!-- Transaction Hash ID-->
            <div class="form-group">
                <p id="quest">Transaction Hash ID</p>
                <textarea name="hash" id="hash" cols="30" rows="8" class="textarea" placeholder="The transaction ID associated with your incident
                
                000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f" ></textarea>
            </div>
            <!-- End Transaction Hash ID-->


            <!-- CALL section-->
            <div class="form-group">
                <p id="quest">Best Time To Call</p>
                <select name="call" id="dropdown" class="formControl" required>
                <option disabled selected>--Select One --</option>
                <option>Morning</option>
                <option>Afternoon</option>
                <option>Evening</option>
                </select>
            </div>
            <!-- CALL section-->
            <!-- Textarea Section -->
            <div class="form-group">
                <p id="quest">Digital Signature</p>
                <textarea name="sign" id="sign" cols="30" rows="5" class="textarea" placeholder="Jack John" required ></textarea>
            </div>
            <!-- End Of Textarea Section-->

            <!-- Submit Section-->
            <div class="form-group">
                <button type="submit" name="submit" id="submit"
                class="btn">Submit</button>
            </div>
            <!-- End Of Submit Section-->
        </form>
    </div>
</body>
</html>
