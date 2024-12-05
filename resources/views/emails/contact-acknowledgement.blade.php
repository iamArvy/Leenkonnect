<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Acknowledgment</title>
</head>
<body>
    <p>Dear {{ $user['name'] }},</p>

    <p>Thank you for reaching out to us. We have received your message and will get back to you as soon as possible. Below is a summary of the information you provided:</p>

    <ul>
        <li><strong>Name:</strong> {{ $user['name'] }}</li>
        <li><strong>Email:</strong> {{ $user['email'] }}</li>
        <li><strong>Message:</strong> {{ $user['message'] }}</li>
    </ul>

    <p>Our team is working hard to address your inquiry, and you can expect a response within 24-48 hours. If your matter is urgent, please reply to this email or contact us at <a href="mailto:support@example.com">support@example.com</a>.</p>

    <p>Thank you for your patience and trust in us.</p>

    <p>Best regards,</p>
    <p><strong>Your Company Name</strong></p>
    <p>
        <a href="https://example.com">Visit our website</a> |
        <a href="mailto:support@leenkonnect.com">Contact Support</a>
    </p>
</body>
</html>
