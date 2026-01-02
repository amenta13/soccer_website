<?php

require_once "api/soccer_data_funcs.php";

?>

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
    <h1>Upcoming Matches</h1>
  </main>

  <!-- Premier League -->
  <?php
  $league = $_GET['league'] ?? 'PL';

  $leagueNames = [
    'WC'  => 'FIFA World Cup',
    'CL'  => 'UEFA Champions League',
    'BL1'  => 'Bundesliga',
    'DED'  => 'Eredivisie',
    'BSA'  => 'Campeonato Brasileiro Série A',
    'PD'  => 'La Liga',
    'FL1' => 'Ligue 1',
    'ELC' => 'English Championship',
    'PPL' => 'Primeira Liga',
    'EC'  => 'European Championship',
    'SA'  => 'Serie A',
    'PL'  => 'Premier League'
  ];

  if (!array_key_exists($league, $leagueNames)) {
    $league = 'PL';
  }

  $matches = getLeagueMatches($league, 0);

  // Test raw data output
  //echo "<pre>";
  //var_dump($matches);
  //echo "</pre>";

  ?>

  <div class="schedule-column" >

    <div class="schedule-head">
      <h1><?= htmlspecialchars($leagueNames[$league] ?? 'Premier League') ?></h1>
    </div>

    <?php if (!empty($matches)): ?>
      <?php foreach ($matches as $match): ?>
        <div class="schedule-game">
          <div class="match-teams">
            <img src="<?= htmlspecialchars($match["homeTeam"]["crest"]); ?>" class="team-crest">
            <strong><?= htmlspecialchars($match["homeTeam"]["name"]) ?></strong>
            vs
            <strong><?= htmlspecialchars($match["awayTeam"]["name"]) ?></strong>
            <img src="<?= htmlspecialchars($match["awayTeam"]["crest"]); ?>" class="team-crest">
          </div>
          <div class="match-date">
            <?= formatDate($match["utcDate"]); ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="schedule-game">
        No matches found.
      </div>
    <?php endif; ?>

  </div>

  <?php require_once "web_elements/footer.php" ?>

</body>

</html>