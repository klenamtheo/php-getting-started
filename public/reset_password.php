<<<<<<< HEAD
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

$conn = new mysqli("mysql.railway.internal:3306", "root", "azahvcXSSjjpUmAUKyInCnkIFBLbIFCB", "railway");

$data = json_decode(file_get_contents("php://input"));
$ghana_card_id = $data->ghana_card_id;
$new_password = password_hash($data->new_password, PASSWORD_DEFAULT);

$check = $conn->prepare("SELECT id FROM users WHERE ghana_card_id=?");
$check->bind_param("s", $ghana_card_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $update = $conn->prepare("UPDATE users SET password=? WHERE ghana_card_id=?");
    $update->bind_param("ss", $new_password, $ghana_card_id);
    $update->execute();

    echo json_encode(["success" => true, "message" => "Password reset successful"]);
} else {
    echo json_encode(["success" => false, "message" => "User not found"]);
}
?>
=======
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

$conn = new mysqli("mysql.railway.internal:3306", "root", "azahvcXSSjjpUmAUKyInCnkIFBLbIFCB", "railway");

$data = json_decode(file_get_contents("php://input"));
$ghana_card_id = $data->ghana_card_id;
$new_password = password_hash($data->new_password, PASSWORD_DEFAULT);

$check = $conn->prepare("SELECT id FROM users WHERE ghana_card_id=?");
$check->bind_param("s", $ghana_card_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $update = $conn->prepare("UPDATE users SET password=? WHERE ghana_card_id=?");
    $update->bind_param("ss", $new_password, $ghana_card_id);
    $update->execute();

    echo json_encode(["success" => true, "message" => "Password reset successful"]);
} else {
    echo json_encode(["success" => false, "message" => "User not found"]);
}
?>
>>>>>>> 456926ceeedd7c6aa49ef1c9c6869df3e1f8f8b6
