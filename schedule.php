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
      <h1>Today's Games</h1>
    </main>

    <?php
    $leagueNames = [
      'WC'  => 'FIFA World Cup',
      'CL'  => 'UEFA Champions League',
      'EC'  => 'European Championship',
      'PL'  => 'Premier League',
      'ELC' => 'English Championship',
      'PD'  => 'La Liga',
      'BL1'  => 'Bundesliga',
      'SA'  => 'Serie A',
      'FL1' => 'Ligue 1',
      'BSA'  => 'Campeonato Brasileiro Série A',
      'DED'  => 'Eredivisie',
      'PPL' => 'Primeira Liga'
    ];

    // Single API call
    $allMatches = getLeagueMatches(null, 0, 1);

    // Optional: strict rolling 24h filter
    $now   = time();
    $limit = $now + 86400;

    $allMatches = array_filter($allMatches, function ($match) use ($now, $limit) {
        $kickoff = strtotime($match['utcDate']);
        return $kickoff >= $now && $kickoff <= $limit;
    });

    // Group by league
    $matchesByLeague = [];
    foreach ($allMatches as $match) {
        $code = $match['competition']['code'] ?? 'OTHER';
        $matchesByLeague[$code][] = $match;
    }
    ?>
    
    <?php foreach ($leagueNames as $code => $name): ?>

      <div class="schedule-column">
        <div class="schedule-head">
          <h2><?= htmlspecialchars($name) ?></h2>
        </div>

        <?php if (!empty($matchesByLeague[$code])): ?>

          <?php foreach ($matchesByLeague[$code] as $match): ?>
            <div class="schedule-game">
              <div class="match-teams">
                <img src="<?= htmlspecialchars($match["homeTeam"]["crest"]) ?>" class="team-crest">
                <strong><?= htmlspecialchars($match["homeTeam"]["name"]) ?></strong>
                vs
                <strong><?= htmlspecialchars($match["awayTeam"]["name"]) ?></strong>
                <img src="<?= htmlspecialchars($match["awayTeam"]["crest"]) ?>" class="team-crest">
              </div>
              <div class="match-date">
                <?= formatDate($match["utcDate"]) ?>
              </div>
            </div>
          <?php endforeach; ?>

        <?php else: ?>

          <div class="schedule-game">
            No matches in the next 24 hours.
          </div>

        <?php endif; ?>

      </div>

    <?php endforeach; ?>

    <?php require_once "web_elements/footer.php" ?>

  </body>
</html>