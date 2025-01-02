
<div class="contact-title">
    <h1>GET TOUCH WITH ME</h1>
</div>
<div class="contact-body">
<form action="database/frontEndTask.php" method="POST", enctype="multimedia/form-data" class="needs-validation" novalidate  >
  <div class="form-row ">
    <div class="col-md-6 mb-3 centered">
      <!-- <label for="validationTooltip01 label-color">Name</label> -->
      <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="Name" value="" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3 centered">
      <!-- <label for="validationTooltipUsername label-color">Email</label> -->
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        </div>
        <input type="text" class="form-control" id="validationTooltipUsername" name="email" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid email.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row centered">
    <div class="col-md-6 mb-3 centered">
    <!-- <label for="exampleFormControlTextarea1 label-color">Massage</label> -->
    <textarea class="form-control" id="exampleFormControlTextarea1" name="massage" placeholder="Please Write Your Massage" rows="3" required></textarea>
      <div class="invalid-tooltip">
        Please Write Your Massage.
      </div>
    </div>
  </div>
  <input type="hidden" name="action" value="add-massage">
  <input class="btn btn-primary" type="submit" name="submit" value="Get In Touch">
  <!-- <button class="btn btn-primary" type="submit">Get In Touch</button> -->
</form>

</div>