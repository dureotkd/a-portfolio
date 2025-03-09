<?php
require_once('../db/index.php');

session_start();

$login_user = $_SESSION['login_user'] ?? '';

if (empty($login_user)) {
    die('로그인 후 이용해주세요');
}

$site_info = select('SELECT * FROM siri.site_info');
$site_info_row = !empty($site_info[0]) ? $site_info[0] : [];

$portfolio_all = select('SELECT * FROM siri.portfolio');

$article_all = select('SELECT * FROM siri.article');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon_rounded.ico">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

</head>

<body>

    <div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Make Your Portfolio !!</h2>

        <h2 class="text-lg font-bold mb-2">
            Site Base info<span class="ml-2">⛑</span>
        </h2>

        <form action="#" id="sform" method="post" class="space-y-4" enctype="multipart/form-data">

            <input type="hidden" name="mode" value="">
            <input type="hidden" name="id" value="<?= !empty($site_info_row['id']) ? $site_info_row['id'] : '' ?>">

            <!-- Website -->
            <div>
                <label class="block text-gray-700">Domain name</label>
                <input type="text" name="domain" value="<?= !empty($site_info_row['domain']) ? $site_info_row['domain'] : '' ?>" placeholder="Domain name" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- First Name -->
            <div>
                <label class="block text-gray-700">Site Title</label>
                <input type="text" name="title" value="<?= !empty($site_info_row['site_name']) ? $site_info_row['site_name'] : '' ?>" placeholder="Site Title" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Last Name -->
            <div>
                <label class="block text-gray-700">Site Description</label>
                <input type="text" name="description" value="<?= !empty($site_info_row['description']) ? $site_info_row['description'] : '' ?>" placeholder="Site Description" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700">Site Keyword</label>
                <input type="email" name="keyword" value="<?= !empty($site_info_row['keyword']) ? $site_info_row['keyword'] : '' ?>" placeholder="Site Keyword" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="<?= !empty($site_info_row['email']) ? $site_info_row['email'] : '' ?>" placeholder="E-Mail Address" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center w-full">
                <button type="button" onclick="save_site_info();" class="px-6 py-2 w-full bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">
                    Save <span class="ml-2">📨</span>
                </button>
            </div>

            <h2 class="text-lg font-bold mb-2">
                Portfolio<span class="ml-2">📂</span> <span style="color:silver; font-size:14px;">(Recommended Size: 2048 x 1535 / 4:3)</span>
                <span style="color:red; font-size:14px;">한글명 파일 X</span>
            </h2>

            <?php
            for ($i = 0; $i < 5; $i++) {
                $existingFile = isset($portfolio_all[$i]['image_url']) ? $portfolio_all[$i]['image_url'] : null;
                $fileName = isset($portfolio_all[$i]['image_name']) ? $portfolio_all[$i]['image_name'] : "No file";
                $file_id = isset($portfolio_all[$i]['id']) ? $portfolio_all[$i]['id'] : "";
            ?>
                <div class="file-upload">
                    <?php if ($existingFile && file_exists($existingFile)) { ?>
                        <div class="flex">
                            <a style="color:blue;" href="<?= $existingFile ?>" target="_blank"><?= $fileName ?></a>
                            <input type="hidden" name="existing_file_<?= $i ?>" value="<?= $existingFile ?>">
                            <button type="button" class="remove-file ml-2" onclick="remove_file(<?= $file_id ?>);" data-index="<?= $i ?>">❌ 삭제</button>
                        </div>
                    <?php } else {
                    ?>
                        <input type="file" class="files" name="file_<?= $i ?>">
                    <?
                    } ?>
                </div>
            <?php
            }
            ?>

            <!-- Submit Button -->
            <div class="flex justify-center w-full">
                <button type="button" onclick="save_portfolio();" class="px-6 py-2 w-full bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">
                    Save <span class="ml-2">📨</span>
                </button>
            </div>

            <h2 class="text-lg font-bold mb-2">
                Article<span class="ml-2">📗</span>
            </h2>

            <div class="">
                <input type="hidden" name="article_id" value="">
                <?
                if (!empty($article_all)) {
                    foreach ($article_all as $article) {
                ?>
                        <div class="flex items-center">
                            <p onclick="modify_view_article(<?= $article['id'] ?>);" class="cursor-pointer" style="color:blue;"><?= $article['title'] ?></p>
                            <button type="button" class="remove-file ml-2" onclick="delete_article(<?= $article['id'] ?>);" data-index="<?= $i ?>">❌ 삭제</button>
                        </div>
                    <?
                    }
                    ?>

                <?
                } else {
                ?>
                    등록된 게시글이 없습니다..
                <?
                }
                ?>
            </div>

            <div>
                <label class="block text-gray-700">Title</label>
                <input type="text" name="article_title" value="" placeholder="Title" class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div id="editor"></div>

            <!-- Submit Button -->
            <div class="flex justify-center w-full" id="save-btn">
                <button type="button" onclick="save_article();" class="px-6 py-2 w-full bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">
                    Save <span class="ml-2">📨</span>
                </button>
            </div>

        </form>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js' integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==' crossorigin='anonymous'></script>
    <script>
        const editor = new toastui.Editor({
            el: document.querySelector('#editor'),
            previewStyle: 'vertical',
            height: '500px',
        });

        function save_site_info() {
            $("input[name=mode]").val('site_info');
            const serial = $("#sform").serialize();

            $.ajax({
                type: "POST",
                url: "/_ajax/index.php",
                data: serial,
                dataType: "json",
                success: function(response) {
                    alert('저장되었습니다');
                }
            });

        }

        function save_portfolio() {
            $("input[name=mode]").val('portfolio');
            const serial = $("#sform").serialize();

            let formData = new FormData();
            let fileInputs = document.querySelectorAll(".files");

            // 모든 `input[type=file]` 필드를 순회하며 파일을 추가
            fileInputs.forEach((input, index) => {
                if (input.files.length > 0) {
                    for (let i = 0; i < input.files.length; i++) {
                        formData.append(`files[]`, input.files[i]); // 배열로 추가
                    }
                }
            });

            formData.append('mode', 'portfolio')

            $.ajax({
                type: "POST",
                url: "/_ajax/index.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.location.reload();
                }
            });

        }

        function remove_file(file_id) {
            $("input[name=mode]").val('remove_file');
            const serial = $("#sform").serialize();

            $.ajax({
                type: "POST",
                url: "/_ajax/index.php",
                data: {
                    file_id: file_id,
                    mode: 'remove_file'
                },
                success: function(response) {
                    window.location.reload();

                }
            })
        }

        function save_article() {

            const title = $("input[name=article_title]").val();
            const article_id = $("input[name=article_id]").val();
            const content = editor.getHTML();

            $.ajax({
                type: "POST",
                url: "/_ajax/index.php",
                data: {
                    id: article_id,
                    title: title,
                    content: content,
                    mode: 'article'
                },
                success: function(response) {
                    window.location.reload();
                }
            })

        }

        function delete_article(id) {

            $.ajax({
                type: "POST",
                url: "/_ajax/index.php",
                data: {
                    id: id,
                    mode: 'delete_article'
                },
                success: function(response) {
                    window.location.reload();
                }
            })

        }

        function modify_view_article(id) {

            $.ajax({
                type: "POST",
                url: "/_ajax/index.php",
                data: {
                    id: id,
                    mode: 'article_update_view'
                },
                dataType: 'json',
                success: function(response) {
                    $("input[name=article_id]").val(id);
                    $("input[name=article_title]").val(response.title);
                    editor.setHTML(response.content);

                    if ($("#save-btn").children('button').length == 1) {
                        $("#save-btn").prepend(`<button type="button" onclick="exit_modify_view();" class="px-6 py-2 w-full bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition" style="background-color:red;">UPDATE CANCEL</button>`);
                    }

                }
            })
        }

        function exit_modify_view() {
            window.location.reload();
        }
    </script>

</body>

</html>