document.addEventListener("DOMContentLoaded", () => {
  const matchList = document.getElementById("matchList");

  const matches = [
    {
      league: "Premier League",
      teams: ["Liverpool", "Bournemouth"],
      date: "August 15, 2025",
      time: "3:00 PM EST",
      platforms: ["USA Network", "Universo", "Fubo", "Sling TV"]
    },
    {
      league: "La Liga",
      teams: ["Girona", "Rayo Vallecano"],
      date: "August 15, 2025",
      time: "1:00 PM EST",
      platforms: ["ESPN Deportes", "ESPN+"]
    }
  ];

  matches.forEach(match => {
    const div = document.createElement("div");
    div.className = "match-card";
    div.innerHTML = `
      <h3>${match.teams[0]} vs ${match.teams[1]}</h3>
      <p><strong>League:</strong> ${match.league}</p>
      <p><strong>Date:</strong> ${match.date}</p>
      <p><strong>Time:</strong> ${match.time}</p>
      <p><strong>Watch on:</strong> ${match.platforms.join(", ")}</p>
    `;
    matchList.appendChild(div);
  });
});