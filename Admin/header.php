<header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="main.php" class="logo">Let<span class="lite">Me</span>Bid</a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
               
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                   
                    
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    <!-- Approve Products -->
                    
                    <?php
                     
                     require 'database.php';
                     $obj=new database();
                     $res=$obj->approveproducts();
                     $res1=$obj->productbylimit();
                     $cnt=mysql_num_rows($res1);

                    echo '
                
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">'.$cnt.'</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have '.$cnt.' new messages</p>
                            </li>';
                            while($row=mysql_fetch_assoc($res1))
                            {

                            $sortcontent=substr($row["product_name"],0,20)."...";

                            echo'

                            
                                <li>
                                    <a href="product_approve.php">
                                        <span class="photo"><img src="../image/'.$row["product_photo"].'"></span>
                                        <span class="subject">
                                        <span class="from">'.$sortcontent.'</span>
                                        <span class="time"></span>
                                        <span class="message"></span>
                                        </span>
                                        
                                    </a>
                                </li>';
                            }
                            echo '
                            <li>
                                <a href="product_approve.php">See all messages</a>
                            </li>
                        </ul>
                    </li>';
                    ?>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                    <!-- Approve Users -->
                    <?php

                   
                    $obj=new database();
                    $res=$obj->approveusers();
                    $cnt=mysql_num_rows($res);
                     
                    echo '
                        <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">'.$cnt.'</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have '.$cnt.' new notifications</p>
                            </li>';
                            
                    
                    while($row=mysql_fetch_assoc($res)) 
                    {
                        
                       // $time=date("i");
                        $user_first_name=$row["user_first_name"];
                        echo '
                            <li>
                                <a href="user_approve.php">
                                    <img src="../userphoto/'.$row["user_photo"].'" height="40px" width="40px">&nbsp;
                                    <span class="label label-primary"></span> 
                                    '.$row["user_first_name"].'
                                  
                                </a>
                            </li>';
                     
                     
                    }
                    echo '
                            <li>
                                <a href="user_approve.php">See all notifications</a>
                            </li>
                        </ul>
                    </li>';
                    ?>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                    <?php
                       $obj=new database();
                       $res=$obj->userdisplaybyid($user_email_id);
                       while($row=mysql_fetch_assoc($res))
                       {
                            $user_first_name=$row["user_first_name"];
                            $user_photo="../userphoto/".$row["user_photo"];
                       }
                    echo '<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="'.$user_photo.'" height="40px" width="40px">
                            </span>
                            <span class="username">'.$user_first_name.'</span>
                            <b class="caret"></b>
                        </a>';
                    ?>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="myprofile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li class="eborder-top">
                                <a href="user_otheradmin.php"><i class="icon_profile"></i> Other Admins</a>
                            </li>
                            <li>
                                <a href="index.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                           </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      