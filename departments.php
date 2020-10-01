<?php require_once('Service/department-service.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departments</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link rel="stylesheet" href="./css/student-profile.css">
    <link rel="stylesheet" href="./css/front-style.css">
    <link rel="stylesheet" type="text/css" href="css/department.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    
</head>

<body>
    <?php if(isset($_SESSION['first_name'])){
        echo '<div class="logger">Welcome ';
        echo $_SESSION["first_name"];
        echo '!&nbsp <a href="Service/logout.php">Log
                    Out</a><span id="index-no" style="display: none;">';
        echo $_SESSION["index_no"];
        echo '</span></div>';
    } ?>
        <section id="header">
        <div class="header container" style="background-color:yellow;">
            <div class="logo" style="float:left;width: 688px;
    height: 211px;padding-left:20px;">
                <img src="./img/web/ntslogopng.png" alt="Logo" style="width:35%;">
            </div>
            <div class="nav-bar">

                <div class="brand">
                    <!-- <a href="#home"><h1><span>N</span>urses <span>T</span>raining <span>S</span>chool </h1></a> -->
                    <br>
                    <div class="name">


                    </div>

                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a style="font-size: 20px;" href="index.php" data-after="Home"
                                onclick="topFunction()"><b>Home</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#about" data-after="About"><b>About</b></a></li>                   
                        <li><a style="font-size: 20px;" href="" data-after="Departments"><b>Departments</b></a>
                        </li>
                        <li><a style="font-size: 20px;" href="gallery.php" data-after="Gallery"><b>Gallery</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#contact" data-after="Contact"><b>Contact</b></a></li>
                        <li><a style="font-size: 20px;" href="login.php" data-after="Login"><b>Login</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="wrapper">
        <div class="main_content">
            <div class="header">DEPARTMENTS</div>



            <div id="courses">
                <div class="first">
                    <div id="fix" class="fix">
                        <div class="heading" id = 'heading' >
                            <h2>Fundamentals of Nursing</h2> 
                        </div>
                        <div class="content" id="content">
                            <h3 >Department Head</h3> 
                                <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />   
                                <?php 
                                    $pic =  "profile-pictures/{$fund["head"]}.png";
                                    $index = "{$fund["head"]}";
                                    $details = $all_details[$index];
                                    $name = $details['name'];
                                    $post = $details['post'];
                                    $degree = $details['degree'];
                                    $title = $details['title'];
                                    if(file_exists($pic)){
                                        echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";    
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>";    
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";     
                                        }
                                    }
                                    else{
                                        echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>"; 
                                            echo "<p class = 'dephead' >{$post}</p>";
                                            echo "<p class = 'dephead' >({$degree})</p>";            
                                        } 
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";     
                                        }
                                        
                                                                               
                                    }                                    
                                ?>
                          
                            <h3>Lecturers</h3>
                                <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />                                
                            <p>

                                <ul class= 'lecturers' id="lecturers1">                                    

                                    <?php 
                                        for($j=0;$j<count($fund["lecturers"]);$j++){
                                            $pic =  "profile-pictures/{$fund["lecturers"][$j]}.png";
                                            $index = "{$fund["lecturers"][$j]}";
                                            $details = $all_details[$index];
                                            $name = $details['name'];
                                            $post = $details['post'];
                                            $degree = $details['degree'];   
                                            $title = $details['title'];                                     
                                            if(file_exists($pic)){
                                                echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                                echo "<br>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";    
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>"; 
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";  
                                                }   
                                            }
                                            else{
                                                echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                                echo "<br>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>"; 
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";    
                                                }        
                                            }
                                            
                                        }
                                    ?>
                                    

                                </ul>

                            </p>
                            <h3>Modules</h3>
                                <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />                                
                                <ul class="mod">
                                    <li>Pharmacology</li>
                                    <li>Nutrition</li>
                                    <li>First Aid</li>    
                                    <li>Fundamental of Nursing</li>    
                                    <li>Mental Health & Psychiatric Nursing</li>      
                                    <li>Mental Health & Psychiatric Nursing Practice</li>      
                                </ul>
                        </div>
                        <div id="btnnn" class="link">
                            <i id="icon" class="fas fa-chevron-down fa-2x" style="float: right;"></i>
                        </div>

                    </div>
                    </fieldset>
               </div>
                <br>
               <div class="second">
                    <div id="fix2" class="fix2">
                        <div class="heading2" id = 'heading2' >
                            <h2>Medical Nursing</h2>
                        </div>
                        <div class="content2" id="content2">
                            <h3>Department Head</h3>    
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />                           
                                <?php 
                                    $pic =  "profile-pictures/{$med["head"]}.png";
                                    $index = "{$med["head"]}";
                                    $details = $all_details[$index];
                                    $name = $details['name'];
                                    $post = $details['post'];
                                    $degree = $details['degree'];
                                    $title = $details['title'];
                                    if(file_exists($pic)){
                                        echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";    
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>";    
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";
                                        }
                                    }
                                    else{
                                        echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";   
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>";  
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";   
                                        }
                                    }                                    
                                ?>
                            <h3>Lecturers</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                            <p >
                                <ul class= 'lecturers' id="lecturers2">
                                    
                                    <?php 
                                        for($j=0;$j<count($med["lecturers"]);$j++){
                                            $pic =  "profile-pictures/{$med["lecturers"][$j]}.png";
                                            $index = "{$med["lecturers"][$j]}";
                                            $details = $all_details[$index];
                                            $name = $details['name'];
                                            $post = $details['post'];
                                            $degree = $details['degree']; 
                                            $title = $details['title'];                                       
                                            if(file_exists($pic)){
                                                echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";    
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>";
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>"; 
                                                }    
                                            }
                                            else{
                                                echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>";   
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";
                                                }      
                                            }
                                            
                                        }
                                    ?>

 

                                </ul>
                            </p>
                            <h3>Modules</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                                <ul class="mod" >
                                    <li>Anatomy & Physiology</li>
                                    <li>Microbiology</li>
                                    <li>Pathology</li>
                                    <li>Medical Nursing & Medicine</li>        
                                    <li>Medical Nursing Practice</li>        
                                </ul>
                        </div>
                        <div id="btn2" class="link2">
                            <i id="icon2" class="fas fa-chevron-down fa-2x" style="float: right;"></i>
                        </div>
                    </div>
               </div>
                <br>
               <div class="third">
                    <div id="fix3" class="fix3">
                        <div class="heading3" id = 'heading3' >
                            <h2>Surgical Nursing</h2>
                        </div>
                        <div class="content3" id="content3">
                            <h3>Department Head</h3>    
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />                           
                                <?php 
                                    $pic =  "profile-pictures/{$surg["head"]}.png";
                                    $index = "{$surg["head"]}";
                                    $details = $all_details[$index];
                                    $name = $details['name'];
                                    $post = $details['post'];
                                    $degree = $details['degree'];
                                    $title = $details['title'];
                                    if(file_exists($pic)){
                                        echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";    
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>";    
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";
                                        }
                                    }
                                    else{
                                        echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";     
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>";  
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";     
                                        }
                                    }                                    
                                ?> 
                            <h3>Lecturers</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                            <p >
                                <ul class= 'lecturers' id="lecturers3">
                                    <?php 
                                        for($j=0;$j<count($surg["lecturers"]);$j++){
                                            $pic =  "profile-pictures/{$surg["lecturers"][$j]}.png";
                                            $index = "{$surg["lecturers"][$j]}";
                                            $details = $all_details[$index];
                                            $name = $details['name'];
                                            $post = $details['post'];
                                            $degree = $details['degree'];   
                                            $title = $details['title'];                                     
                                            if(file_exists($pic)){
                                                echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";    
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>";   
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";  
                                                } 
                                            }
                                            else{
                                                echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>"; 
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";
                                                }        
                                            }
                                            
                                        }
                                    ?>



                                </ul>
                            </p>
                            <h3>Modules</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                                <ul class="mod" >
                                    <li>Psychology</li>
                                    <li>Sociology</li>
                                    <li>History of Nursing</li>         
                                </ul>
                        </div>
                        <div id="btn3" class="link3">
                            <i id="icon3" class="fas fa-chevron-down fa-2x" style="float: right;"></i>
                        </div>
                    </div>
               </div>
               <br>
               <div class="fourth">
                    <div id="fix4" class="fix4">
                        <div class="heading4" id = 'heading4' >
                            <h2>Maternal & Child Care Nursing</h2>
                        </div>
                        <div class="content4" id="content4">
                            <h3>Department Head</h3>   
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />                            
                                <?php 
                                    $pic =  "profile-pictures/{$maternal["head"]}.png";
                                    $index = "{$maternal["head"]}";
                                    $details = $all_details[$index];
                                    $name = $details['name'];
                                    $post = $details['post'];
                                    $degree = $details['degree'];
                                    $title = $details['title'];
                                    if(file_exists($pic)){
                                        echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";    
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>"; 
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";
                                        }   
                                    }
                                    else{
                                        echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";     
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>"; 
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";
                                        }
                                    }                                    
                                ?>
                            <h3>Lecturers</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                            <p >
                                <ul class= 'lecturers' id="lecturers4">
                                    <?php 
                                        for($j=0;$j<count($maternal["lecturers"]);$j++){
                                            $pic =  "profile-pictures/{$maternal["lecturers"][$j]}.png";
                                            $index = "{$maternal["lecturers"][$j]}";
                                            $details = $all_details[$index];
                                            $name = $details['name'];
                                            $post = $details['post'];
                                            $degree = $details['degree'];  
                                            $title = $details['title'];                                      
                                            if(file_exists($pic)){
                                                echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";    
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>";
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>"; 
                                                }    
                                            }
                                            else{
                                                echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>"; 
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";
                                                }        
                                            }
                                            
                                        }
                                    ?>  

                                </ul>
                            </p>
                            <h3>Modules</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                                <ul class="mod" >
                                    <li>Gynecological Nursing & Gynecology</li>
                                    <li>Gynecological Nursing Practice</li>
                                    <li>Obstetric Nursing & Obstetric</li>    
                                    <li>Obstetric Nursing Practice</li>    
                                    <li>Paediatric Nursing & Paediatric</li>    
                                    <li>Paediatric Practice</li>      
                                </ul>
                        </div>
                        <div id="btn4" class="link4">
                            <i id="icon4" class="fas fa-chevron-down fa-2x" style="float: right;"></i>
                        </div>
                    </div>
               </div>
               <br>
               <div class="fifth">
                    <div id="fix5" class="fix5">
                        <div class="heading5" id = 'heading5' >
                            <h2>Management & Research</h2>
                        </div>
                        <div class="content5" id="content5">
                            <h3>Department Head</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />                               
                                <?php 
                                    $pic =  "profile-pictures/{$research["head"]}.png";
                                    $index = "{$research["head"]}";
                                    $details = $all_details[$index];
                                    $name = $details['name'];
                                    $post = $details['post'];
                                    $degree = $details['degree'];
                                    $title = $details['title'];
                                    if(file_exists($pic)){
                                        echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";    
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>";  
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>";   
                                        }  
                                    }
                                    else{
                                        echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                        if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                            echo "<p class = 'dephead' >{$title}.{$name}</p>";     
                                            echo "<p class = 'dephead' >{$post}</p>";    
                                            echo "<p class = 'dephead' >({$degree})</p>"; 
                                        }
                                        else{
                                            echo "<p class = 'dephead' >{$name}</p>"; 
                                        }
                                    }                                    
                                ?>
                            <h3>Lecturers</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                            <p >
                                 <ul class= 'lecturers' id="lecturers5">
                                    <?php 
                                        for($j=0;$j<count($research["lecturers"]);$j++){
                                            $pic =  "profile-pictures/{$research["lecturers"][$j]}.png";
                                            $index = "{$research["lecturers"][$j]}";
                                            $details = $all_details[$index];
                                            $name = $details['name'];
                                            $post = $details['post'];
                                            $degree = $details['degree']; 
                                            $title = $details['title'];                                       
                                            if(file_exists($pic)){
                                                echo "<img src= '{$pic}' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";    
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>";    
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";
                                                }
                                            }
                                            else{
                                                echo "<img src= 'img/empty-pp.png' alt='Avatar' class='avatar'>";
                                                if((strlen($post)!=0) && (strlen($title)!=0) && (strlen($degree)!=0) ){
                                                    echo "<li>{$title}.{$name}<br></li>";
                                                    echo "<li>{$post}<br></li>";    
                                                    echo "<li>({$degree})<br></li>";  
                                                }
                                                else{
                                                    echo "<li>{$name}<br></li>";
                                                }       
                                            }
                                            
                                        }
                                    ?>



                                </ul>
                            </p>
                            <h3>Modules</h3>
                            <hr style="border: 0.5px solid black;margin-top: 10px;width: 80%;" />
                                <ul class="mod" >
                                    <li>English</li>
                                    <li>IT</li>   
                                </ul>
                        </div>
                        <div id="btn5" class="link5">
                            <i id="icon5" class="fas fa-chevron-down fa-2x" style="float: right;"></i>
                        </div>
                    </div>
               </div>

            </div>


        </div>

    </div>
<script src="./js/js-dep.js"></script>
<script src="js/frontPage.js"></script> 

</body>

</html>
