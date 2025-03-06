window.onload = function () {
  // AOS 초기화
  AOS.init({
    duration: 800, // 애니메이션 지속 시간 설정
    once: true, // 한 번만 실행되도록 설정
  });
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

function show_lion(event) {
  const target = $(event.currentTarget);
  target.empty();

  if (target.children("iframe").length === 0) {
    target.append(
      `<iframe id="contentFrame" src="../lion/index.php" width="100%" height="100%" frameborder="0"></iframe>`
    );
  } else {
  }
}

function lion_exec1() {
  sound_play_toggle();
}

function lion_exec2() {
  sound_play_toggle();
}

function lion_exec3() {
  sound_play_toggle();
}

function sound_play() {
  const number = get_number();
  const soundAudio = new Audio(`../sounds/click${number}.wav`);

  if (!soundAudio.paused) {
    soundAudio.pause();
    soundAudio.currentTime = 0; // 처음부터 다시 시작
  }

  soundAudio.play();
}

function sound_play_toggle() {
  const soundAudio = new Audio(`../sounds/toggle.wav`);

  if (!soundAudio.paused) {
    soundAudio.pause();
    soundAudio.currentTime = 0; // 처음부터 다시 시작
  }

  soundAudio.play();
}

function get_number() {
  return Math.floor(Math.random() * 2) + 1;
}
