<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Result</title>
  <link rel="stylesheet" href="../public/style.css" />
</head>
<body>
  <div class="container">
    <h1>Calculation Result</h1>
    <div class="card success">
      <p><?php echo htmlspecialchars($output, ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <a class="link" href="./">← Back to calculator</a>
  </div>
</body>
</html>
