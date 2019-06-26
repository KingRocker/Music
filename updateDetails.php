<?php
include("includes/includedFiles.php"); 
?>

<div class="userDetails">
    <div class="container borderBottom">
         <h2>EMAIL</h2>
         <input type="text" class="email" name="email" placeholder="Email  address.." value="<?php echo $userLoggedIn->getEmail(); ?>">
         <span class="message e"> </span>
         <button class="button p" onclick="updateEmail('email')">SAVE</button>
    </div>

    <div class="container">
         <h2>PASSWORD</h2>
         <input type="password" class="oldPassword" name="oldPassword" placeholder="Current password" value="">
         <input type="password" class="newPassword1" name="newPassword1" placeholder="New password" value="">
         <input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm password" value="">
         <span class="message"> </span>
         <button class="button p" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">SAVE</button>
    </div>
</div>