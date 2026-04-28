<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Soccer Schedule</title>
    <link rel="stylesheet" href="css/style_sheet.css">
  </head>
  <body>

    <?php require_once "web_elements/navbar.php" ?>

    <main>
      <h1>About</h1>
    </main>

    <div class="textbox">
      The purpose of this website is to be able to quickly find upcoming soccer games across multiple leagues and competitions.
      Currently only 12 leagues and competitions are available, however future additions to the site may include additional
      leagues and competitions, club and player stats, and viewing options.
    </div>

    <div class="textbox">
      The API used for the soccer data found here is from football-data.org.
      <BR>
      Check it out yourself <a href="https://www.football-data.org/coverage">here</a>!
    </div>

    <img src="web_elements/soccer_ball_tv.jpg" class="center-img">
    
    <?php require_once "web_elements/footer.php" ?>

  </body>
</html>