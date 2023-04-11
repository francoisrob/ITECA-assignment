<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <?php require_once __DIR__ . '/vendor/autoload.php'; ?>
</head>

<body>
  <div style="block-size: 100vh; display: flex; justify-content: center; align-items: center;">
    <form action="php/mail.php" method="post">
      <h1>Register</h1>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" required><br>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required><br>
      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="non-binary">Non-Binary</option>
      </select><br>
      <label for="favorite_character">Favorite Comic Book Character:</label><br>
      <input type="text" id="favorite_character" name="favorite_character"><br>
      <button type="submit">Register</button>
    </form>
  </div>

</body>

</html>