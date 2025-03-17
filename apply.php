<!DOCTYPE html>
<html lang="vi">
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
<form method="post" action="process_eoi.php">
    <fieldset>
        <legend>Job reference number</legend>
    <br>
    <input type="text" placeholder="J97" maxlength="5" pattern="[a-zA-Z0-9]+" required="required" name="Job reference number" >
</fieldset><br>
    <br>
    <fieldset>
        <legend>Name:</legend>
<br>
    <input type="text" placeholder=" First name" size="50" width="50"  required="required" maxlength="20" name="First Name" />   
    <br>
    <br>
    <br>
    <input type="text" placeholder=" Last name" size="50" width="50"  required="required"  maxlength="20" name="Last name" /> 
</fieldset>
    <br>
    <br>
    <fieldset>
        <legend>Date of birth</legend>
    <br>
    <input type="date" placeholder=" dd/mm/yyyy"  required="required" size="50" width="50" name="date"/>  
</fieldset>
    <br>
    <fieldset>
        <legend>Gender:</legend>
        
    <input type="radio"  required="required" name="Gender"><i id="gioitinh"> Male </i> 
    <input type="radio"  name="Gender"> <i id="gioitinh"> Female </i>
     <input type="radio" name="Gender"><i id="gioitinh"> Others </i> <br>
</fieldset>
<br>
<fieldset>
    <legend>Street Address</legend>
<br>
<input type="text" size="50" width="50"  maxlength="40" name="Street Address"  required="required" />
</fieldset>
<br>
<fieldset>
<legend>Suburb/town</legend>
<br>
<input type="text" size="50" width="50"  maxlength="40" name="Suburb/town" required="required"/>
</fieldset>
<br>
<br>
<label>State: </label>
<select name="State" required="required" >
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
    <input type="text" placeholder=" 2wn9hxh1" size="4" width="50" required="required" pattern="[0-9]+" name="PostCode"  required="required" />   <br>
    <br>
    <label>E-mail: </label>
    <br><br><br>
    <input type="email" placeholder=" nguyenluongthien@gmail.com" name="E-mail"  required="required" />
    <br>
    <br>
    <div>  
    <label>Phone number</label>
    <br><br><br>
    <input type="text" placeholder=" 0464398624t4" maxlength="12" pattern="[0-9 ]{8,12}" name="Phone number"  required="required" />
    <br>
    <br>
    <fieldset>
        <legend>Skill list</legend>
        <input type="checkbox" name="Skills[]"><i id="kynang"> Team Work </i>
        <br>
        <input type="checkbox" name="Skills[]"><i id="kynang"> Marketing </i>
        <br>
         <input type="checkbox" name="Skills[]"><i id="kynang"> Microsoft </i><br>
         <br>
         <fieldset>
            <legend>Other skills: </legend>
         <br>
         <textarea 
         name="Skills[]"
         rows="10"
         cols="30S"
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


