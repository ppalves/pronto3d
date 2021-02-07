<!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>Pronto</h3>
              <p>
                Para qualquer informação adicional, teremos prazer em atendê-lo. Entre em contato.
              </p>
              <div class="social-links">
                <a href="https://www.facebook.com/Pronto3d/" target="blank" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/pronto3dflorianopolis/" target="blank" class="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p style="margin-bottom:0px;line-height:1.5">Universidade Federal de Santa Catarina - Campus Reitor João David Ferreira Lima Trindade, Florianópolis, SC</p>
                <a href="https://goo.gl/maps/9tLVXEf9wiyyu44G7" target="blank"><p>Google Maps</p></a>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>pronto3d@gmail.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+55 048 3721-8294</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Seu email foi enviado, obrigado!</div>
              <div id="errormessage">Ocorreu um erro na hora de enviar o email, tente novamente</div>
              <div id="loadingIcon">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
              </div>
              <form action="" method="post" role="form" class="contactForm" id="contact_form">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation name">Por favor insira um nome valido</div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation email">Por favor insira um email valido</div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation subject">Por favor insira um assunto na mensagem</div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" id="message" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
                  <div class="validation message">Por favor escreva algo no corpo da mensagem</div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message" id="formSendButton">Enviar</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->