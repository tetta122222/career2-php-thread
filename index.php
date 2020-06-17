<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>掲示板Appppppp</h1>
    <h2>投稿フォーム</h2>
    <form action="index.php" method="post">
      <div class="form_child">
        <input type="text" name="name" placeholder="名前" class="name" required >
        <br>
        <textarea type="text" name="naiyou"class="form" required ></textarea>
        <br>
        <input type="submit" name="aaa" placeholder="あああああ" class="sou">
      </div>  
    </form>
    <form action="index.php" method="post">
        <button type="submit" name="remove" class="sou era">全消しボタン</button>
    </form>
    <hr>
    <h2>スレッド</h2>
    <hr>

    <?php
        //echo date('Y年m月d日 H時i分s秒');
        //echo("<br>");
        
        $file = "toukou.txt";
        if(isset($_POST['remove'])) {
          $fp = fopen('toukou.txt', 'a');
          echo "<p>消えたお</p>";
          ftruncate($fp,0);
          fclose($fp);
        }
        else if(@$_POST['aaa']) {
            //POSTされたときは書き込み処理をする
            date_default_timezone_set("Asia/Tokyo");
            $fp = fopen('toukou.txt', 'a');
            if ($fp == false) {
              print "このファイルには書き込みできません。<br>\n";
            }
            else{
              
              fwrite($fp,"<hr>");
              fwrite($fp,"<ul>");
              fwrite($fp,"<li>");
              fwrite($fp, "投稿時間：");
              fwrite ($fp,date("Y年m月d日 H時i分s秒"));
              fwrite($fp,"</li>");
              fwrite($fp,"<li>");
              fwrite($fp,"名前：");
              fwrite($fp, $_POST['name']);
              fwrite($fp,"</li>");
              fwrite($fp,"<li>");
              fwrite($fp,"内容：");
              fwrite($fp, $_POST['naiyou']);
              fwrite($fp,"</li>");
              fwrite($fp,"</ul>");
              fwrite($fp,"<hr>");
              

              $ret_str = file_get_contents( $file );
              echo($ret_str);
              fclose($fp);
              
            }
            
          }


          //$text = file_get_contents($file);
          //$text = htmlspecialchars($text);
    ?>
    <style>
    h1{
      text-align:center;
    }
    .name{
      width: 30%;
      margin-right: calc(100%/3);
      margin-left: calc(100%/3);
    }
    h2{
      text-align:center;
    }
    input{
     margin:10px auto;
     
    }
    .sou{
      font-weight:bold;
      width:20%;
      margin-right:40%;
      margin-left:40%;
      height:2rem;
      background:transparent;
      color:#7a7ae0;
      border-radius:3rem;
      border: solid 3px #7a7ae0;
    }
   .sou:active{
    border-radius:3rem;
    border: solid 3px #7a7ae0;
    background:green;
     transition:2s;
     border:none;
   

    }
    hr{
      width:80vw
    }
    
    ul{
      margin:2rem auto;
      width:80vw;
    }
    .era{
      border:red solid 3px;
      color:red;
    }
    li{
      list-style-type:none;
    }
    .form{
      width: 30%;
      height:100px;
      margin-right: calc(100%/3);
      margin-left: calc(100%/3);
      resize:none;
    }
    @media(max-width:480px){
      .sou{
        width:50%;
        margin:0 25% 0 25%;
      }
      .name{
        width:50%;
        margin:0 25% 0 25%;
      }
    }
    
    </style>
    
    <script>
    
    </script>
</body>
</html>