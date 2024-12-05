# Tawk.to Webhook Listener for WordPress

This repository contains a custom implementation of a webhook listener for the Tawk.to live chat application. The solution was developed for a WordPress site built with Elementor and uses a child theme to extend customization.

## 🛠️ Features
- **Webhook Validation**: Ensures the requests are legitimate using HMAC signature verification.
- **Email Notifications**: Sends an email whenever a new chat starts, containing:
  - Chat ID
  - Visitor Name
  - Email (if available)
  - City and Country
  - Property Name
- **Cost-Effective**: Does not rely on paid tools like Zapier, IFTTT, or premium chat solutions.

## 📂 File Structure
- **`webhook-listener.php`**: Contains the code for the webhook listener. This file is added to the child theme folder for integration into the WordPress environment.

## 🚀 How It Works
1. Place the `webhook-listener.php` file in your child theme directory.
2. Update the secret key to match the one configured in your Tawk.to dashboard.
3. Configure Tawk.to to send webhook events to the URL of this file.
4. Whenever a user initiates a chat, the webhook sends data, and this script processes it, validating the request and sending email notifications.

## 📝 Prerequisites
- A WordPress website built with Elementor.
- A child theme for customizations.
- A working email server to send notifications.

## 📧 Customization
- Replace the `contact@yourdomain.com` email address in the script with the desired recipient.
- Add additional fields to the email content if needed.

## 🌟 Why This Solution?
This project was developed as a cost-effective alternative for a client who wanted to avoid paid services. The webhook listener was designed to:
- Integrate seamlessly with the existing WordPress website.
- Use only free tools and services.

## 🖥️ Demo
When a visitor starts a chat on Tawk.to, an email is sent with following details:
- Chat ID: ''
- Visitor: ''
- Email: ''
- City: '' 
- Country: '' 
- Property: ''


## 🔒 Security
This script uses HMAC verification to ensure only legitimate requests from Tawk.to are processed.
