

<?php 
//Utilities::details($profile->getAllDepartments());
$DepartmentOptions="";

foreach ($profile->getAllDepartments() as $department) {
    if($department['department']==$formReader->department)
    {
        $SelectedString="selected";
    }else
    {
        $SelectedString="";
    }
    $DepartmentOptions .="<option value='{$department['department']}' $SelectedString>{$department['department']}</option>";
}



?>
<div id="searchform">
<div style="text-align: center;">
    <h2> Search </h2>
</div>
<form action="search.php" method="GET">
<div id="search_fields">
    
    <div id="row"> <div id="cell">User Name </div> <div id="cell"><input type="text" name="username" value="<?php print $formReader->username; ?>"></div> </div>


    <div id="row"> <div id="cell">First Name </div> <div id="cell"> <input type="text" name="first_name" value="<?php print $formReader->first_name; ?>"></div> </div>
    <div id="row"> <div id="cell">Last Name </div> <div id="cell"><input type="text" name="last_name" value="<?php print $formReader->last_name; ?>"></div> </div>
    <div id="row"> <div id="cell">Full Name </div> <div id="cell"><input type="text" name="full_name" value="<?php print $formReader->full_name; ?>"></div> </div>
    <div id="row"> <div id="cell">Department </div> <div id="cell">
    
    <select name="department">
<?php print $DepartmentOptions;?>
</select>
    
    </div> </div>
    <div id="row"> <div id="cell"> Title</div> <div id="cell"> <input type="text" name="title" value="<?php print $formReader->title; ?>"></div> </div>
    <div id="row"> <div id="cell">Description </div> <div id="cell"><input type="text" name="description" value="<?php print $formReader->description; ?>"></div> </div>
<?php 
$genderFemale="";
$genderMale="";
    if($formReader->gender=="M")
    {
        $genderMale = "checked";
    }

if($formReader->gender=="F")
    {
        $genderFemale = "checked";
    }

    
?>
    <div id="row"> <div id="cell">Gender </div> <div id="cell">
        <input type="radio" name="gender" value="M" <?php print $genderMale; ?>>Male 
        <input type="radio" name="gender" value="F" <?php print $genderFemale;?>>Female
    </div> </div>
    
</div>
<div style="text-align: center;">
    <input type="submit" name="Search" id="search" value="Search">
</div>
 
</form>
 
</div>