<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Error</title>
  <link rel="stylesheet" href="../public/style.css" />
</head>
<body>
  <div class="container">
    <h1>Input Error</h1>
    <div class="card error">
      <p><?php echo htmlspecialchars($error ?? 'An error occurred.', ENT_QUOTES, 'UTF-8');?> </p>
    </div>
    <a class="link" href="./">← Try again</a>
  </div>
</body>
</html>
