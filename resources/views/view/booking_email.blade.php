<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Booking Confirmation</h2>
        </div>

        <div class="content">
            <p>Dear <strong>{{ $booking->guest->name }}</strong>,</p>

            <p>Thank you for your booking! Below are your booking details:</p>

            <table width="100%" border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td><strong>Room Number:</strong></td>
                    <td>{{ $booking->room->room_number }}</td>
                </tr>
                <tr>
                    <td><strong>Check-in Date:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Check-out Date:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Total Price:</strong></td>
                    <td>${{ number_format($booking->total_price, 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Status:</strong></td>
                    <td><strong style="color: {{ $booking->status == 'confirmed' ? 'green' : 'red' }};">{{ ucfirst($booking->status) }}</strong></td>
                </tr>
            </table>

            <p>For any inquiries, feel free to contact us.</p>

            <p><a href="{{ url('/') }}" class="btn">Visit Our Website</a></p>

            <p>We look forward to hosting you!</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All Rights Reserved.</p>
        </div>
    </div>

</body>
</html>
