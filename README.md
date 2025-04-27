# CSRF Demo (HTML-only version)

A simple demonstration of how CSRF (Cross-Site Request Forgery) attacks work. This demo doesn't require any server-side setup - it's all HTML and JavaScript.

## What is CSRF?

Cross-Site Request Forgery (CSRF) is an attack that forces a user to execute unwanted actions on a web application in which they're currently authenticated. The attack works because browser requests automatically include all cookies, including session cookies.

## How This Demo Works

This demo consists of two websites:

1. **bank.html** - A simple banking site that allows users to transfer money
2. **evil.html** - A malicious movie website that attempts to initiate transfers without the user's knowledge

The banking site uses localStorage to simulate a server-side session, allowing us to track transactions. The evil site tries to trick you into transferring money without your knowledge by exploiting the fact that you're already "logged in" to the bank.

## How to Run the Demo

1. Download or clone this repository
2. Open **bank.html** in your browser
3. Make a legitimate transaction (send $100 to "friend-account")
4. Without closing the bank tab, open **evil.html** in a new tab or window
5. Click on one of the movie posters or the banner ad at the top
6. Return to the bank tab and refresh the page
7. Notice there's now a suspicious transaction to "hacker-account"

## Security Measures to Prevent CSRF

In real-world applications, CSRF attacks can be prevented with:

1. **Anti-CSRF Tokens**: Unique, unpredictable values that must be included in each request
2. **SameSite Cookie Attribute**: Restricts cookies to same-site requests
3. **Custom Request Headers**: Requiring custom headers that simple forms can't add
4. **Checking the Referer Header**: Validating the request's origin

## Educational Purpose Only

This demo is for educational purposes only. The techniques demonstrated should never be used in a malicious way against real websites.
