 <!-- Masthead-->
        <!-- <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">About Us</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

    <section class="page-section">
        <div class="container"> -->
    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
            
        </div>
        </section>

        <!-- Masthead -->
<!-- <header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e; border-radius: 10px;">
                <h1 class="text-uppercase text-white font-weight-bold">About Us</h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header> -->

<!-- About Section -->
<section id="about">
    <div class="about-section"
        style="background: rgb(5,3,43); background: linear-gradient(90deg, rgba(5,3,43,1) 0%, rgba(21,62,74,1) 35%, rgba(23,40,43,1) 100%); border-radius: 15px; padding: 40px;">
        <h1 class="about-heading text-white text-center mb-4">About <span style="color: #17a2b8;">Us</span></h1>
        <div class="about-content d-flex flex-column flex-md-row">
            <!-- Left Side: YouTube Video -->
            <div class="about-video w-100 mb-4 mb-md-0" style="max-width: 50%;">
                <div class="video-container" style="border-radius: 10px; overflow: hidden;">
                    <video src="assets\img\About_video.mp4" autoplay loop muted style="width: 100%; height: auto; border-radius: 10px;"></video>
                </div>
            </div>

            <!-- Right Side: Content -->
            <div class="about-text w-100" style="color: white; padding: 0 20px;">
                <h3 style="color: #17a2b8;">Your occasion deserves our careful planning</h3>
                <p>
                    Welcome to Festiiv, your ultimate event management partner. We specialize in creating unforgettable
                    experiences with seamless planning, stunning decorations, vibrant music, delicious cuisine, and personalized
                    invitations.
                </p>
                <p>
                    From grand celebrations to intimate gatherings, our team ensures every detail is perfect. Trust
                    Festiiv to turn your vision into reality with creativity and excellence.
                </p>
                <!-- PHP Section -->
                <div>
                    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
                </div>
            </div>
        </div>
    </div>
</section>
