@extends('layouts.real')
@section('content')
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Book Your Session</h2>
      <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea sunt quis dolorem dolore earum</p>
    </div>

    <div class="row gx-lg-0 gy-4">
      <form onsubmit="amountPeople(event)" class="php-email-form">
        <div class="col-md-6 form-group">
          <input type="number" name="member" class="form-control" id="member" placeholder="Number of Participants" min="1" max="10" required>
        </div>
        <button type="submit" value="submita" id="submita" name="submita">Submit Amount</button>
      </form>

      <script>
        function amountPeople(e) {
          e.preventDefault();
          var number = document.getElementById("member").value;

          var container = document.getElementById("add-people");
          while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
          }

          for (i = 0; i < number; i++) {
            $("#add-people").append(`
          <h2>Participant ` + (i + 1) + ` Details </h2>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name[]" class="form-control" id="name" placeholder="Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email[]" id="email" placeholder="Email" required>
            </div>
          </div>     
          <div class="row">
            <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="phone[]" id="phone" placeholder="Contact Number" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="age[]" placeholder="Age" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea type="text" class="form-control" name="dietary[]" rows="3" columhs =  id="dietary" placeholder="Dietary Restriction (if any)"></textarea>
          </div> 
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <hr>
          `)
          }
        }
      </script>

      <div class="col-lg-15" id="peopleform">
        <form action="{{ route('booking') }}" method="post" role="form" class="php-email-form">
          @csrf
          <div id="add-people">
          <!-- <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name[]" class="form-control" id="name" placeholder="Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email[]" id="email" placeholder="Email" required>
            </div>
          </div>     
          <div class="row">
            <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="phone[]" id="phone" placeholder="Contact Number" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="age[]" placeholder="Age" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea type="text" class="form-control" name="dietary[]" rows="3" columhs =  id="dietary" placeholder="Dietary Restriction (if any)"></textarea>
          </div> 
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div> -->
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>
    </div><!-- End Contact Form -->
  </div>
  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->
<html>
@stop