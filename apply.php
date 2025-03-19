<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.inc';
?>
<body class="apply-body">
    <?php
        include 'menu.inc';
    ?>
    <h1> Job Application Form </h1>
    <fieldset id="WebL">
    <p id="p1">Please Fill out the form Bellow to submit Your Job Application!</p>
    <br>
    <br>
<form method="POST" action="process_eoi.php">
    <fieldset>
        <legend>Job reference number</legend>
    <br>
    <input type="text" placeholder="J97" maxlength="5" pattern="[a-zA-Z0-9]+" required="required" name="job_ref" id="job_ref" >
</fieldset><br>
    <br>
    <fieldset>
        <legend>Name:</legend>
<br>
    <input type="text" placeholder=" First name" size="50" width="50"  required="required" maxlength="20" name="first_name" id="first_name" />   
    <br>
    <br>
    <br>
    <input type="text" placeholder=" Last name" size="50" width="50"  required="required"  maxlength="20" name="last_name" id="last_name"/> 
</fieldset>
    <br>
    <br>
    <fieldset>
        <legend>Date of birth</legend>
    <br>
    <input type="date" placeholder=" dd/mm/yyyy"  required="required" size="50" width="50" name="dob" id="dob"/>  
</fieldset>
    <br>
    <fieldset>
        <legend>Gender:</legend>
        
    <input type="radio"  required="required" name="gender" value="Male"><i id="gender"> Male </i> 
    <input type="radio"  name="gender" value="Female"> <i id="gender"> Female </i>
     <input type="radio" name="gender" value="Others"><i id="gender"> Others </i> <br>
</fieldset>
<br>
<fieldset>
    <legend>Street Address</legend>
<br>
<input type="text" size="50" width="50"  maxlength="40" name="street"  required="required" id="street"/>
</fieldset>
<br>
<fieldset>
<legend>Suburb/town</legend>
<br>
<input type="text" size="50" width="50"  maxlength="40" name="suburb" required="required" id="suburb"/>
</fieldset>
<br>
<br>
<label for="state">State: </label>
<select name="state" required="required" id="state" >
    <option value="">Please select your State</option>
    <option value="VIC">VIC </option>
    <option value="NSW">NSW</option>
    <option value="QLD">QLD</option>
    <option value="NT">NT</option>
    <option value="WA">WA</option>
    <option value="SA">SA</option>
    <option value="TAS">TAS</option>
    <option value="ACT">ACT</option>
</select>
<br>
<br>
<br>
    <label>PostCode: </label>
    <br>
    <br>
    <br>
    <input type="text" placeholder=" 2wn9hxh1" size="4" width="50" required="required" pattern="[0-9]+" name="postcode"  required="required" id="postcode"/>   <br>
    <br>
    <label>E-mail: </label>
    <br><br><br>
    <input type="email" placeholder=" nguyenluongthien@gmail.com" name="email"  required="required" id="email"/>
    <br>
    <br>
    <div>  
    <label>Phone number</label>
    <br><br><br>
    <input type="text" placeholder=" 0464398624t4" maxlength="12" pattern="[0-9 ]{8,12}" name="phone"  required="required" id="phone"/>
    <br>
    <br>
    <fieldset>
        <legend>Skill list</legend>
        <input type="checkbox" name="skills[]" value="Team Work"><i id="kynang"> Team Work </i>
        <br>
        <input type="checkbox" name="skills[]" value="Marketing"><i id="kynang"> Marketing </i>
        <br>
         <input type="checkbox" name="skills[]" value="Microsoft"><i id="kynang"> Microsoft </i><br>
         <br>
         <fieldset>
            <legend>Other skills: </legend>
         <br>
         <textarea 
         name="other_skills"
         rows="10"
         cols="30"
         id="other_skills"
         >
          
         </textarea>
        </fieldset>
    </fieldset>
</div>  
<br>
<br>
<div>
    <label>Applied Position: </label>
    <select name="Applied Position">
        <option value="">Please select your Position you want to apply</option>
        <option value="Web developer">Web developer </option>
        <option value="DEV">DEV</option>
        <option value="DES">DES</option>
        <option value="Full stacks">Full stacks</option>
        <option value="FE">FE</option>
        <option value="Be">Be</option>
    </select>
    </div>
    <br>
    <br>
<div>
    <label>Earliest Possible Start Date</label><br>
    <br>
    <input type="date" placeholder=" 07/12/2005"  required="required" /> 
</div>
<br>
<br>
<h2>Preferred Interview Date</h2><br>
<div>
<h2>Cover Letter</h2>
<textarea
 width="100" type="text"
name="Cover Letter"
rows="10"
cols="30"
>
 </textarea>
</div><br>
<label><b>Upload Resume</b></label><br>
<br>
<input type="file" name="file Upload"/> 
<br>
<br>
<label><b>Any Other Documents to Upload</b></label><br>
<br>
<input type="file" name="Any other Documents to Upload" />
<br>
<br>
<br>
<div class="form-group">
    <input type="submit" value="Apply">
</div>
</form>
<br>
<br><br><br>
</fieldset>
<?php
    include 'footer.inc'
    ?>
</body>


