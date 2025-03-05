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

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        <div class="w-full h-full flex justify-center items-center min-h-screen content-wrap" data-aos="zoom-in" data-aos-duration="800">

            <!-- 흐림 효과를 위한 컨테이너 -->
            <div class="blur-wrapper">
                <div class="blur-overlay"></div>
            </div>

            <main class="relative w-9/12 h-5/6">
                <header>
                    <div>
                        <i class="fa-brands fa-apple text-xl"></i>
                    </div>
                    <p><?= $now_date ?></p>
                </header>

                <div id="icon-wrap" class="w-3/4 h-3/4">
                </div>

                <section class="mt-12 float-right h-full">
                    <ul class="flex flex-col flex-wrap-reverse w-full h-4/5">
                        <?
                        for ($i = 0; $i <= 10; $i++) {
                        ?>
                            <li class="flex flex-col items-center justify-center cursor-pointer mr-14" onclick="show_file(event);">
                                <img src="../images/folder.png" style="width: 85px;" alt="" rel="preconnect">
                                <h5>
                                    Read Me
                                </h5>
                            </li>
                        <?
                        }
                        ?>
                    </ul>
                </section>

                <footer class="flex flex-row absolute items-center" style="left:50%; bottom:40px">
                    <div class="p-1 bg-white rounded-2xl">
                        <img src="../images/notion.png" alt="notion" style="width:59px;">
                    </div>
                    <div class="ml-3" onclick="show_contract();">
                        <img class="rounded-2xl" src="../images/message.png" alt="message" style="width:67px;">
                    </div>
                    <div class="ml-3">
                        <img class="rounded-2xl" src="../images/note.png" alt="note" style="width:67px;">
                    </div>
                    <div class="ml-3 p-1 rounded-2xl"" style=" background-color: #e4ba89;" onclick="show_lion();">
                        <img src=" ../images/lion.png" alt="lion" style="width:59px;">
                    </div>
                    <div>
                        <img src="../images/instagram.png" alt="instagram" style="width:90px;">
                    </div>
                </footer>

                <div class="floating-window">
                    <div class="window-header">
                        <div class="window-title">CONTRACT US</div>
                        <div class="window-controls">
                            <div class="window-minimize"></div>
                            <div class="window-maximize"></div>
                            <div class="window-close" onclick="close_file();"></div>
                        </div>
                    </div>
                    <div class="window-content">
                        <p>맥 스타일의 창을 만들어주는 CSS.<br>공지사항을 입력하거나 안내하는 역할을 할 수 있습니다.<br>사용 방법은 무궁무진하죠!~</p>
                    </div>
                </div>

                <div class="floating-contract-window">
                    <div class="window-header">
                        <div class="window-title">CONTRACT US</div>
                        <div class="window-controls">
                            <div class="window-minimize"></div>
                            <div class="window-maximize"></div>
                            <div class="window-close" onclick="close_file2();"></div>
                        </div>
                    </div>
                    <div class="window-content">
                        <div class="flex items-center">
                            <img src="../images/email.png" style="width: 50px;" alt="email">
                            <h2 class="text-2xl font-semibold mt-2 ml-2" style="color:#100f0f;">
                                hello@google.com
                            </h2>
                        </div>

                        <form method="post" class="">
                            <div class="flex flex-col w-full mt-4">
                                <input class="p-2" maxlength="256" name="email" data-name="email" placeholder="your@email.com" type="email" id="email" required="">
                                <textarea class="mt-1 p-2" rows="20" name="message" maxlength="5000" data-name="message" placeholder="Your message" required=""></textarea>
                                <input type="submit" class="mt-1 pt-2 pb-2 cursor-pointer" data-wait="Please wait..." value="Submit">
                            </div>
                        </form>

                    </div>
                </div>
            </main>


        </div>



    </div>

</body>

</html>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js' integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==' crossorigin='anonymous'></script>
<script src="./index.js"></script>