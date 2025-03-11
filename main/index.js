window.onload = function () {
  // AOS 초기화
  AOS.init({
    duration: 800, // 애니메이션 지속 시간 설정
    once: true, // 한 번만 실행되도록 설정
  });

  const swiperEl = document.querySelector(".mySwiper").swiper;

  // 마우스 휠 이벤트 감지
  swiperEl.on("slideChangeTransitionStart", function () {
    console.log("🔄 Slide Changed: ", swiperEl.activeIndex);

    sound_play_toggle();
  });
};

const $modal = $(".floating-window");
const $contract_modal = $(".floating-contract-window");

function show_file(id) {
  sound_play(1);

  $.ajax({
    type: "POST",
    url: "/_ajax/index.php",
    async: false,
    data: {
      id: id,
      mode: "article_update_view",
    },
    dataType: "json",
    success: function ({ content, title }) {
      $(".floating-window .window-title").text(title);
      $(".floating-window .window-content").html(content);

      $modal.show();

      if (window.innerWidth <= 768) {
        // 현재 스크롤 위치 가져오기
        let scrollY = document.getElementById("body").scrollTop;

        console.log(scrollY);

        $modal.addClass(`w-full h-screen`);
        $modal.css("top", `${scrollY}px`); // JavaScript로 top 설정
      } else {
        $modal.addClass("w-full h-full");
      }

      setTimeout(() => {
        $modal.addClass("show");
      }, 10);
    },
  });
}

function show_contract() {
  sound_play(1);

  $contract_modal.show();

  if (window.innerWidth <= 768) {
    // 현재 스크롤 위치 가져오기
    let scrollY = document.getElementById("body").scrollTop;

    $contract_modal.addClass("md:w-3/5 w-full min-h-2/5 h-auto");
    // $contract_modal.css("top", `${scrollY}px`); // JavaScript로 top 설정
  } else {
    $contract_modal.addClass("md:w-3/5 w-full min-h-2/5 h-auto");
  }
  $("#email").focus();

  setTimeout(() => {
    $contract_modal.addClass("center");
  }, 10);
}

function close_file(class_name) {
  sound_play(2);

  setTimeout(() => {
    $modal.hide(); // 애니메이션 후 숨김 처리
  }, 500);

  $modal.removeClass("show");
  $modal.removeClass("h-screen");
  $modal.removeClass("h-full");
  $modal.css({
    top: "", // top 속성 제거
  });
}

function close_file2() {
  sound_play(2);

  $contract_modal.hide(); // 애니메이션 후 숨김 처리
}

function show_lion(event) {
  sound_play(1);

  const target = $(event.currentTarget);
  $(".toggle-checkbox").prop("disabled", false);
  target.removeAttr("onclick");

  init();
  createLights();
  createLion();
  createLaptop();
  loop();
}

function lion_exec1(event) {
  const is_chk = $(event.target).is(":checked");
  sound_play(is_chk ? 1 : 2);

  // 체크 여부에 따라 노트북 보이기/숨기기
  laptop.threegroup.visible = is_chk;

  createLaptop();

  if (is_chk) {
    scene.add(laptop.threegroup);
  } else {
    scene.remove(laptop.threegroup);
  }
}

function lion_exec2(event) {
  const is_chk = $(event.currentTarget).is(":checked");
  sound_play(is_chk ? 1 : 2);

  const world = $("#world");

  if (is_chk) {
    world.addClass("dark");
  } else {
    world.removeClass("dark");
  }
}

function lion_exec3(event) {
  const is_chk = $(event.currentTarget).is(":checked");
  sound_play(is_chk ? 1 : 2);

  lion.toggleHeadphones();
}

function sound_play(n) {
  const number = n ? n : get_number();

  const soundAudio = new Audio(`../sounds/click${number}.wav`);

  if (!soundAudio.paused) {
    soundAudio.pause();
    soundAudio.currentTime = 0; // 처음부터 다시 시작
  }

  soundAudio.play();
}

function sound_play_toggle() {
  const toggle = new Audio(`../sounds/toggle.wav`);

  toggle.currentTime = 0; // 처음부터 다시 재생
  toggle.play();
}

function get_number() {
  return Math.floor(Math.random() * 2) + 1;
}

function send_email(event) {
  event.preventDefault();

  const email = $("input[name=email]").val();
  const message = $("textarea[name=message]").val();

  $.ajax({
    type: "POST",
    url: "/_ajax/index.php",
    async: false,
    data: {
      email: email,
      message: message,
      mode: "send_email",
    },
    dataType: "json",
    success: function (r) {
      Swal.fire({
        title: "Thank You !",
        text: "Email has been sent",
      });

      close_file2();
    },
  });
}

function go_app(appName) {
  sound_play(1);

  console.log($(`#${appName}-link`));
  let link = $(`#${appName}-link`);

  console.log(`App Name: ${appName}`);
  console.log(`Link Element:`, link);

  link[0].click(); // 순수 JavaScript 방식으로 클릭 시도
}
