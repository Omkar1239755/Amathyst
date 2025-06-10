<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <div
        style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top:100px">
        <div class="logootpimg" style="text-align: center;">
            <img src="https://work.mobidudes.in/OM/Amathyst/public/assests/images/textlogoamythyst.png" alt="img"
                style="width: 50%;">
        </div>
        <h2 style="color: #6f42c1; text-align: center;"> Verify Your Email</h2>
        <p style="font-size: 16px; color: #333;">Hi {{ $name ?? 'there' }},</p>
        <p style="font-size: 16px; color: #333;">Use the following OTP to verify your email address:</p>

        <div style="text-align: center; margin: 20px 0;">
            <span
                style="font-size: 32px; color: #ffffff; background-color: #6f42c1; padding: 12px 24px; border-radius: 8px; letter-spacing: 5px; display: inline-block;">
                {{ $otp }}
            </span>
        </div>
        <p style="font-size: 14px; color: #777;">This OTP is valid for the next 5 minutes. Do not share it with anyone.
        </p>
        <p style="font-size: 16px; color: #333;"><b>Thank you,</b><br>The Amathyst Team</p>
    </div>
</body>
</html>
