
  <?php include 'sections/navbar.php' ;?>
  <?php include 'sections/intro.php' ;?>

<main id="main">

  <?php include 'sections/about.php' ;?>
  <?php include 'sections/network.php' ;?>
  <?php include 'sections/tech.php' ;?>
  <?php include 'sections/activities.php' ;?>
  <?php include 'sections/kids-section.php' ;?>
  <?php include 'sections/gallery.php' ;?>
  <?php include 'sections/chevron.php' ;?>
  <?php include 'sections/team.php' ;?>
  <?php include 'sections/faq.php' ;?>
  <?php include realpath(__DIR__ . '/../common/contact.php') ;?>
  <?php include realpath(__DIR__ . '/../common/partners.php') ;?>
  <?php include realpath(__DIR__ . '/../common/labs.php') ;?>

</main>

  <?php include realpath(__DIR__ . '/../common/footer.php') ;?>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<script src="js/gallery.js"></script>
<script src="js/faq.js"></script>


<script>
    jQuery("#contact_form").submit(function(e) {
      e.preventDefault();
      var formData = jQuery("#contact_form").serializeArray();
      var embranco = 1;        
      console.log(formData);
      for (var i = 0 ; i < 4 ; i++){
        if (formData[i].value == ""){
          jQuery(".validation." + formData[i].name).css('display', 'block')
          embranco = 0;
        }
      }
      if (embranco == 0){
        return;
      }

      var formJSON = getFormJSON(formData);
      jQuery("#formSendButton").prop("disabled",true);
      jQuery("#formSendButton").addClass("disabled");
      jQuery("#loadingIcon").addClass("show");
      jQuery.ajax({
        url: "./mail/Contact.php",
        type: "POST",
        dataType: "text",
        data: {fields: JSON.stringify(formJSON)},
        success: function(data) {
          document.getElementById("contact_form").reset();
          jQuery("#loadingIcon").removeClass("show");
          jQuery("#sendmessage").addClass("show");
          jQuery("#formSendButton").prop("disabled",false);
          jQuery("#formSendButton").removeClass("disabled");
          setTimeout(() => {
            jQuery("#sendmessage").removeClass("show");
          }, 4000);
        },
        error: function(err) {
          jQuery("#loadingIcon").removeClass("show");
          jQuery("#errormessage").addClass("show");
          var error = JSON.parse(err.responseText);
          console.log(error.code);
          console.log(error.message);
          jQuery("#formSendButton").prop("disabled",false);
          jQuery("#formSendButton").removeClass("disabled");
          setTimeout(() => {
            jQuery("#errormessage").removeClass("show");
          }, 4000);
        }
      });
    });

    function getFormJSON(formArray) {
      var obj = {};
      jQuery.each(formArray, function(i, pair) {
        var cObj = obj, pObj, cpName;
        jQuery.each(pair.name.split("."), function(i, pName) {
          pObj = cObj;
          cpName = pName;
          cObj = cObj[pName] ? cObj[pName] : (cObj[pName] = {});
        });
        pObj[cpName] = pair.value;
      });
      return obj;
    }
    </script>
