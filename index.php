<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./index.css">
    <link
        rel="stylesheet"
        href="https://unpkg.com/tippy.js@6/animations/scale.css" />
</head>

<body style="overflow:hidden;">

    <div class="power-switch" onclick="handle_power();" style="position: relative;">
        <img id="bouncingImage" src="https://cdn.prod.website-files.com/61ba0d8d68d959d09b491aa4/632b06c3bd4efc2f7eb43d92_click-bubble-ai-01.svg" alt="">
        <input type="checkbox" />

        <div class="button">
            <svg class="power-off">
                <use xlink:href="#line" class="line" />
                <use xlink:href="#circle" class="circle" />
            </svg>
            <svg class="power-on">
                <use xlink:href="#line" class="line" />
                <use xlink:href="#circle" class="circle" />
            </svg>
        </div>
    </div>


    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" id="line">
            <line x1="75" y1="34" x2="75" y2="58" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150" id="circle">
            <circle cx="75" cy="80" r="35" />
        </symbol>
    </svg>


    <script src="./index.js"></script>
</body>

</html>