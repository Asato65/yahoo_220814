<?php
  if (!$_GET['url']) {
    die();  // データが送信されていないとき終了
  } else {
    $code = file_get_contents($_GET['url']);  // サイトのHTMLコードを取得
    $search1 = '<a data-audio="';  // 取得したい文字列の前の部分
    $search2 = '" class="audio"></a>';  // 取得したい文字列の後の部分
    $pos = strpos($code, $search1) + strlen($search1);  // 取得する文字の始まり位置
    $len = strpos($code, $search2) - $pos;  // 取得する文字数
    $music_id= substr($code, $pos, $len);  // 文字を取得（この文字が音声ファイルのIDとなる）
    
    echo "{\"music_id\": \"{$music_id}\"}";  // jsonの形で出力（サイズが小さいので直接テキストとして記述）
    die();  // 終了
  }
?>
