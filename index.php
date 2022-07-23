<?php 

// INSERT YOUR DISCORD WEBHOOK HERE
$webhook = '';

// FUNCTION FOR THE CURL REQUEST
function webhook($webhook){
    $POST = ([ 
        'username' => 'Bot',
        "embeds" => [
            [
                "title" => "New message",
                "description" => "You have received a new message through your form",
                "color" => 11161343,
                "fields" => [
                    [
                        "name" => "Name:",
                        "value" => $_POST['name'],
                    ],
                    [
                        "name" => "E-Mail:",
                        "value" => $_POST['email'],
                    ],
                    [
                        "name" => "Description:",
                        "value" => $_POST['reason'],
                    ]
                ]
            ]
        ]
    ]);
    $headers = [ 'Content-Type: application/json; charset=utf-8' ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $webhook);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
    $response = curl_exec($ch);
};

// CHECKS IF BUTTON IS PRESSED
if(isset($_POST['submit'])){
    echo '<h1> Your request has been received </h1>';
    // EXECUTES FUNCTION
    webhook($webhook);
}
?>

<!DOCTYPE html>
<head>
    <title> Basic Contact Form to Discord </title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Full Name:</label>
        <input type="text" name="name"></input>
        <br>
        <label for="email">E-Mail:</label>
        <input type="email" name="email"></input>
        <br>
        <label for="reason">Reason:</label>
        <textarea name="reason"></textarea>
        <br>
        <button name="submit" type="submit">Submit</button>
    </form>
</body>
</html>