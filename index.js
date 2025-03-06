function handle_power() {
  const soundAudio = new Audio(`./sounds/click1.wav`);

  if (!soundAudio.paused) {
    soundAudio.pause();
    soundAudio.currentTime = 0; // 처음부터 다시 시작
  }
  soundAudio.play();

  setTimeout(() => {
    window.location.href = "/main";
  }, 1200);
}

document.addEventListener("DOMContentLoaded", () => {
  const img = document.getElementById("bouncingImage");
  img.classList.add("loaded"); // 바운스 효과 추가
});
