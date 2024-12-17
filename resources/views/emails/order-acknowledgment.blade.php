<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Acknowledgment</title>
<style>
body {
font-family: Arial, sans-serif;
line-height: 1.6;
background-color: #f9f9f9;
margin: 0;
padding: 0;
}
.email-container {
width: 100%;
max-width: 600px;
margin: 20px auto;
background-color: #ffffff;
border: 1px solid #ddd;
border-radius: 5px;
overflow: hidden;
}
.email-header {
background-color: #007BFF;
color: #ffffff;
text-align: center;
padding: 20px 0;
font-size: 24px;
}
.email-body {
padding: 20px;
}
.email-body h2 {
color: #333;
margin-bottom: 10px;
}
.order-details {
margin: 20px 0;
}
.order-details table {
width: 100%;
border-collapse: collapse;
}
.order-details th, .order-details td {
text-align: left;
padding: 10px;
border: 1px solid #ddd;
}
.order-details th {
background-color: #f4f4f4;
}
.email-footer {
background-color: #f4f4f4;
text-align: center;
padding: 15px;
font-size: 14px;
color: #555;
}
.email-footer a {
color: #007BFF;
text-decoration: none;
}
</style>
</head>
<body>
<div class="email-container">
<div class="email-header">
Thank You for Your Order!
</div>
<div class="email-body">
<p>Dear {{ $delivery->name }},</p>
<p>We are thrilled to inform you that your order has been successfully placed! Below are the details of your order:</p>

        <h2>Order Details</h2>
        <div class="order-details">
            <table>
                <tr>
                    <th>Order Number</th>
                    <td>{{ $order->order_number }}</td>
                </tr>
                <tr>
                    <th>Order Date</th>
                    <td>{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <th>Delivery Address</th>
                    <td>{{ $delivery->address['address'] . ', ' . $delivery->address['city'] . ', ' . $delivery->address['state']}}</td>
                </tr>
            </table>
        </div>

        <h2>Items Ordered</h2>
        <div class="order-details">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p><strong>Total Amount:</strong> ${{ number_format($order->total, 2) }}</p>
        <p>Your order is now being processed, and we aim to deliver it within <strong>2 to 5 business days</strong>.</p>

        <p>If you have any questions, feel free to contact our support team:</p>
        <ul>
            <li>Email: <a href="mailto:admin@leenovative.com">admin@leenovative.com</a></li>
            <li>Phone: (123) 456-7890</li>
        </ul>

        <p>Thank you for choosing {{ config('app.name') }}. We hope you enjoy your purchase!</p>

        <p>Best regards,</p>
        <p>The {{ config('app.name') }} Team</p>
    </div>
    <div class="email-footer">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        <br>
        <a href="{{ config('app.url') }}">Visit Our Website</a>
    </div>
</div>

</body>
</html>
