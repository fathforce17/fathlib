<?php

return [
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'register' => [
        'or_register' => 'Or Create an Account',
        'already_have_account' => 'Already have an account?',
        'register' => 'Register',
        'register_title' => 'Create a new account',
        'email_request' => 'Request verification email',
        'email_verification' => 'Email verification',
        'email_request_description' => 'If you didn\'t get email for verification, please request for verification email here.',
        'email_verified' => 'Your email is verified, you can login.',
        'errors' => [
            'invalid_verification_token' => 'Invalid verification token.',
        ],
        'registered' => 'Registration successfull.',
        'registered_status_activated' => 'Registration successfull, you can now login.',
        'registered_status_pending_verification' => 'Registration successfull, please check your email for verification.',
        'pending_verification_email_sent' => 'Please check your email for verification.',
        'registered_status_pending_approval' => 'Registration successfull, your account is pending for approval.',
        'props' => [
            'name' => 'Name',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password',
            'tnc_detail' => 'I accept the terms and condition.',
        ],
    ],
    'login' => [
        'login' => 'Sign In',
        'login_title' => 'Sign In',
        'or_login_with' => 'Or login with',
        'props' => [
            'email' => 'Email',
            'email_or_username' => 'Email or Username',
            'phone' => 'Phone',
            'method' => 'OTP method',
            'username' => 'Username',
            'password' => 'Password',
            'otp' => 'One Time Password',
            'otp_short' => 'OTP',
            'remember_me' => 'Remember Me',
        ],
        'errors' => [
            'unauthenticated' => 'Your session is expired, please login again.',
            'failed' => 'These credentials do not match our records.',
            'permission_disabled' => 'You are not allowed to login.',
            'invalid_status' => [
                'banned' => 'Your account is banned.',
                'disapproved' => 'Your account request is disapproved.',
                'not_activated' => 'Your account is not yet activated.',
                'pending_approval' => 'Your account is not yet approved.',
                'pending_verification' => 'Your account is not yet verified.',
            ],
        ],
        'logout' => 'Logout',
        'otp_sent' => 'Login OTP sent.',
        'logged_in' => 'You are successfully logged in. EN',
        'logged_out' => 'You are successfully logged out.',
    ],
    'security' => [
        'props' => [
            'code' => 'Code',
        ],
        'errors' => [
            'two_factor_security_pending' => 'Two factor security pending.',
            'invalid_code' => 'Invalid two factor code.',
        ],
    ],
    'screen_lock' => [
        'props' => [
            'password' => 'Password',
        ],
        'errors' => [
            'screen_lock_pending' => 'Please enter password to continue.',
            'password_mismatch' => 'Password mismatch.',
        ],
    ],
    'password' => [
        'password_title' => 'Forgot your password?',
        'change_password' => 'Change Password',
        'request_password' => 'Request New Password',
        'verify_token' => 'Verify Token',
        'reset_password' => 'Reset Password',
        'props' => [
            'email' => 'Email',
            'code' => 'Code',
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'new_password_confirmation' => 'Confirm New Password',
        ],
        'errors' => [
            'password_mismatch' => 'Current password do not match.',
            'account_not_activated' => 'User account is not activated.',
            'code_mismatch' => 'This password reset code is invalid.',
            'code_expired' => 'This password reset code is expired.',
            'different' => 'The password should be different than previous password.',
        ],
        'forgot_password' => 'Forgot Password',
        'reset' => 'Your password has been reset.',
        'user' => 'We can\'t find a user with that e-mail address.',
        'sent' => 'We have e-mailed your password reset link.',
        'changed' => 'Password changed successfully.',
    ],
    'failed_login_attempt' => 'Failed Login Attempt',
    'failed_login_attempts' => [
        'module_title' => 'Listing all Failed Login Attempts',
        'module_description' => 'Get detailed information about failed login attempts.',
    ],
];
