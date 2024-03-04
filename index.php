<?php  include 'include/config.php';
$sql = "SELECT * FROM users,about WHERE id = 1";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name']?></title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/img/favicon1.png" type="image/png">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">

    <!-- CSS  -->
    <link rel="stylesheet" href="./assets/css/index-style.css">

</head>

<body>

    <!--=============== HEADER ===============-->
    <header class="header" id="header">

        <!-- Navbar -->
        <nav class="nav container">

            <!-- Logo -->
            <a href="" class="nav__logo"><?php echo $data['name']?></a>

            <!-- Menu -->
            <div class="nav__menu">
                <ul class="nav__list">

                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">
                            <i class='bx bx-home-alt'></i>
                        </a>
                    </li>
                    <!-- //about -->
                    <li class="nav__item">
                        <a href="#about" class="nav__link">
                            <i class='bx bx-user'></i>
                        </a>
                    </li>
                    <!-- //academics -->
                    <li class="nav__item">
                        <a href="#timeline" class="nav__link">
                            <i class='bx bx-book-alt' ></i>
                        </a>
                    </li>
                    <!-- Projects -->
                    <li class="nav__item">
                        <a href="#work" class="nav__link">
                            <i class='bx bx-briefcase-alt-2'></i>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class='bx bx-envelope'></i>
                        </a>
                    </li>
                </ul>
            </div>
        <!-- Theme change button -->
        <i class='bx bx-moon change-theme' id="theme-button"></i>
        </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== HOME ===============-->
        <section class="home section" id="home">
            <div class="home__container">
<!-- Home data -->
<div class="home__data">
<h1 class="home_name"><?php echo $data['name']?></h1>
<h4 class="home_education"><?php echo $data['title']?></h3>
</div>


<!-- CV buttons -->

<div class="handle__about__div">
<!-- Profile picture -->
<div class="home_handle">
<img src="assets/img/favicon1.png" alt="" class="home_img">
</div>
<!-- Home about me details -->
<div class="home__about">
<p class="home__about_description"><?php echo $data['homeabout']?></p>
</div>
</div>
<div class="buttons__social_div">


<div class="home__buttons">
    <a download="" href="#home" class="button button-ghost">
      Download CV
      <i class='bx bx-download'></i>
    </a>
    <a href="#contact" class="button button-ghost">Contact</a>
  </div>
  <h1 class="home__title">Let's Connect somewhere:</h1>
  <!-- Social media links -->
  <div class="home_social">
    <?php
        if($data['linkedin']) {
    ?>
        <a href="<?php echo $data['linkedin']?>" target = "__blank"  class="home_social-icon"><i class='bx bxl-linkedin'></i></a>
    <?php
        }
    ?>

    <?php
        if($data['github'] ) {
    ?>
        <a href="<?php echo $data['github']?>" target = "__blank"  class="home_social-icon"><i class='bx bxl-github'></i></a>
    <?php
        }
    ?>

    <?php
        if($data['twitter']) {
    ?>
        <a href="<?php echo $data['twitter']?>"target = "__blank"   class="home_social-icon"><i class='bx bxl-twitter'></i></a>
    <?php
        }
    ?>

    <?php
        if($data['facebook']) {
    ?>
        <a href="<?php echo $data['facebook']?>"target = "__blank"   class="home_social-icon"><i class='bx bxl-facebook'></i></a>
    <?php
        }
    ?>

    <?php
        if($data['youtube']) {
    ?>
        <a href="<?php echo $data['youtube']?>" target = "__blank"  class="home_social-icon"><i class='bx bxl-youtube'></i></a>
    <?php
        }
    ?>
    
  
  </div>

</div>

</div>

            
        </section>

        <!--=============== ABOUT ===============-->
        <section class="about section" id="about">
            <span class="section__subtitle">Personal Overview</span>
            <h2 class="section__title">Who I Am </h2>

            <div class="about__container container grid">
                
                <div class="about__data">
                    <div class="about__info">

                        <div class="about__box">
                           <i class='bx bxs-graduation'></i>
                            <h3 class="about__title">Education</h3>
                            <span class="about__subtitle"><?php echo $data['education']?></span>
                        </div>

                        <div class="about__box">
                            <i class='bx bx-briefcase-alt about__icon'></i>
                            <h3 class="about__title">Completed</h3>
                            <span class="about__subtitle"><?php echo $data['completed']?></span>
                        </div>

                        <div class="about__box">
                            <i class='bx bxs-objects-vertical-bottom' ></i>
                            <h3 class="about__title">Experience</h3>
                            <span class="about__subtitle"><?php echo $data['experience']?></span>
                        </div>
                    </div>

                    <p class="about__description">
                    <?php echo $data['about_details']?>
                    </p>

                    <a href="#contact" class="button">Have any Advice?</a>
                </div>
            </div>

          </section>

        <!--=============== SKILLS ===============-->
        <!-- <section class="skills section" id="skills">
            <span class="section__subtitle">Abilities & </span>
            <h2 class="section__title">Expertise</h2>

            <div class="skills__container container grid">

                <div class="skills__content">
                    <h3 class="skills__title">Frontend </h3>

                    <div class="skills__box">

                        <div class="skills__group">

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">HTML</h3>
                                    <span class="skills__level">Basic</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">CSS</h3>
                                    <span class="skills__level">Advanced</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">JavaScript</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__group">

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">Bootstrap</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">Git</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">React</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="skills__content">
                    <h3 class="skills__title">Backend , IDE and accessories</h3>

                    <div class="skills__box">

                        <div class="skills__group">

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">PHP</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">Node Js</h3>
                                    <span class="skills__level">Basic</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">Python</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>
                        </div>

                        <div class="skills__group">

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">MySQL</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>

                            <div class="skill__data">
                                <i class='bx bx-badge-check'></i>

                                <div>
                                    <h3 class="skills__name">Firebase</h3>
                                    <span class="skills__level">Intermediate</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        

        </section> -->
        <!--=============== TIMELINE ===============-->
    <section class="services section" id = "timeline">
            <span class="section__subtitle">Academic & Career</span>
            <h2 class="section__title">Timeline</h2>
        <div class="timeline">
            <!-- Timeline php portion -->
