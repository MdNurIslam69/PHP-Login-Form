<?php

$allowGenders = ["Male", "Female", "Others"];
$allowSkills = ["HTML", "CSS", "JS", "PHP", "Python"];
$countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czechia", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Federated States of Micronesia", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "North Macedonia", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestine, State of", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Martin", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Sint Maarten", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Timor-Leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Türkiye", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States", "Uzbekistan", "Vanuatu", "Venezuela", "Viet Nam", "Virgin Islands, British", "Virgin Islands, U.S.", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"];


if (isset($_POST['signUp'])) {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $gender = $_POST['gender'] ?? null;
    $skills = $_POST['skills'] ?? [];
    $countryName = $_POST['country'];
    $password = $_POST['pass'];






    // <!-- Name section  -->

    if (empty($userName)) {
        $userErr = "<span style= 'color: red' >Name is Required</span>";
    } elseif (!preg_match("/^[A-Za-z\. -]*$/", $userName)) {
        $userErr = "<span style= 'color: red' >Only Number & Space Allowed</span>";
    } elseif (strlen($userName) < 4) {
        $userErr = "<span style= 'color: red' >input minimum 4 digit</span>";
    } else {
        $userCorrect = serialize($userName);
    }


    // <!-- Email section  -->

    if (empty($userEmail)) {
        $emailErr = "<span style= 'color: red' >Email is Required</span>";
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "<span style= 'color: red' >Invalid Email</span>";
    } else {
        $emailCorrect = serialize($userEmail);
    }



    // <!-- Gender section  -->

    if (empty($gender)) {
        $genderErr = "<span style= 'color: red' >Please Choose Your Gender</span>";
    } elseif (!in_array($gender, $allowGenders)) {
        $genderErr = "<span style= 'color: red' >Invalid Gender</span>";
    } else {
        $genderCorrect = serialize($gender);
    }



    // <!-- Skill section  -->

    if (count($skills) == 0) {
        $skillsErr = "<span style= 'color: red' >Please Select At Least 2 Skill</span>";
    } else {
        foreach ($skills as $skill) {
            if (!in_array($skill, $allowSkills)) {
                $skillsErr = "<span style= 'color: red' >Invalid Skills</span>";
                $skillCorrect = [];
                break;
            } else {
                $skillCorrect[] = serialize($skill);
            }
        }
    }


    // <!-- Country section  -->
    if (empty($countryName)) {
        $countryErr = "<span style= 'color: red' >Please Select Your Country</span>";
    } elseif (!in_array($countryName, $countries)) {
        $countryErr = "<span style= 'color: red' >Invalid Country</span>";
    } else {
        $countryCorrect = serialize($countryName);
    }


    // <!-- Password section  -->
    if (empty($password)) {
        $passwordErr = "<span style= 'color: red' >Please Provide Password</span>";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*+\?])[A-Za-z0-9 !@#$%^&*+\?]{8,}$/', $password)) {
        $passwordErr = "<span style= 'color: red' >Provide Strong Password</span>";
    } else {
        $passwordCorrect = serialize($password);
    }


    // echo section / its for all input data show in display

    if (isset($userName) && isset($userEmail) && isset($gender) && isset($skills) && isset($countryName) && isset($password)) {
        $showData = "Name:~ $userName  <br>
                     Email:~ $userEmail  <br>
                     Gender:~ $gender  <br>
                     Skills:~ " . implode(", ", $skills) . "  <br>
                     Country:~ $countryName  <br>
                     Password:~ $password  <br> ";


        $userName =  $userEmail = $gender = $skills = $countryName = $password = null;
        $userCorrect = $emailCorrect = $genderCorrect = $skillCorrect = $countryCorrect = $passwordCorrect = null;
    }
}
?>


<style>
fieldset {
    border-radius: 15px;
    border: 2px double purple;

}

h3 {
    font-size: 34px;
    text-decoration: underline;
}

.form-div {
    display: inline-block;
    margin: auto;
    justify-content: center;
    display: grid;
}

.showData-div {
    margin-top: 30px;
    color: green;
}

button {
    margin: auto;
    display: grid;
    padding: 8px 25px;
    background-color: aqua;
    border-radius: 10px;
    cursor: pointer;
    font-size: 13px;
}

button:hover {
    background-color: black;
    color: white;
    transition: 1s;
}
</style>

<div class="form-div">

    <fieldset>
        <legend>
            <h3>PHP Login Form</h3>
        </legend>


        <form action="" method="post">


            <!-- Name section  -->

            <label for="">Your Name:~ <span style="color:red">*</span></label>
            <input type="text" placeholder="Your Name" Name="userName" value="<?= $userName ?? null ?>">
            <?= $userErr ?? null  ?>
            <br><br>


            <!-- Email section  -->

            <label for="">Your Email:~<span style="color:red">*</span></label>
            <input type="text" placeholder="Your Email" Name="userEmail" value="<?= $userEmail ?? null ?>">
            <?= $emailErr ?? null  ?>
            <br><br>


            <!-- Gender section  -->

            <label for="">Your Gender:~<span style="color:red">*</span></label>
            <input type="radio" name="gender" value="Male"
                <?= isset($gender) && $gender == "Male" ? "checked" : null ?> />Male
            <input type="radio" name="gender" value="Female"
                <?= isset($gender) && $gender == "Female" ? "checked" : null ?>>Female
            <input type="radio" name="gender" value="Others"
                <?= isset($gender) && $gender == "Others" ? "checked" : null ?>>Others
            <?= $genderErr ?? null  ?>
            <br><br>


            <!-- Skill section  -->

            <label for="">Your Skills:~<span style="color:red">*</span></label>
            <input type="checkbox" value="HTML" name="skills[]"
                <?= isset($skills) && in_array("html", $skills) ? "checked" : null ?> />HTML
            <input type="checkbox" value="CSS" name="skills[]"
                <?= isset($skills) && in_array("css", $skills) ? "checked" : null ?> />CSS
            <input type="checkbox" value="JS" name="skills[]"
                <?= isset($skills) && in_array("js", $skills) ? "checked" : null ?> />JS
            <input type="checkbox" value="PHP" name="skills[]"
                <?= isset($skills) && in_array("php", $skills) ? "checked" : null ?> />PHP
            <input type="checkbox" value="Python" name="skills[]"
                <?= isset($skills) && in_array("python", $skills) ? "checked" : null ?> />Python
            <?= $skillsErr ?? null  ?>
            <br><br>


            <!-- Country section  -->

            <label for=""> Choose Your Country:~<span style="color:red">*</span></label>
            <select name="country">
                <option value="">Select Country</option>
                <?php foreach ($countries as $allCountryName) { ?>
                <option value="<?= $allCountryName ?>"
                    <?= isset($countryName) && $countryName == $allCountryName ? "selected" : null ?>>
                    <?= $allCountryName ?></option>
                <?php } ?>
            </select>
            <?= $countryErr ?? null  ?>
            <br><br>


            <!-- Password section  -->

            <label for="">Your Password:~<span style="color:red">*</span></label>
            <input type="password" name="pass" placeholder="Write Your Password" />
            <?= $passwordErr ?? null  ?>
            <br><br>


            <!-- Sign Up/Button section  -->

            <button type="submit" name="signUp">Sign Up</button>

        </form>
    </fieldset>

    <!-- echo section / its for all input data show in display   -->
    <div class=" showData-div ">
        <?= $showData ?? null ?>
    </div>
</div>