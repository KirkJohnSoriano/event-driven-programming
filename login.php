<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Grocery IMS</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            display: flex;
            font-family: sans-serif;
            align-items: center;
            justify-content: center;
        }
        .container{
            display: flex;
            flex-direction: column;
            width: 300px;
            padding: 15px;
            border: 1px solid 
            rgb(0, 0, 0);
            border-radius: 5px;
        }
        input{
            margin: 5px 0px;
            height: 35px;
            padding: 7px;
        }
        button{
            height: 35px;
            margin: 5px 0px;
            background-color:
            lawngreen;
            border: none;
            border-radius: 5px;
            color: #333;
        }
        button:hover{
            background-color: #333;
            color: lawngreen;
        }
        .container h1{
            text-align: center;
            margin-bottom: 24px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <input type="Email"
        placeholder="Email">
        <input type="Password"
        placeholder="Password">
        <button>Login</button>
    </div>
    
</body>
</html>

