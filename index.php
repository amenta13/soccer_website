<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Soccer Watch Guide</title>
  <link rel="stylesheet" href="css/style_sheet.css">
</head>

<body>

  <?php require_once "web_elements/navbar.php" ?>

  <main>
    <h1>Welcome to the ultimate soccer guide!</h1>
  </main>

  <div class="league-grid">
    <div><a href="leagues.php?league=WC"><img src="web_elements/logos/2026_FIFA_World_Cup_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=EC"><img src="web_elements/logos/UEFA_Euro_2024_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=CL"><img src="web_elements/logos/UEFA_Champions_League_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=PL"><img src="web_elements/logos/Premier_League_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=ELC"><img src="web_elements/logos/EFL_Championship_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=PD"><img src="web_elements/logos/La_Liga_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=BL1"><img src="web_elements/logos/Bundesliga_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=SA"><img src="web_elements/logos/Serie_A_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=FL1"><img src="web_elements/logos/Ligue_1_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=BSA"><img src="web_elements/logos/Campeonato_Brasileiro_Série_A_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=DED"><img src="web_elements/logos/Eredivisie_logo.png" class="league-logo"></a></div>
    <div><a href="leagues.php?league=PPL"><img src="web_elements/logos/Primeira_Liga_logo.png" class="league-logo"></a></div>
  </div>

  <?php require_once "web_elements/footer.php" ?>

</body>

</html>