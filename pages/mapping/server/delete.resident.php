<?php
include '../../../php/includes.php';

$id = $form->input("id");

$house = table("tbl_resident")->where("rsdt_id = '$id'")->update([
    "house_id" => "null"
]);

response(true, "Successfully added");
