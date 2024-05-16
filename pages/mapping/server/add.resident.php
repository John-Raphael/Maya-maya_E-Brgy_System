<?php
include '../../../php/includes.php';

$id = $form->input("coordinates_id");
$resident_id = $form->input("resident_id");

if($resident_id == ""){
    response(false,"Resident Id is required");
}

$house = table("tbl_houses")->where("coordinates_id = $id")->load();

if (count($house) == 0) {
    response(false, "House not found");
}

$houseDetails = $house[0];

$house_id = $houseDetails["id"];

$house = table("tbl_resident")->where("rsdt_id = '$resident_id'")->update([
    "house_id" => "$house_id"
]);

response(true,"Successfully added"); 