<?PHP
$message = "";
function sendMessage(){
    $heading = array(
    "en" => $_POST["title"]
        );
    $content = array(
        "en" => $_POST["message"]
        );

    $fields = array(
        'app_id' => "ff8265e7-bdc5-485d-80c9-9759d6a96a5b",
        'included_segments' => array('All'),
        'data' => array("foo" => "bar"),
        'large_icon' =>"ic_launcher_round.png",
        'contents' => $content
    );

    $fields = json_encode($fields);
print("\nJSON sent:\n");
print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                               'Authorization: Basic ZWZkYjRmN2UtN2YwMi00MWM1LThmZmQtMjliZmNlNmM2ZTli'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$response = sendMessage();
$return["allresponses"] = $response;
$return = json_encode( $return);
print("\n\nJSON received:\n");
print($return);
print("\n");
?>
<html>
<body>
<meta http-equiv="refresh" content="1;url=index.html" />
</body>
</html>
