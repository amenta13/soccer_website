document.addEventListener("DOMContentLoaded", () => {
  const matchList = document.getElementById("matchList");

  fetch("data/matches.json")
  .then(res => res.json())
  .then(matches => {
    matches.forEach(match => {
      // same rendering code
    });
  });

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