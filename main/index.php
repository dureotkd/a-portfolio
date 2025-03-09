<?
date_default_timezone_set('Asia/Seoul');
$now_date = date('l d F H:i');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="icon" type="image/x-icon" href="/images/favicon_rounded.ico">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../lion/index.css">
    <link href="./index.css" rel="stylesheet">
</head>


<body>
    <!-- 로딩 화면 -->
    <!-- <div id="loading-screen">
        <h1>Hello.</h1>
        <div class="progress-container">
            <div id="progress-bar"></div>
        </div>
    </div> -->

    <div id="body">

        <div class="w-full h-full flex justify-center md:items-center min-h-screen content-wrap" data-aos="zoom-in" data-aos-duration="800">

            <!-- 흐림 효과를 위한 컨테이너 -->
            <!-- <div class="blur-wrapper">
                <div class="blur-overlay"></div>
            </div> -->

            <main class="md:mb-100px relative w-full max-h-[815px] max-w-screen-xl">
                <section class="w-full h-full flex md:flex-row flex-col">
                    <div class="md:w-2/5 md:min-w-[512px] w-full md:h-auto md:min-h-0 relative" data-label="game">

                        <div class="w-full h-full bg-[#2a4bb3] rounded-2xl p-4 text-white shadow-lg">

                            <!-- Header Section -->
                            <header class="flex justify-between items-center">
                                <span class="text-sm font-semibold">HELLO 3D LION ANIMATION</span>
                                <div class="window-controls">
                                    <div class="window-minimize"></div>
                                    <div class="window-maximize"></div>
                                    <div class="window-close" onclick="close_file2();"></div>
                                </div>
                            </header>

                            <div class="device__line"></div>

                            <!-- Profile Image Container -->
                            <div id="world" class="h-[350px] bg-[#1E2A47] overflow-hidden rounded-xl mt-4 flex justify-center items-center min-h-[350px] cursor-pointer" style=" background-color: #e4ba89;" onclick="show_lion(event);">
                                <div class="ml-3 p-1 rounded-2xl">
                                    <img src=" ../images/lion.png" alt="lion">
                                    <div id="instructions">
                                    </div>
                                </div>
                            </div>

                            <!-- Customizer Section -->
                            <div class="flex flex-col">
                                <div class="bg-[#1E2A47] rounded-xl p-4 mt-4">
                                    <div class="text-sm font-semibold flex items-center">
                                        <img src="../images/setting.png" alt="setting" class="w-[38px] mr-1">
                                        <span style="color:#928c8c;">
                                            Face customizer
                                        </span>
                                        <div class="flex-grow border-t border-gray-500 ml-2"></div>
                                    </div>

                                    <!-- Toggle Options -->
                                    <div class="mt-4 space-y-2">
                                        <!-- Option 2 -->
                                        <label class="flex items-center bg-[#1E2A47] p-2 rounded-lg cursor-pointer hover:bg-[#243A63]">

                                            <div class="toggle-wrapper mr-2">
                                                <input class="toggle-checkbox" type="checkbox" onchange="lion_exec1(event)" disabled>
                                                <div class="toggle-container">
                                                    <div class="toggle-button">
                                                        <div class="toggle-button-circles-container">
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="font-semibold text-sm">Programming & Engineering</span>
                                        </label>

                                        <!-- Option 3 -->
                                        <label class="flex items-center bg-[#1E2A47] p-2 rounded-lg cursor-pointer hover:bg-[#243A63]">

                                            <div class="toggle-wrapper mr-2">
                                                <input class="toggle-checkbox" type="checkbox" onchange="lion_exec2(event)" disabled>
                                                <div class="toggle-container">
                                                    <div class="toggle-button">
                                                        <div class="toggle-button-circles-container">
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="font-semibold text-sm">Physics Expert</span>
                                        </label>

                                        <!-- Option 3 -->
                                        <label class="flex items-center bg-[#1E2A47] p-2 rounded-lg cursor-pointer hover:bg-[#243A63]">

                                            <div class="toggle-wrapper mr-2">
                                                <input class="toggle-checkbox" type="checkbox" onchange="lion_exec3(event)" disabled>
                                                <div class="toggle-container">
                                                    <div class="toggle-button">
                                                        <div class="toggle-button-circles-container">
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                            <div class="toggle-button-circle"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="font-semibold text-sm">Music & Art</span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="md:mt-3 mt-5 flex flex-row  items-center w-full justify-center icon-wrap">
                                <div class="p-1 rounded-2xl" style="background-color: #0288d1;">
                                    <img src="../images/linkdin.png" alt="linkdin" style="width:59px;">
                                </div>
                                <div class="ml-3 bg-white rounded-2xl">
                                    <img src="../images/sc.png" alt="sc" style="width:67px;">
                                </div>
                                <div class="ml-3" onclick="show_contract();">
                                    <img class="rounded-2xl" src="../images/message.png" alt="message" style="width:67px;">
                                </div>
                                <!-- <div class="ml-3 bg-white">
                                    <img class="rounded-2xl" src="../images/logo.jpg" alt="logo" style="width:67px;">
                                </div> -->
                                <div>
                                    <img src="../images/instagram.png" alt="instagram" style="width:90px;">
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="md:ml-4 md:mt-0 mt-4 flex flex-col w-full h-full bg-[#25252f] p-4 rounded-2xl">

                        <header class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="w-[48px] mr-2 rounded-xl" src="../images/image.png" alt="">
                                <span class="text-sm font-semibold">portfolio</span>
                            </div>
                            <div class="window-controls">
                                <div class="window-minimize"></div>
                                <div class="window-maximize"></div>
                                <div class="window-close" onclick="close_file2();"></div>
                            </div>
                        </header>

                        <div class="device__line" style="background-color: #3b3b3b !important;"></div>

                        <div class="md:h-4/5 w-full h-[350px]" data-label="portfolio">
                            <swiper-container class="mySwiper rounded-2xl" pagination="true" pagination-clickable="true" direction="vertical" loop="true"
                                speed="800"
                                easing-function="ease-in-out"
                                space-between="30" mousewheel="true">

                                <swiper-slide>
                                    <img class="rounded-2xl" src="https://cdn.prod.website-files.com/61ba0d8d68d959d09b491aa4/63244ebd9ebeb009874184e0_big__cos.png" alt="포트폴리오 이미지">
                                </swiper-slide>
                                <swiper-slide>
                                    <img class="rounded-2xl" src="https://cdn.prod.website-files.com/61ba0d8d68d959d09b491aa4/6585bbe4efa424b287aeba08_big__heypongo.webp" alt="포트폴리오 이미지">
                                </swiper-slide>
                                <swiper-slide>
                                    <img class="rounded-2xl" src="https://cdn.prod.website-files.com/61ba0d8d68d959d09b491aa4/63247caccde6a700504c3348_big__walex.jpg" alt="포트폴리오 이미지">
                                </swiper-slide>
                                <swiper-slide>
                                    <img class="rounded-2xl" src="https://cdn.prod.website-files.com/61ba0d8d68d959d09b491aa4/63247cacbf2fc841c2cc45bc_big__aim.jpg" alt="포트폴리오 이미지">
                                </swiper-slide>
                            </swiper-container>
                        </div>

                        <div class="flex items-center justify-between p-4 rounded-2xl mt-5" style="background-color: #1c1c25;">

                            <div class="flex overflow-auto overflow-y-hidden">
                                <?
                                for ($i = 0; $i < 8; $i++) {
                                ?>
                                    <img class="mr-6 w-[45px] cursor-pointer" onclick="show_file();" src="../images/file.png" alt="file">
                                <?
                                }
                                ?>
                            </div>
                            <img src="https://cdn.prod.website-files.com/61ba0d8d68d959d09b491aa4/632c8d7ea1166b01587787ce_card-dots.png" alt="" class="card-dots__img">
                        </div>

                    </div>

                </section>


                <div class="floating-window">
                    <div class="window-header">
                        <div class="window-title">TITLE</div>
                        <div class="window-controls">
                            <div class="window-minimize"></div>
                            <div class="window-maximize"></div>
                            <div class="window-close" onclick="close_file();"></div>
                        </div>
                    </div>
                    <div class="window-content">
                        <p>안녕하세요. HELLO WORLD..!!</p>
                    </div>
                </div>

            </main>


        </div>

    </div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js' integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==' crossorigin='anonymous'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r70/three.min.js"></script>
<script src="../lion/index.js"></script>
<script src="./index.js"></script>

</main>


</div>



</div>

</body>

</html>

<script src="https://cdn.tailwindcss.com"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {},
        },
        corePlugins: {
            preflight: false, // Tailwind의 기본 스타일 초기화 비활성화 (필요시)
        },
        safelist: [
            'bg-[#2a4bb3]', 'bg-[#1E2A47]', 'bg-[#1ABC9C]', 'hover:bg-[#16A085]' // 사용하고 싶은 색상 추가
        ],
    };
</script>