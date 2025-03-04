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

    <div id="body" style="display: block;">

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

                <section class="mt-12 float-right h-full">
                    <ul class="flex flex-col flex-wrap-reverse w-full h-4/5">
                        <?
                        for ($i = 0; $i <= 10; $i++) {
                        ?>
                            <li class="flex flex-col items-center justify-center cursor-pointer mr-14">
                                <img src="./images/folder.png" style="width: 85px;" alt="" rel="preconnect">
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
                        <img src="./images/notion.png" alt="notion" style="width:59px;">
                    </div>
                    <div class="ml-3">
                        <img class="rounded-2xl" src="./images/message.png" alt="message" style="width:67px;">
                    </div>
                    <div class="ml-3">
                        <img class="rounded-2xl" src="./images/note.png" alt="message" style="width:67px;">
                    </div>
                    <div>
                        <img src="./images/instagram.png" alt="instagram" style="width:90px;">
                    </div>
                </footer>

            </main>

        </div>

    </div>

</body>

</html>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="./index.js"></script>