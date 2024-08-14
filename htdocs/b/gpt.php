<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <h1>chate avec moi </h1>

    <?php
    function callOpnAI($message)
    {
        $openai_endpoint = "#";
        $openai_token = "#";
        $data = array(
            "model" => "#",
            "messages" => array(
                array(
                    "role" => "system",
                    "content" => "Vous parler avec chatGPT"
                ),
                array(
                    "role" => "user",
                    "content" => $message
                )
            ),
            "max-tokens" => 100,
            "temperature" => 0.7
        );
        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer " . $openai_token
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $openai_endpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    if (isset($_POST['message']) && isset($_POST['ok'])) {
        $message = $_POST['message'];
        $response = callOpnAI($message);
        $data = json_decode($response, true);
        var_dump($data);
    }
    ?>
    <form method="POST">
        <input type="text" name="message" placeholder="entre un message" required />
        <input type="submit" name="ok" value="envoie" />
    </form>
</body>

</html>