<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        
    <?php
        
        mb_internal_encoding("utf8");
        
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
        $stmt = $pdo -> query("select * from 4each_keijiban");
        
        
    ?>
    
    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
     </header>
        
    <main>
        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1><br>
    
            <form method="post" action="insert.php">
                <h2>入力フォーム</h2>
        
                <div>
                    <label>ハンドルネーム</label><br>
                    <input type="text" class="text" size="40" name="handlename" required>
                </div>
                
                <div>
                    <label>タイトル</label><br>
                    <input type="text" class="text" size="40" name="title" required>
                </div>
            
                <div>
                    <label>コメント</label><br>
                    <textarea rows="3" cols="60" name="comments" required></textarea>
                </div>
                
                <div>
                    <input type="submit" class="submit" value="投稿する">
                </div>
                
            </form>
            
            <?php
            
                
                while ($row = $stmt -> fetch()){
                    echo "<div class='kiji'>";
                    echo "<h2>".$row['title']."</h2>";
                    echo "<div class='contents'>";
                    echo $row['comments'];
                    echo "<div class='handlename'>posted by" .$row['handlename']."</div>";
                    echo "</div>";
                    echo "</div>";
                }
            
            ?>
            
        </div>
            
        <div class="right">
            <div class="side">
                <h2>人気の記事</h2>
                <ul class="sub">
                    <li>PHPオススメ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ　Top5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h2>オススメリンク</h2>
                <ul class="sub">
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h2>カテゴリ</h2>
                <ul class="sub">
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
                </div>
        </div>
    
    </main>
        
    <footer>
        copyright ©︎ internous | 4each blig the which provides A to Z about programing.
    </footer>
    
    </body>

</html>