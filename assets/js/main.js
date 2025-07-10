// Twitch chat parancs kezelése
document.addEventListener('DOMContentLoaded', () => {
    console.log("MelonAssist oldal betöltve!");
});

// !melon parancshoz
function sendMelonFact() {
    const facts = [
        "A dinnye 92%-ban víz!",
        "A legnagyobb dinnye 159 kg volt!",
        "MelonAssist a legjobb Fortnite streamer!"
    ];
    const randomFact = facts[Math.floor(Math.random() * facts.length)];
    alert(randomFact);
}
