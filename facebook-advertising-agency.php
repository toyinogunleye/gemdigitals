
<?php

$nameErr = $phoneErr = $emailErr = "";
 
// $errors = [];
 $errorMessage = '';

 // function validate_phone_number($phone)

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  $input_name = trim($_POST["name"]);
  if (empty($input_name)) {
    $nameErr ="Name required";
  }elseif(!filter_var($input_name, FILTER_SANITIZE_STRING)) {
    $nameErr = "Please enter valid name.";
  }else{
    $name = $input_name;
  }

  // Validate Phone number
  $input_phone = trim($_POST["phone"]);  
  if (empty($input_phone)) {
    $phoneErr ='Phone number required';
  }elseif(!filter_var($input_phone,  FILTER_SANITIZE_NUMBER_INT)){
    $phone = 'Phone number invalid';
  }else{
    $phone = str_ireplace("-", "", $input_phone);
  }

  // Validate Email
  $input_email = trim($_POST["email"]);
  if (empty($input_email)) {
    $emailErr ='Email is required';
  }elseif(!filter_var($input_email, FILTER_SANITIZE_EMAIL)){
    $emailErr = "Please enter valid Email";    
  }else{
    $email = $input_email;
  }

  $input_website = trim($_POST['website']);
  $website = filter_var($input_website, FILTER_SANITIZE_URL);   
     

  if (empty($nameErr) && empty($phoneErr) && empty($emailErr)) {
   
   $recipient = "4da278c9f9-9c93b0@inbox.mailtrap.io";
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
 
    $email_content = "<html><body>";
    $email_content .= "<table style='font-family: Arial;'><tbody><tr><td style='background: #eee; padding: 10px;'>Visitor Name</td><td style='background: #fda; padding: 10px;'>$name</td></tr>";    
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Visitor Phone</td><td style='background: #fda; padding: 10px;'>$phone</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Visitor Email</td><td style='background: #fda; padding: 10px;'>$email</td></tr>";
    $email_content .= "<tr><td style='background: #eee; padding: 10px;'>Visitor Website URL</td><td style='background: #fda; padding: 10px;'>$website</td></tr>";        
    $email_content .= '</body></html>';
 
    echo $email_content;
     
    if(mail($recipient, "Request for free book", $email_content, $headers)) {
        echo "<script>alert('Thank you, the book will be mail to your email.')</script>";
    } else {
        $errorMessage = 'Oops, something went wrong. Please try again later';
    
    }
     
} else {
    echo "<script>window.alert('Oops, something went wrong. Please try again later')</script>";
}

}

?>
<?php include'header.php'; ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                  <!-- <h6>FOOLPROOF STRATEGY REVEALS HOW TO</h6> -->
                  <h1>GET 30-350 “ITCHY TO BUY” LEADS EACH AND EVERY MONTH WITH FACEBOOK ADS</h1>
                  <h5>211 million Africans are logging on to Facebook each and every month! Don’t miss out on tapping into this huge market of ‘itchy to buy’ prospects, who spend like sailors on leave!</h5> 
                  <a href="" class="filled-button" id="modal-container" data-toggle="modal" data-target="#form">GET A FREE 30-MINUTE STRATEGY SESSION</a>                 
                </div>
                

            </div>
          </div>
        </div>
    </div>

     <div class="more-info about-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6 align-self-center">
                  <div class="right-content">                    
                    <h2><b>HOW MANY LEADS ARE YOU GIVING TO COMPETITORS?</b></h2>
                    <p>Facebook now has nearly 1.4 billion active users generating over 4 billion “likes” per day, and <b>17 million of those people are right here in Australia.</b></p>

                    <p>The fact is: Facebook isn’t just for socializing anymore.It’s for growing your business. But if you’re not one of those savvy business owners who is already using Facebook to your advantage, chances are you’re losing countless paying customers to the competition… and spinning your wheels with outdated advertising methods that get you little to no results.</p>
                   
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="assets/images/about-image.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Create Account</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="freebook-form" role="form" class="php-email-form mt-4">

        <div class="modal-body">
          <small class="modal-small" class="form-text text-muted">Your information is safe with us.</small>
          <div class="form-group <?php echo (!empty($nameErr)) ? $errorMessage : ''; ?>">           
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
             <div class="validate"><span class="help-block"><?php echo $nameErr;?></span></div>
          </div>
           <div class="form-group <?php echo (!empty($phoneErr)) ? $errorMessage : ''; ?>">            
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number">
             <div class="validate"><span class="help-block"><?php echo $phoneErr;?></span></div>
          </div>
          <div class="form-group <?php echo (!empty($emailErr)) ? $errorMessage : ''; ?>">          
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
             <div class="validate"><span class="help-block"><?php echo $emailErr;?></span></div>
          </div>
          <div class="form-group <?php echo (!empty($websiteErr)) ? $errorMessage : ''; ?>">           
            <input type="website" name="website" class="form-control" id="website" placeholder="Enter Website">          
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Submit</button>           
        </div>
      </form>
    </div>
  </div>
