<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: rgb(138, 133, 133);
        }
        .main {
            width: 500px;
            
            background-color: white;
            padding: 20px;
            display: flex;
            margin: auto;
            gap: 20px;
            margin-top: 20px;
            border-radius: 15px;
        }
        .side1 {
            width: 40%;
        }
        .side2 {
            width: 60%;
        }
        .img {
            width: 100%;
            height: 190px;
            border-radius: 10px;
        }
        .info {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            width: 100%;
            
            margin-bottom: 15px;
            padding: 10px;
            background-color: rgb(199, 196, 196);
            border-radius: 10px;

        }
        .links {
           display: flex;
           justify-content: space-around;
           
           gap: 20px;
        }
        .link1, .link2 {
            background-color: rgb(255, 255, 255);
            border: 1px solid rgb(133, 133, 133);
            width: 50%;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        } 
        .name , .name2 {
            margin: 5px;
        }
        .col {
            color: rgb(148, 147, 155);
        }
        .link1 {
            color: rgb(120, 121, 133);
        }
        .link2 {
            background-color: rgb(72, 72, 247);
            color: white;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="side1">
            <img class="img" src="spider1.jpg" alt="">
        </div>
        <div class="side2">
            <h3 class="name">Alex Morrian</h3>
            <p class="name2 col">Journalist</p>
            <div class="info">
                <div>
                    <p class="col">Articals</p>
                    <h3>45</h3>
                </div>
                <div>
                    <p class="col">Followers</p>
                    <h3>797</h3>
                </div>
                <div>
                    <p class="col">Rating</p>
                    <h3>4.5</h3>
                </div>
                
            </div>
            <div class="links">
                <a class="link1" href="#">Chat</a>
                <a class="link2" href="#">Follow</a>
            </div>
        </div>
    </div>
</body>
</html>
