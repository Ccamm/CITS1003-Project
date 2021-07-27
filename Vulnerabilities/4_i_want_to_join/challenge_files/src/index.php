<html>
  <head>
    <title>🚫🍍 The Anti Pineapple on Pizza Society 🍕🚫</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <style>
      h1 {text-align: center;}
      h3 {text-align: center;}
      p {text-align: center;}
      div {text-align: center;}
      ul {text-align: center;}
      li {text-align: center;}
    </style>
  </head>

  <body style="background-color:powderblue;">
    <header>
      <h1>🚫🍍 The Anti Pineapple on Pizza Society 🍕🚫</h1>
      <p>We believe that putting <b>Pineapple</b> on <b>Pizza</b> is one of the <b>GREATEST SINS</b> that can be committed!</p></br>
      <p>You are destroying the holy balance of the tasty mozzarella, sweet tomato sugo and the salty bacon with the</p>
      <p>🤮🤮🤮<b>OBNOXIOUSLY OVERPOWERING FLAVOURS OF PINEAPPLE!</b>🤮🤮🤮</p></br>
      <p>Anyway, if you agree with me that any Pizza with Pineapple on it should be called <b>Toilet Paper</b> instead of Hawaiian Pizza please join my society below!</p>

    </header>

    <br>

    <?php
      if (isset($_POST) and !empty($_POST["email"])) {
        $email = $_POST["email"];
        echo "<p>Thank you for joining the Anti Pineapple on Pizza Society!</p>";
        echo "<p>We will send you information about our club to $email soon!</p>";
        echo "<p>CTF{n3v3R_tRv5t_d3_cL1eNt5_111!11}</p>";
      }
      else {
        echo "<p>😡😡😡Unforunately I have disabled signups for now, due to pineapple loving trolls keep on joining!😡😡😡</p>";
        echo "<p>I am sorry for anyone that legitimately wants to join the society.</p>";
        echo '<br>';
        echo '<ul style="list-style-type:none;">';
        echo '<form method="post">';
        echo '<li><h3>Sign Up Form</h3></li>';
        echo '<li><input type="email" placeholder="Email Address" name="email" value=""></li>';
        echo '<li><input type="submit" value="Join the Anti Pineapple on Pizza Society" disabled></li>';
        echo '</form>';
        echo '</u>';
      }
    ?>
  </body>
</html>