</div>











    <!-- Banner Ends Here -->

    <!-- <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Send me 5 ways to grow my business</h4>
            <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
          </div>  

          <div class="col-md-4">
            <a href="contact.html" class="border-button">Send Me Message</a>
          </div>
        </div>
      </div>
    </div> -->

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">              
              <p>Dear Business Builder,</p>

              <p>Imagine what it would be like to double your sales in the next
               few months… while spending the same (or even less) on your marketing?</p>

              <p>Profits would skyrocket… you’d be able to increase your bonus… you’d feel 
                secure that your business was on sound footing… you wouldn’t have to spend
                weekends worrying about work anymore… you’d finally be able to ‘switch off’ 
               and actually enjoy the fruits of your hard work.</p>

              <p>So ask yourself… are you sick and tired of spending your hard-earned dollars 
              on advertising campaigns that simply cost you more than they make you? Are you
              fed up of the so-called ‘gurus’ and ‘experts’ that offer you more excuses than results?</p>

              <p>Then stop the stress and frustration of trying to guess how to grow your business and put our proven, battle-tested strategies and tactics to work.</p>

              <p>Our online marketing strategies have generated over $1.33 billion in sales for us and our clients.</p>

            <p>This isn’t $1.33 billion in sales in just one specific niche. No, we’ve successfully deployed these strategies in over 416 different industries. Using these marketing methods to help hundreds of businesses shift their gears into full throttle and crush their competition into a fine powder.</p>

            <p>Many of them have seen sales more than double without spending a single cent more on their marketing.</p>

            <p>Sounds hard to believe but it’s true. In fact, we’re so confident we can help you that we’ll even guarantee results – if we don’t reach our KPI’s you stop paying us until we do!</p>

            <p>No other agency will dare do this as they’d have to fire all their staff and quickly go out of business! In fact, go ahead and ask one if they’ll guarantee results and watch them squirm.</p>
            <br><br>
            <a href="contact.html" class="filled-button">Send me 5 ways to grow my business</a>
            </div>
           </div>         
          </div>
         </div>
        </div>
    
    <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="left-content">
              
              <h2>WE CONSISTENTLY TURN ADVERTISING INTO PROFIT <br><em>By sending highly qualified traffic to your site</em></h2>
              <p>Most agencies have it wrong! They focus on clicks and traffic, but you can’t take those to the bank. We are an ROI and performance driven agency that often turns $1 into $3. Below are the services we are renowned for.</p>
             <!--  <a href="" class="filled-button">Read More</a> -->
            </div>
          </div>
          <div class="col-md-12 align-self-center">
            <div class="row">
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">01</div>
                  <div class="count-title">
                   <h2>TRAFFIC GENERATION</h2> 
                    <p>We send a steady stream of highly qualified customers in “hunt mode” to your website through both paid and organic traffic sources.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">02</div>
                  <div class="count-title">
                    <h2>CONVERSION</h2>
                  <p>We increase the amount of visitors that turn into buyers by implementing propriety tactics that help our client’s double or even triple their sales</p>
                </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">03</div>
                  <div class="count-title">
                    <h2>RETARGETING</h2>
                  <p>The visitors that don’t convert will be retargeted through timely and compelling ads that will follow them around the Internet.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">04</div>
                  <div class="count-title">
                    <h2>NURTURING</h2>
                  <p>We help you set up an automated system that nurtures your leads for you, making your website run like a well oiled sales machine.</p>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="partners">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel">
            
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="1" alt="1">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="2" alt="2">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="3" alt="3">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="4" alt="4">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="5" alt="5">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <section id="morei-info">
    <div class="more-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="assets/images/more-info3.jpeg" alt="">
                  </div>
                </div>
                <div class="col-md-6 align-self-center">
                  <div class="right-content">
                    <!-- <span>Who we are</span> -->
                    <h2><em>7</em> Ways to double your sales in 90 days</h2>
                    <p> we have generated over N100 million in sales with this 7 unbelievably powerful strategies outline in this free report.<br>Download it now before this page comes down or your competitors get their hands on it</p>
                    <!-- <a href="" class="filled-button">Get Book</a> -->
                 

              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="freebook-form" role="form" class="php-email-form mt-4">                
              <div class="form-row">               
                <div class="col-md-6 form-group <?php echo (!empty($nameErr)) ? $errorMessage : ''; ?>">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
                  <div class="validate"><span class="help-block"><?php echo $nameErr;?></span></div>
                </div>
                <div class="col-md-6 form-group <?php echo (!empty($phoneErr)) ? $errorMessage :''; ?>">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone Number"/>
                  <div class="validate"><span class="help-block"><?php echo $phoneErr;?></span></div>
                </div>
                <div class="col-md-6 form-group <?php echo (!empty($emailErr)) ? $errorMessage :''; ?>">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" />
                  <div class="validate"><span class="help-block"><?php echo $emailErr;?></span></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="website" class="form-control" name="website" id="website" placeholder="Your Website" />
                  <div class="validate"></div>
              </div> 
              <div class="button-center"><button type="submit">Send Me The Book</button></div> 

            </form>

            
                </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
   <!--  <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What they say <em>about us</em></h2>
              <span>testimonials from our greatest clients</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>George Walker</h4>
                  <span>Chief Financial Analyst</span>
                  <p>"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>John Smith</h4>
                  <span>Market Specialist</span>
                  <p>"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan, arcu id ornare malesuada, est nulla luctus nisi."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>David Wood</h4>
                  <span>Chief Accountant</span>
                  <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Andrew Boom</h4>
                  <span>Marketing Head</span>
                  <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>  
 -->

 <?php include'footer.php';