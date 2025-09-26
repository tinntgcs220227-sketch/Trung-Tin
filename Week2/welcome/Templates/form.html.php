<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Basic Calculator</title>
  <link rel="stylesheet" href="../public/style.css" />
</head>
<body>
  <div class="container">
    <h1>Basic Calculator</h1>

    <form action="" method="post" class="card">
      <label>
        Value 1:
        <input type="text" name="val1" required />
      </label>

      <label>
        Value 2:
        <input type="text" name="val2" required />
      </label>

      <fieldset class="ops">
        <legend>Operation</legend>
        <label><input type="radio" name="calc" value="add" checked /> Add (+)</label>
        <label><input type="radio" name="calc" value="sub" /> Subtract (−)</label>
        <label><input type="radio" name="calc" value="mul" /> Multiply (×)</label>
        <label><input type="radio" name="calc" value="div" /> Divide (÷)</label>
      </fieldset>

      <button type="submit">Calculate</button>
    </form>

    <p class="note">Enter numbers, choose an operation, then press Calculate.</p>
  </div>
</body>
</html>
