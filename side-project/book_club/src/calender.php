<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/calender.css">
    <link rel="stylesheet" href="./css/background.css">
    <title>일정</title>
    </style>
</head>
<body>
    <div class="board_title" style="background-image: url('../img/창_이모티콘.png');">
        <p>일정</p>
    </div>
    <div style="background-image: url('../img/창_이모티콘.png');"></div>
    <div class="container">
    <div class="calender">
        <h2>2024년 10월</h2>
        <div>
            <div class="weeks">
                <div>sun</div>
                <div>mon</div>
                <div>tue</div>
                <div>wed</div>
                <div>thu</div>
                <div>fri</div>
                <div>sat</div>
            </div>
        
            <div class="days">
                <div></div>
                <div></div>
                <?php for($d = 1; $d < 32 ; $d++)?>


                <div><a href="./post_discussion.html">1</div></a>
                <div><a href="">2</a></div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>9</div>
                <div>10</div>
                <div>11</div>
                <div>12</div>
                <div>13</div>
                <div>14</div>
                <div>15</div>
                <div>16</div>
                <div>17</div>
                <div>18</div>
                <div>19</div>
                <div>20</div>
                <div>21</div>
                <div>22</div>
                <div>23</div>
                <div>24</div>
                <div>25</div>
                <div>26</div>
                <div>27</div>
                <div>28</div>
                <div>29</div>
                <div>30</div>
                <div>31</div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    </div>
    <div class="menu_bar">
        <a href="/main.php">
            <img class="home_btn" src="../img/home_btn.png" alt="메인" width="146px" height="43px">
        </a>
    </div>
</body>
</html>