<?

require_once('../db/index.php');
require_once('../cookie/index.php');

db_connect();

$mode = $_REQUEST['mode'] ?? '';

// JSON 데이터 받기 (파일이 없는 경우도 포함)
$data = json_decode(file_get_contents("php://input"), true);

switch ($mode) {

    case 'login':

        $id = $_REQUEST['id'] ?? '';
        $pw = $_REQUEST['pw'] ?? '';

        if (empty($id)) {

            echo '아이디를 입력해주세요';
            exit;
        }

        if (empty($pw)) {

            echo '비밀번호를 입력해주세요';
            exit;
        }

        if ($id != 'admin' && $pw != 'admin9901') {

            echo 'Admin 정보를 확인해주세요';
            exit;
        }
        session_start();
        $_SESSION['login_user'] = $id;
        set_cookie('login_user', $id);

        header('Location: /admin');

        break;

    case 'site_info':

        $id = $_REQUEST['id'] ?? '';
        $domain = $_REQUEST['domain'] ?? '';
        $title = $_REQUEST['title'] ?? '';
        $description = $_REQUEST['description'] ?? '';
        $keyword = $_REQUEST['keyword'] ?? '';
        $email = $_REQUEST['email'] ?? '';

        $PROC_TYPE = !empty($id) ? 'UPDATE' : 'INSERT';

        if ($PROC_TYPE == 'UPDATE') {

            update('site_info', [
                "domain"    => $domain,
                "site_name"    => $title,
                "description"    => $description,
                "keyword"    => $keyword,
                "email"    => $email,
            ], [
                "id"   => $id,
            ]);
        } else if ($PROC_TYPE == 'INSERT') {

            insert('site_info', [
                "domain"    => $domain,
                "site_name"    => $title,
                "description"    => $description,
                "email"    => $email,
                "created_at" => date('Y-m-d H:i:s')
            ]);
        }

        echo json_encode([
            'ok'    => true,
            'msg'    => '저장되었습니다',
        ]);

        break;

    case 'portfolio':

        $res_array = [
            'ok'    => true,
            'msg'   => '저장되었습니다'
        ];

        if (empty($_FILES['files'])) {

            $res_array['ok'] = false;
            $res_array['msg'] = '파일이 존재하지 않습니다';

            echo json_encode($res_array);
            exit;
        }

        $uploadDir = '../admin/upload/';

        // 폴더 삭제 후 다시 생성
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // 새 폴더 생성
        }

        $files = $_FILES['files'];
        $totalFiles = count($files['name']); // 파일 개수

        for ($i = 0; $i < $totalFiles; $i++) {
            $fileName = !empty($files['name'][$i]) ? $files['name'][$i] : '';

            if (empty($fileName)) {
                continue;
            }

            $fileName = iconv("UTF-8", "EUC-KR", $fileName);

            $targetFilePath = $uploadDir . $fileName; // 저장될 경로
            $fileTmpPath = $files['tmp_name'][$i]; // 임시 경로
            $fileError = $files['error'][$i]; // 오류 코드

            // 파일 이동 (업로드 실행)
            move_uploaded_file($fileTmpPath, $targetFilePath);

            insert('portfolio', [
                'image_name'    => $fileName,
                'image_url'    => $targetFilePath,
                'created_at'    => date('Y-m-d H:i:s')
            ]);
        }

        echo json_encode([
            'ok'    => true,
            'msg'    => '저장되었습니다',
        ]);

        break;

    case 'remove_file':

        $file_id = $_REQUEST['file_id'] ?? '';

        delete("DELETE FROM portfolio WHERE id = '{$file_id}'");

        break;

    case 'article':

        $id = $_REQUEST['id'] ?? '';
        $title = $_REQUEST['title'] ?? '';
        $content = $_REQUEST['content'] ?? '';

        if (!empty($id)) {

            update('article', [
                "title" => $title,
                "content" => $content,
                "created_at" => date('Y-m-d H:i:s'),
            ], [
                "id"    => $id
            ]);
        } else {


            insert('article', [
                "title" => $title,
                "content" => $content,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }

        break;

    case 'article_update_view':

        $id = $_REQUEST['id'] ?? '';

        $article = select("SELECT * FROM article WHERE id = {$id}");

        echo json_encode(!empty($article[0]) ? $article[0] : []);
        exit;

        break;

    case 'delete_article':

        $id = $_REQUEST['id'] ?? '';

        delete("DELETE FROM article WHERE id = '{$id}'");

        break;
}
