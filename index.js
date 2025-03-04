window.onload = function () {
  // AOS 초기화
  AOS.init({
    duration: 800, // 애니메이션 지속 시간 설정
    once: true, // 한 번만 실행되도록 설정
  });

  //   const bodyElement = document.getElementById("body");
  //   const loadingScreen = document.getElementById("loading-screen");

  //   // 배경 이미지 URL을 추가한 새로운 이미지 객체 생성
  //   const bgImage = new Image();
  //   bgImage.src =
  //     "http://media.idownloadblog.com/wp-content/uploads/2016/06/macOS-Sierra-Wallpaper-Macbook-Wallpaper.jpg";

  //   // 배경 이미지 로드가 완료되면 로딩 화면을 숨기고 콘텐츠를 표시
  //   bgImage.onload = function () {
  //     setTimeout(() => {
  //       loadingScreen.style.display = "none"; // 로딩 화면 숨기기
  //       bodyElement.style.display = "block"; // 콘텐츠 표시

  //     }, 100);
  //   };
};

function show_file(event) {
  if ($(".floating-window").hasClass("hidden")) {
    $(".floating-window").removeClass("hidden");
  } else {
    $(".floating-window").addClass("hidden");
  }
}
