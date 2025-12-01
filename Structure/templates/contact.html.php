<?php
// Tệp: /Structure/templates/contact.html.php
?>
<h2>Contact Administrator</h2>

<?php if ($messageSent): ?>
    <p class="success" style="padding: 1em; border: 1px solid #00bcd4; background-color: #e0f7fa; color: #00bcd4; border-radius: 4px;">
        ✅ Thank you! Your message has been sent to the admin.
    </p>
<?php endif; ?>

<form action="contact.php" method="post">
    <label for="username">Your Name:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="message">Your Message/Feedback:</label>
    <textarea id="message" name="message" rows="6" required></textarea>
    
    <input type="submit" value="Send Message">
</form>