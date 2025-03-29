<!DOCTYPE html>
<html>
<head>
    <title>Booking Status Update</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>Booking Status Update</h2>
        <p>Dear {{ $booking->name }},</p>
        
        <p>Your booking has been <strong>{{ $status }}</strong>.</p>
        
        <div style="background-color: #f5f5f5; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3>Booking Details:</h3>
            <p><strong>Service:</strong> {{ $booking->service }}</p>
            <p><strong>Date:</strong> {{ $booking->date }}</p>
            <p><strong>Time:</strong> {{ $booking->time }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
            
            @if($booking->status === 'rejected' && $booking->cancellation_reason)
                <p><strong>Cancellation Reason:</strong> {{ $booking->cancellation_reason }}</p>
            @endif
        </div>

        @if($booking->status === 'approved')
            <p>Your booking has been confirmed. We look forward to serving you!</p>
        @elseif($booking->status === 'rejected')
            <p>We apologize, but your booking request could not be accommodated at this time.</p>
            <p>If you have any questions, please don't hesitate to contact us.</p>
        @endif

        <p>Thank you for choosing our services.</p>
        
        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
            <p style="color: #666; font-size: 12px;">This is an automated message, please do not reply to this email.</p>
        </div>
    </div>
</body>
</html> 