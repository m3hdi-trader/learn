<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email Form</title>
</head>
<body>
    <div>
        <form action="1.php" method="post">
            <input type="text" placeholder="name" name="name">
            <br>
            <br>
            <input type="email" placeholder="email" name="email">
            <br>
            <br>
            <input type="text" placeholder="subject" name="subject">
            <br>
            <br>
            <textarea name="message" placeholder="message"></textarea>
            <br>
            <br>
            <button type="submit">send email</button>
        </form>
    </div>
</body>
</html>