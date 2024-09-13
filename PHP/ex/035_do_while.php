<?php
// 조건이 안맞아도 무조건 한번은 실행

$cnt = 1;
while($cnt < 1) {
    echo "와일문";
}

do {
    echo "두 와일문";
}
while($cnt < 1);