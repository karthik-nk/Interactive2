<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simulated input</title>
</head>
<body>
  <form action="http://localhost:81/project/WMS/Documents/controller.php" method="post">
      <b>Problem2.Update and get player details</b>
      <p>Player ID <input type="number" min="0" name="id" size="30" value="" required></P>
      <p>Coins Won <input type="number" min="0" name="coins_won" size="30" value="" required></inpu></P>
      <p>Coins Bet <input type="number" min="0" name="coins_bet" size="30" value="" required></P>
      <p>hash <input type="text" name="hash" size="30" value="" required></P>                     
      <p><input type="submit" name="submit" value="Send"></P>   
</form>
</body>
</html>