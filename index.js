function handle_power() {
  setTimeout(() => {
    window.location.href = "/main";
  }, 1000);
}

document.addEventListener("DOMContentLoaded", () => {
  const img = document.getElementById("bouncingImage");
  img.classList.add("loaded"); // 바운스 효과 추가
});
