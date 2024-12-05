<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <p>Hello Support,</p>

    <p>You have received a new message through the contact form. Below are the details:</p>

    <ul>
        <li><strong>Name:</strong> {{ $data['name'] }}</li>
        <li><strong>Subject:</strong> {{ $data['subject'] }}</li>
        <li><strong>Message:</strong> {{ $data['message'] }}</li>
    </ul>

    <p>Please follow up with the sender as needed.</p>

    <p>Best regards,</p>
    <p><strong>{{ config('app.name') }}</strong></p>
</body>
</html>
