<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'userdb');
?>
 
 
<html>

    <head>
        
        <title>My_Decoder</title>
 
        <script type="text/javascript" src="jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <style type="text/css">
        
            .imglogo
            {
                margin-top: 20px;
                margin-bottom: 0px;
                margin-right: 25px;
                margin-left: 25px;
                height: 100px;
                width: 100px;
                background-color: white;
                
            }
            #minion
            {
                margin-top: 20px;
                margin-bottom: 0px;
                margin-right: 10px;
                margin-left: 10px;
                height: 250px;
                width: 140px;
                background-color: white;
                float: right;
            }
            #square
            {
                float: right;
                width: 1000px;
                height: 100%;
                margin-top: 20px;
                margin-bottom: 20px;
                margin-right: 0px;
                margin-left: 0px;
                padding: 20px;
                background-image: url('https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/rm27-minty-02-summerbackground.jpg?bg=transparent&con=3&cs=srgb&dpr=1&fm=jpg&ixlib=php-3.1.0&q=80&usm=15&vib=3&w=1300&s=a865d2f2ea8a2582e55d76509162f5b2');
            }
            body {
                
                font-family: sans-serif;
                padding:0;
                margin:0;
                background-color: #EEEEEE
                
            }
            
            #header {
                
                width:100%;
                padding:5px;
                height: 35px;
                background-image: url('https://cdn5.vectorstock.com/i/1000x1000/80/19/green-marble-texture-background-vector-20868019.jpg');
                border-radius: 50px 20px;
                
            }
            
            #logo {
                
                float:left;
                font-weight: bold;
                font-size: 120%;
                padding: 3px 5px;
                
            }
            
            #buttonContainer {
                
                width:400px;
                margin: 0 auto;
                
                
            }
            
            .toggleButton {
                
                float:left;
                border: 1px solid grey;
                padding: 6px;
                border-right: none;
                font-size: 90%;
                
            }
        
            #html {
                
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
                
            }
            
            .output {
                
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
                border-right: 1px solid grey;
                
            }
            
            .active {
                
                background-color: #E8F2FF;
                
            }
            .highlightedButton {
                
                background-color: grey;
                
            }
            .panel {
                
                float:left;
                width: 50%;
                border-left: none;
            }
            textarea {
                
                resize: none;
                background-color: #EEE8AA;
                
            }
            iframe {
                
                border:none;
                
            }
            
            .hidden {
                
                display: none;
                
            }
        
        </style>
        
    </head>

    <body style="background-image: url('https://previews.123rf.com/images/germanopoli/germanopoli1712/germanopoli171200024/91260633-light-blue-exposed-concrete-wall-texture-sky-effect-grunge-textures-and-backgrounds-perfect-backgrou.jpg');">
        <a href="C:\Users\Ankita Senthil\Desktop\sem7\P-web_lab\weblab_project\xml_forWeb_lab\languages.xml">More information</a>
        <div id="minion">
            <img src="https://data.whicdn.com/images/72196045/original.jpg" style="width:140px;height:200px;">
            <p style="text-align:center;color:green;font-size: 15px;"></b></p>
        </div>
        
        <div id="square">
        <div id="header">
        
            <div id="logo">
            
                My_Decoder
                
            </div>
            
            <div id="buttonContainer">
                
                <div class="toggleButton active" id="html"><button>HTML</button></div>
                
                <div class="toggleButton" id="css"><button>CSS</button></div>
                
                <div class="toggleButton" id="javascript"><button>JavaScript</button></div>
                
                <div class="toggleButton active output"><button>Output</button></div>
                <div class="toggleButton output m-auto d-block"><button><a href="logout.php" class="btn btn-danger m-auto">Sign Out</a></button></div>
            
            </div>
        
        </div>
        
        <div id="bodyContainer">
        
            <textarea id="htmlPanel" class="panel"><p id="paragraph">Hello World!</p></textarea>
            
            <textarea id="cssPanel" class="panel hidden">p { color: green; }</textarea>
            
            <textarea id="javascriptPanel" class="panel hidden">document.getElementById("paragraph").innerHTML = "Hello!";</textarea>
            
            <iframe id="outputPanel" class="panel"></iframe>
        
        
        </div>
        
        </div>
        <div class="imglogo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/1200px-HTML5_logo_and_wordmark.svg.png" style="width:100px;height:100px;">
        </div>
        <div class="imglogo">
            <img src="https://cdn.worldvectorlogo.com/logos/css3.svg" style="width:100px;height:100px;">
        </div>
        <div class="imglogo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTgC6vRmJVYMmS_2IqSVlnUURfI1NYe7u033A&usqp=CAU" style="width:100px;height:100px;">
        </div>
        
        <script type="text/javascript">
            
            function updateOutput() {
                
                $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
                
                document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
                
                
                
            }
            
            $(".toggleButton").hover(function() {
                
                $(this).addClass("highlightedButton");
                
            }, function() {
                
                $(this).removeClass("highlightedButton");
                
            });
            
            $(".toggleButton").click(function() {
                
                $(this).toggleClass("active");
                
                $(this).removeClass("highlightedButton");
                
                var panelId = $(this).attr("id") + "Panel";
                
                $("#" + panelId).toggleClass("hidden");
                
                var numberOfActivePanels = 4 - $('.hidden').length;
                
                $(".panel").width(($("#square").width() / numberOfActivePanels)-3);
                
            })
            
            $(".panel").height($("#square").height() - $("#header").height());
            
            $(".panel").width(($("#square").width() / 2)-3);
            
            updateOutput();
            
            $("textarea").on('change keyup paste', function() {
    
                updateOutput();
                
                
            });
            
    

        </script>
        
        
    </body>

</html>