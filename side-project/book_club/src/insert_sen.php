<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/background.css">
   <link rel="stylesheet" href="./css/post_dis.css">
   <title>발제문</title>
</head>
<body>
   <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
       <p>인상깊은 문장 작성</p>
   </div>
   <div class="container">
       <form action="./sentense.html">
           <div class="box">
               <div class="box_title">이름</div>
               <div class="insert">
                   <input type="text" id="name" name="name" autofocus required >
               </div>
               <div class="box_title">제목</div>
               <div class="insert">
                   <input type="text" id="title" name="title" required maxlength="50">
               </div>
           </div>
               <div>
               <div class="box_content_title">내용</div>
               <div class="box_content">
                   <textarea name="content" id="content" required></textarea>
               </div>
               </div>
           <div class="board_footer">
               <button class="btn"><a href="/sentense.php">취소</a></button>
               <button class="btn"><a href="/sentense.php">완료</a></button>
           </div>
       </form>



   </div>
   <div class="menu_bar">
    <a href="./main.html">
        <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
    </a>
</div>
</body>
</html>