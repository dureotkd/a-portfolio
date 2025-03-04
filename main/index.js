window.onload = function () {
  // AOS 초기화
  AOS.init({
    duration: 800, // 애니메이션 지속 시간 설정
    once: true, // 한 번만 실행되도록 설정
  });

  // const bodyElement = document.getElementById("body");
  // const loadingScreen = document.getElementById("loading-screen");

  // // 배경 이미지 URL을 추가한 새로운 이미지 객체 생성
  // const bgImage = new Image();
  // bgImage.src = "http://13.124.184.93/images/bg-01.webp";

  // // 배경 이미지 로드가 완료되면 로딩 화면을 숨기고 콘텐츠를 표시
  // bgImage.onload = function () {
  //   setTimeout(() => {
  //     loadingScreen.style.display = "none"; // 로딩 화면 숨기기
  //     bodyElement.style.display = "block"; // 콘텐츠 표시

  //     // AOS 초기화
  //     AOS.init({
  //       duration: 800, // 애니메이션 지속 시간 설정
  //       once: true, // 한 번만 실행되도록 설정
  //     });
  //   }, 2500);
  // };
};

const $modal = $(".floating-window");
const $contract_modal = $(".floating-contract-window");

function show_file(event) {
  $modal.show();
  $modal.addClass("w-full h-full");
  setTimeout(() => {
    $modal.addClass("show");
  }, 10);
}

function show_contract() {
  $contract_modal.show();
  $contract_modal.addClass("w-2/5 min-h-2/5 h-auto");
  setTimeout(() => {
    $contract_modal.addClass("center");
  }, 10);
}

function close_file(class_name) {
  $modal.removeClass("show");
  setTimeout(() => {
    $modal.hide(); // 애니메이션 후 숨김 처리
  }, 500);
}

function close_file2() {
  $contract_modal.hide(); // 애니메이션 후 숨김 처리
}

function show_lion() {
  if ($("#icon-wrap > iframe").length === 0) {
    $("#icon-wrap").append(
      `<iframe id="contentFrame" src="../lion/index.php" width="100%" height="100%" frameborder="0"></iframe>`
    );
  } else {
    $("#icon-wrap").empty();
  }
}
