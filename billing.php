<?php
session_start();

if(isset($_POST['submit'])){

  include'./cases/adultswitch.php';
  include'./cases/childswitch.php';
  include'./cases/youthswitch.php';

 /* if ($AdultNumber==1) {
    $query = "INSERT INTO adults(name, email, phone)
    values($FirstName, $Email, $PhoneNumber)";
    }
   */
}




?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book Ticket</title>
    <link href="#" rel="stylesheet" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
        </script>
    <link rel="stylesheet" href="billing.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<body className="snippet-body">
    <div class="container">
      <div class="card">
        <div class="form">
          <div class="left-side">
            <div class="left-heading">
              <h3>Book Ticket</h3>
            </div>
            <!-- <div class="steps-content">
              <h3>Step <span class="step-number">3</span></h3>
              <p class="step-number-content active">
                Billing and Checkout
              </p>
              <p class="step-number-content d-none">
                Get to know better by adding your diploma,certificate and
                education life.
              </p>
              <p class="step-number-content d-none">
                Help companies get to know you better by telling then about your
                past experiences.
              </p>
              <p class="step-number-content d-none">
                Add your profile piccture and let companies find youy fast.
              </p>
            </div> -->
            <ul class="progress-bar">
              <li>Booking Details</li>
              <li>Personal Details</li>
              <li  class="active" >Billing & Checkout</li>
              <li>Finish and Print</li>
            </ul>
          </div>
          <div class="right-side">
            
            <div class="main active">
              
              <div class="text">
                <h2 style="border: 1px solid blue; text-align: center; background-color: #4169E1; color: #ffffff;">Booking Summary</h2>
              </div>

              <div class="input-div" id="feedback">

              </div>

              <div class="input-text">
                <div class="input-div">
                   <?php 
                       $TotalTickets = $_SESSION['adultnumber'] + $_SESSION['childnumber'] + $_SESSION['youthnumber'];
                    
                      echo "<h4>Number of Tickets: ".$TotalTickets."</h4>";
                      echo"<br>";
                      echo "<h4>Adult Tickets: ".$_SESSION['adultnumber']."</h4>";
                      echo"<br>";
                      echo "<h4>Youth Tickets: ".$_SESSION['youthnumber']."</h4>";
                      echo"<br>";
                      echo "<h4>Child Tickets: ".$_SESSION['childnumber']."</h4>";
                      echo"<br>";
                      echo"<h3 style='color:green;'> Total Price: Ksh".$_SESSION['totalcost']."</h3>";
                      
                   ?>
                </div>
                <div class="input-div">
                    <h3>Payment Method</h3>
                    <select name="paymentmethod" id="paymentmethod">
                        <option value="creditcard">MPesa</option>
                    </select> 
                      
                </div>
              </div>
             
              <div class="input-text">
              <form action="stk_initiate.php" method="POST" id="form">
                <div class="input-div">
                  <input type="text" name="phone"  required require />
                  <span>Mpesa Number (with 254)</span>
                </div>
                <div class="input-div" >
                <p style="color: maroon;">Instructions</p>
                <ul>
                    <li>Enter MPesa Number starting with 254</li>
                    <li>e.g 254701123123 and click Buy Tickets</li>
                    <li>Check your phone for MPesa prompt message</li>
                    <li>Enter your MPesa PIN to authorize payment</li>
                    <li>Cick COMPLETE below to Print Ticket</li>
                </ul>
                </div>
              </div>
              <div class='buttons'>
              <a href="personal.php">
                  <span class="btn btn-outline-primary" style="width:100px; height:40px; padding:10px;"> Back</span>
              </a> 
            <button class='btn btn-success' id="pay" name='submit' type='submit' value='submit' style="background-color:green;width:100px; height:40px; padding:10px;">Buy Tickets</button>
           </div>
           </form>   
          
           </div>
           <!-- <div class="main">
              <small><i class="fa fa-smile-o"></i></small>
              <div class="text">
                <h2>Personal Details</h2>
              </div>
              <div class="input-text">
                <div class="input-div">
                  <input type="text" required require />
                  <span>Full name</span>
                </div>
                <div class="input-div">
                  <input type="text" required />
                  <span>Phone</span>
                </div>
                <div class="input-div">
                    <input type="email" required />
                    <span>Email</span>
                  </div>
              </div>
              <div class="input-text">
                <div class="input-div">
                    <input type="text" required require />
                    <span>ID/Passport</span>
                  </div>
                  <div class="input-div">
                    <input type="text" required />
                    <span>Physical Address</span>
                  </div>
                  <div class="input-div">
                      <input type="text" required />
                      <span>Country</span>
                    </div>
              </div>
              <div class="input-text">
                <div class="input-div">
                  <select>
                    <option disabled>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Transgender</option>

                  </select>
                </div>
              </div>
              <div class="buttons button_space">
                <button class="back_button">Back</button>
                <button class="next_button">Next Step</button>
              </div>
            </div> -->
           <!-- <div class="main">
              <small><i class="fa fa-smile-o"></i></small>
              <div class="text">
                <h2>Work Experiences</h2>
                <p>Can you talk about your past work experience?</p>
              </div>
              <div class="input-text">
                <div class="input-div">
                  <input type="text" required require />
                  <span>Experience 1</span>
                </div>
                <div class="input-div">
                  <input type="text" required require />
                  <span>Position</span>
                </div>
              </div>
              <div class="input-text">
                <div class="input-div">
                  <input type="text" required />
                  <span>Experience 2</span>
                </div>
                <div class="input-div">
                  <input type="text" required />
                  <span>Position</span>
                </div>
              </div>
              <div class="input-text">
                <div class="input-div">
                  <input type="text" required />
                  <span>Experience 3</span>
                </div>
                <div class="input-div">
                  <input type="text" required />
                  <span>Position</span>
                </div>
              </div>
              <div class="buttons button_space">
                <button class="back_button">Back</button>
                <button class="next_button">Next Step</button>
              </div>
            </div> -->

          <!--  <div class="main">
              <small><i class="fa fa-smile-o"></i></small>
              <div class="text">
                <h2>User Photo</h2>
                <p>Upload your profile picture and share yourself.</p>
              </div>
              <div class="user_card">
                <span></span>
                <div class="circle">
                  <span><img src="https://i.imgur.com/hnwphgM.jpg" /></span>
                </div>
                <div class="social">
                  <span><i class="fa fa-share-alt"></i></span>
                  <span><i class="fa fa-heart"></i></span>
                </div>
                <div class="user_name">
                  <h3>Peter Hawkins</h3>
                  <div class="detail">
                    <p><a href="#">Izmar,Turkey</a>Hiring</p>
                    <p>17 last day . 94Apply</p>
                  </div>
                </div>
              </div>
              <div class="buttons button_space">
                <button class="back_button">Back</button>
                <button class="submit_button">Submit</button>
              </div>
            </div> -->
          <!--  <div class="main">
              <svg
                class="checkmark"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 52 52"
              >
                <circle
                  class="checkmark__circle"
                  cx="26"
                  cy="26"
                  r="25"
                  fill="none"
                />
                <path
                  class="checkmark__check"
                  fill="none"
                  d="M14.1 27.2l7.1 7.2 16.7-16.8"
                />
              </svg>

              <div class="text congrats">
                <h2>Congratulations!</h2>
                <p>
                  Thanks Mr./Mrs. <span class="shown_name"></span> your
                  information have been submitted successfully for the future
                  reference we will contact you soon.
                </p>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script>
   $(() => {
        $("#pay").on('click', async (e) => {
            e.preventDefault()

            $("#pay").text('Please wait...').attr('disabled', true)
            const form = $('#form').serializeArray()

            var indexed_array = {};
            $.map(form, function(n, i) {
                indexed_array[n['name']] = n['value'];
            });

            const _response = await fetch('./Mpesa.php', {
                method: 'post',
                body: JSON.stringify(indexed_array),
                mode: 'no-cors',
            })

            const response = await _response.json()
            //$("#pay").text('Pay').attr('disabled', false) 
            $("#pay").text('Complete').attr('disabled', false)//my code -changed pay to complete

            if (response && response.ResponseCode == 0) {
                $('#feedback').html(`<p class='alert alert-success'>${response.CustomerMessage}</p>`)
            } else {
                $('#feedback').html(`<p class='alert alert-danger'>Error! ${response.errorMessage}</p>`)
            }
        })
    })
</script>
    <script type="text/javascript">
      function contentchange() {
        step_num_content.forEach(function (content) {
          content.classList.remove("active");
          content.classList.add("d-none");
        });
        step_num_content[formnumber].classList.add("active");
      }

      function validateform() {
        validate = true;
        var validate_inputs = document.querySelectorAll(".main.active input");
        validate_inputs.forEach(function (vaildate_input) {
          vaildate_input.classList.remove("warning");
          if (vaildate_input.hasAttribute("require")) {
            if (vaildate_input.value.length == 0) {
              validate = false;
              vaildate_input.classList.add("warning");
            }
          }
        });
        return validate;
      }
    </script>

  <!--
    <script type="text/javascript">
      var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener("click", function (e) {
        e.preventDefault();
      });
    </script>
    -->
  </body>
</html>
    