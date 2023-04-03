<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="style.css"> -->
   <title>Login page</title>
   <link rel="preconnect" href="https://rsms.me/">
   <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
   <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body class="antialiased bg-slate-200">
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap');
      * {
         font-family: 'Noto Sans Thai', sans-serif;
      }

      h1 {
         font-size:25px;
      }

      .button {
  align-items: center;
  background: #edf1f7;
  border-radius: 10px;
  cursor: pointer;
  display: flex;
  height: 50px;
  justify-content: center;
  margin: 0 5px 0px 0px;
  width: 100%;
  background-color: #0060f6;
  color: #fff;
}
.footer {
   text-align:center;
   font-size: 14px;
}
   </style>

   <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300 place-content-center">
      <form method="post" action="login_action.php" class="my-10">

            <center><img src="//webcdn.bethekingth.com/thailand/images/index/logo-f6d7ac7569.png" alt="" width="240px"></center>
             <br>
            <h1 style="text-align:center;"><strong>ระบบคำนวณเกมเรียกข้าว่าท่านอ๋อง</strong> </h1>
            <br>
            <h4 style="text-align:center;">กรุณาล็อคอินเข้าสู่ระบบเพื่อใช้งาน </h4> <br>
         


         <?php
         if(isset($_SESSION['error'])){
            echo "<div class='errorMsg'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
         }
         ?>

            <div class="flex flex-col space-y-5">
            <label for="email">
                    <p class="font-medium text-slate-700 pb-2">ชื่อผู้ใช้</p>
                    <input id="email" name="email" type="text" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="กรอกชื่อผู้ใช้">
                </label>
                <label for="password">
                    <p class="font-medium text-slate-700 pb-2">รหัสผ่าน</p>
                    <input id="password" name="password" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="กรอกรหัสผ่าน">
                </label> <br/>
               <input type="submit" value="เข้าสู่ระบบ" class="button">
               <br><br>
               <div class="footer">
                 <h6>หากพบปัญหากรุณาติดต่อผู้ดูแลระบบ</h6> <br>
                 <h6>2023 © 「U」๏มารHilo88 z1sv34  All rights reserved. </h6>
               </div>
               
            </div>

         
      </form>
      <!-- <div class="link">
         Don't have an account yet? <a href="signup.php">Sign up</a>
      </div> -->
   </div>
</body>
</html>