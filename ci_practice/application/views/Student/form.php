<? 
if ($method=='edit'){
    $path = "Student/editForm/$users->ID";
}else{
    $path = 'Student/showForm';
}
?>
<?
$attr = array(
    "id" => "frmInput",
    "name" => "frmInput"
);

echo form_open($path,$attr);
?>

<div class="form-group">
    <?
    $attr = array(
        "class" => "form-control form-control-user",
        "placeholder" => "รหัสนักศึกษา",
        "name" => "student_id",
        "id" => "student_id",
    );
    $student_id = is_object($users)?$users->STUDENT_ID:'';
    echo form_input($attr,$student_id);
    ?>
    <?
    $attr = array(
        "class" => "form-control form-control-user",
        "placeholder" => "ชื่อ",
        "name" => "student_name",
        "id" => "student_name",
    );
    $student_name = is_object($users)?$users->FIRSTNAME:'';
    echo form_input($attr,$student_name);
    ?>
    <?
    $attr = array(
        "class" => "form-control form-control-user",
        "placeholder" => "นามสกุล",
        "name" => "student_lastname",
        "id" => "student_lastname",
    );
    $student_lastname = is_object($users)?$users->LASTNAME:'';
    echo form_input($attr,$student_lastname);
    ?>
    <?
    $attr = array(
        "class" => "form-control form-control-user",
        "placeholder" => "เมลย์",
        "name" => "student_email",
        "id" => "student_email",
    );
    $student_email = is_object($users)?$users->EMAIL:'';
    echo form_input($attr,$student_email);
    ?>
    <?
    $attr = array(
        "class" => "form-control form-control-user",
        "placeholder" => "สาขา",
        "name" => "student_faculty",
        "id" => "student_faculty",
    );
    $user_id = is_object($users)?$users->FACULTY:'';
    $selected = set_value('student_faculty')?set_value('student_faculty'): $user_id;
    echo form_dropdown('student_faculty',$faculty,$selected,$attr);
    ?>
    <?
    $attr = array(
        "class" => "form-control form-control-user",
        "placeholder" => "เลือกวิชา",
        "name" => "student_program",
        "id" => "student_program",
    );
    $user_id = is_object($users)?$users->PROGRAM:'';
    $selected = set_value('student_faculty')?set_value('student_faculty'): $user_id;
    echo form_dropdown('student_program',$program,$selected,$attr);
    ?>
    <?php
    if ($this->session->flashdata("flash_errors")) {
        echo $this->session->flashdata("flash_errors");
    }
    ?>
    <?
        $attr = array(
            "class" => "btn btn-info",
            "value" => "saved",
            "name" => "btn-save",
            "id" => "btn-save"
        );
    echo form_submit($attr);
    echo form_close();
    ?>


</div>