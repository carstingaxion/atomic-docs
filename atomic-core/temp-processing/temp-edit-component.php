<?php
//require '../../atomic-config.php';
require '../temp-functions/edit-component-functions.php';
require '../temp-functions/db-functions.php';
require '../temp-functions/validation.php';


global $compdb;
require "../fllat.php";

$compdb = new Fllat("components", "../db");

/*
var formData = {
    'catName': catName,
    'compName': $('input[name=compName]').val(),
    'compNotes': $('textarea[name=compNotes]').val(),
    'bgColor': $('input[name=bgColor]').val()
};*/


$newName = $_POST["newName"];
$catName = $_POST["catName"];
$compNotes = $_POST["compNotes"];
$bgColor = $_POST["bgColor"];

$oldName = $_POST["oldName"];



$errors = array();
$data = array();


/*if ($catName == $thisCat){
    $errors['different'] = ' <span class="u_textUnderline">'.$thisCat .' </span>correctly.';
}


if ($_POST['catName'] == "") {
    $errors['name'] = 'Input is required.';
}*/


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {








    dbUpdateComp($compdb, $oldName, $newName, $catName, $bgColor, $compNotes);
    renameCompFile($catName, $newName, $oldName);
    renameStylesFile($catName, $newName, $oldName);



    //update component comment string

    //update scss file name
    //update scss comment string
    //update scss cat root style import string




    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);


