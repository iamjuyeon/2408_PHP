<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/myCommon.css">
    <title>작성페이지</title>
</head>
<body class="vh-100">
    <!-- 상단 게시판 바 -->
    <?php require_once('View/inc/header.php'); ?>

    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 300px;" action="/regist" method="POST" enctype="multipart/form-data">
            <!-- 에러메세지 -->
        <?php require_once('View/inc/errorMsg.php'); ?>

            <div class="mb-3">
                <label for="b_title" class="form-label">> 제목</label>
                <input type="text" class="form-control" id="b_title" name="b_title">
            </div>
            <div class="mb-3">
                <label for="b_content" class="form-label">> 내용</label>
                <input type="text" class="form-control" id="b_content" name="b_content">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">이미지</label>
                <input type="file" name="file">
            </div>
            <button type="submit" class="btn btn-dark w-100 mb-3">완료</button>
            <a href="/boards" class="btn btn-secondary w-100">취소</a>
        </form>

    </main>


    <!-- footer -->
    <footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>