<?php
$sql = "SELECT * FROM timeline";
$timeline_result = mysqli_query($con, $sql);

// Check if the query executed successfully
if($timeline_result) {
    // Fetch all rows into an array
    $timeline_data_array = [];
    while($row = mysqli_fetch_assoc($timeline_result)) {
        $timeline_data_array[] = $row;
    }
    
    // Get the total number of rows
    $totalRows = count($timeline_data_array);
    
    // Iterate through the timeline data array in reverse order
    for ($i = $totalRows - 1; $i >= 0; $i--) {
        $timeline_data = $timeline_data_array[$i];
        
        // Determine if the row number is even or odd
        $isEven = (($totalRows - $i) % 2 == 0) ? true : false;

        // Apply different HTML structure based on whether the row number is even or odd
        if ($isEven) {
            // Apply HTML structure for even rows
            echo '<div class="Educontainer right-container">';
        } else {
            // Apply HTML structure for odd rows
            echo '<div class="Educontainer left-container">';
        }
        
        // Replace placeholders with data from the database
        $icon = $timeline_data['icon'];
        $organization = $timeline_data['organization'];
        $duration = $timeline_data['duration'];
        $details = $timeline_data['details'];
        $website = $timeline_data['website'];
?>
                <img src="<?php echo $icon; ?>" alt="">
                <div class="textbox">
                    <h2><?php echo $organization; ?></h2>
                    <small class><?php echo $duration; ?></small>
                    <p>
                        <?php echo $details; ?>
                    </p>
                    <a href="<?php echo $website; ?>" class="button">Visit Link</a>
<?php
        // Apply different arrow span based on whether the row number is even or odd
        if ($isEven) {
            // Apply HTML structure for even rows
            echo '<span class="right-container-arrow"></span>';
        } else {
            // Apply HTML structure for odd rows
            echo '<span class="left-container-arrow"></span>';
        }
?>
                </div>
            </div>
<?php
    }
} else {
    // Display an error message if the query fails
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

        </div>
    </section>
    

        <!--=============== Projects ===============-->
        <section class="work section" id="work">
            <span class="section__subtitle">All of my Recent</span>
            <h2 class="section__title">Projects</h2>

            <div class="work__filters">
                <span class="work__item active-work" data-filter="all">All</span>
                <span class="work__item" data-filter=".game">Game Dev.</span>
                <span class="work__item" data-filter=".android">android</span>
                <span class="work__item" data-filter=".others">Design & others</span>
            </div>

            <div class="work__container container grid">
    <!-- Projects PHP portion -->
    <?php

    include 'include/config.php';
    // Fetch all the projects from the database
    $sql = "SELECT * FROM projects";
    $project_result = mysqli_query($con, $sql);
    // Check if the query executed successfully
    if (!$project_result) {
        echo "Error: " . mysqli_error($con);
    } else {
        // Check if there are any projects
        if (mysqli_num_rows($project_result) > 0) {
            // Iterate through each project
            while ($row = mysqli_fetch_assoc($project_result)) {
                $projectType = $row['project_type'];
                $projectName = $row['project_name'];
                $projectImg = $row['project_image'];
                $projectDetails = $row['project_details'];
                $projectLink = $row['project_link'];
                ?>
                <!-- Output the project card HTML with the fetched data -->
                <div class="work__card mix <?php echo $projectType?>">
                    <img src="<?php echo $projectImg?>" alt="project icon" class="work__img">
                    <div class="card-info">
                        <div>
                            <h3 class="work__title"><?php echo $projectName?></h3>
                            <div class="card-buttons">
                                <span class="services__button work__button">
                                    <i class="bx bxs-detail"></i>Details
                                    <i class="bx bx-right-arrow-alt services__icon"></i>
                                </span>
                                <a href="<?php echo $projectLink?>" target="_blank" class="work__button">
                                    <i class="bx bxl-github"></i>GitHub
                                    <i class="bx bx-link-external services__icon" style="font-size: 0.8rem;"></i>
                                </a>
                                <div class="services__modal">
                                    <div class="services__modal-content">
                                        <i class="bx bx-x services__modal-close"></i>
                                        <div class="card-details-icon">
                                        </div>
                                        <h3 class="services__modal-title"><?php echo $projectName?></h3>
                                        <p class="services__modal-description"><?php echo $projectDetails ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No projects found.";
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>
    </div>
 </section>
        <!--=============== CONTACT ===============-->
        <section class="contact section" id="contact">
            <span class="section__subtitle">For any type of query/advice/work,</span>
            <h2 class="section__title">Reach Me</h2>
            

            <div class="contact__container container grid">

                <div class="contact__content">
                    <div class="contact__info">

                        <div class="contact__card">
                            <i class='bx bx-mail-send contact__card-icon'></i>
                            <h3 class="contact__card-title">Email</h3>
                            <span class="content__card-data">mofazzalhossen874@gmail.com</span>

                            <a href="mailto:mofazzalhossen874@gmail.com" target="_blank" class="contact__button">
                                Send a mail<i class='bx bx-right-arrow-alt contact__button-icon'></i>
                            </a>
                        </div>

                        <div class="contact__card">
                            <i class='bx bxl-whatsapp contact__card-icon'></i>
                            <h3 class="contact__card-title">Github</h3>
                            <span class="content__card-data">
                                Mofazzal874
                            </span>

                            <a href="https://www.github.com/Mofazzal874/"
                                target="_blank" class="contact__button">
                                Work with me<i class='bx bx-right-arrow-alt contact__button-icon'></i>
                            </a>
                        </div>

                        <div class="contact__card ">
                            <i class='bx bxl-messenger contact__card-icon'></i>
                            <h3 class="contact__card-title">LinkedIn</h3>
                            <span class="content__card-data">mofazzal874</span>

                            <a href="https://www.linkedin.com/in/mofazzal874/" target="_blank" class="contact__button">
                                Profile<i class='bx bx-right-arrow-alt contact__button-icon'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact__content">
                    <h3 class="contact__title">Want to say something??</h3>

                    <form action="contact.php" method= "post" class="contact__form">

                        <div class="contact__form-div">
                            <label for="" class="contact__form-tag">Name</label>
                            <input type="text" name = "name" placeholder="Insert you name" class="contact__form-input">
                        </div>

                        <div class="contact__form-div">
                            <label for="" class="contact__form-tag">Mail</label>
                            <input type="email" name = "email" placeholder="Insert your email" class="contact__form-input">
                        </div>

                        <div class="contact__form-div contact__form-area">
                            <label for="" class="contact__form-tag">Message/Suggestion</label>
                            <textarea name="" id="" cols="30" rows="10" name = "message" placeholder="Write your Message/Suggestion here..."
                                class="contact__form-input"></textarea>
                        </div>

                        <button class="button" name="send">Send Message</button>
                    </form>
                </div>

            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container">
            <h1 class="footer__title">Mofazzal</h1>

            <ul class="footer__list">
                <li>
                    <a href="#about" class="footer__link">About</a>
                </li>
                <li>
                    <a href="#work" class="footer__link">Projects</a>
                </li>
                <li>
                    <a href="#testimonial" class="footer__link">Timeline</a>
                </li>
            </ul>

            <ul class="footer__social">
                <a href="https://www.github.com/mofazzal874/" class="footer__social-link">
                    <i class='bx bxl-github'></i>
                </a>
                <a href="https://www.facebook.com/mofazzal874" class="footer__social-link">
                    <i class='bx bxl-facebook'></i>
                </a>
                <a href="https://www.instagram.com/mofazzal874" class="footer__social-link">
                    <i class='bx bxl-instagram'></i>
                </a>
                <a href="https://twitter.com/mofazzal874" class="footer__social-link">
                    <i class='bx bxl-twitter'></i>
                </a>
                <a href="https://www.linkedin.com/in/mofazzal874/" class="footer__social-link">
                    <i class='bx bxl-linkedin'></i>
                </a>
                <a href="https://www.youtube.com/@mofazzal874/" class="footer__social-link">
                    <i class='bx bxl-youtube'></i>
                </a>
                
            </ul>
            <ul class="footer__location">
                <li>
                    <i class='bx bx-current-location' ></i>
                </li>
                <li>
                    <span class="footer__location-text">Khulna, Bangladesh</span>
            </ul>
            <span class="footer__copy">
                &#169; mofazzal874. All rights reserved
            </span>
        </div>
    </footer>


    <!-- SCROLLREVEAL -->
    <script src="./assets/js/scrollreveal.min.js"></script>

    <!-- SWIPER JS -->
    <script src="./assets/js/swiper-bundle.min.js"></script>

    <!-- MIXITUP FILTER -->
    <script src="./assets/js/mixitup.min.js"></script>

    <!-- JavaScript -->
    <script src="./assets/js/main.js"></script>

</body>

</html>