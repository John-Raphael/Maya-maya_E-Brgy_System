<?php
include '../../../php/includes.php';

$id = $form->input("osm_id");

$house = table("tbl_houses")->where("coordinates_id = $id")->load();

if (count($house) > 0) {
    response(false, "House is already saved.");
}

$coordinates = $form->input("lat").",".$form->input("lon");
$address = $form->input("display_name");
table("tbl_houses")->store([
    "coordinates_id" => $id,
    "address" => $address,
    "coordinates" => $coordinates
]);

response(true,"");
