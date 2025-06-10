<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>
<body
    style="margin: 0; padding: 0; background-color: #f4f4f7; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div
        style="max-width: 600px; margin: 30px auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h2 style="color: #333333;">Hello,</h2>
        <p style="color: #555555; font-size: 16px;">
            You recently requested to reset your password for your <strong>Amathyst</strong> account. Click the button
            below to reset it:
        </p>
        <p style="text-align: center; margin: 30px 0;">
            <a href="{{ $resetLink }}"
                style="display: inline-block; background-color: #4f46e5; color: #ffffff !important; padding: 12px 24px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                Reset Password
            </a>
        </p>

        <p style="color: #555555; font-size: 16px;">
            If you did not request a password reset, you can safely ignore this email.
        </p>
        <p style="color: #999999; font-size: 14px;">
            This link will expire in 60 minutes.
        </p>
        <div style="margin-top: 40px; text-align: center; color: #999999; font-size: 12px;">
            Amathyst. All rights reserved.
        </div>
    </div>
</body>
</html>
