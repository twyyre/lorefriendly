<!DOCTYPE html>
<html lang="en">
<?php require 'components/head.php'; ?>
<!-- INCLUDE HEAD ELEMENT -->
<body>
    <!-- INCLUDE PARTICLE EFFECT CONTAINER -->
    <div id="particles-js"></div> 
    <!-- INCLUDE HEADER -->
    <?php require 'components/header.php'; ?>
    <div class="ver-2"></div>
    <main class="main">
        <div class="ver"></div>
        <div class="slender centered">
            <h2 class="centertxt bg-blck edge">تواصل معنا</h2>
            <form id="contactForm" class="centered slender">
                <label for="name">الاسم:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">البريد:</label>
                <input type="email" id="email" name="email"><br><br>

                <label for="mobile">الهاتف:</label>
                <input type="mobile" id="mobile" name="mobile" required><br><br>

                <label for="message">الرسالة:</label>
                <textarea id="message" name="message" rows="4" required placeholder="message"></textarea><br><br>

                <input id="submitBtn" class="btn bg-black" type="submit" value="ارسال">
            </form>
        </div>

    </main>
    <script id="scr">
        const contactForm = document.querySelector('#contactForm');
        const nameElement = document.querySelector('input[name="name"]');
        const emailElement = document.querySelector('input[name="email"]');
        const mobileElement = document.querySelector('input[name="mobile"]');
        const messageElement = document.querySelector('input[name="message"]');

        contactForm.addEventListener('submit', (event) => {
            contactForm.querySelector('input[type="submit"]').disabled = true;
            event.preventDefault();
            // Submit data using AJAX or other methods
            const formData = new FormData(contactForm);
            fetch('../api.php/contact/submit', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                // alert(response.json());
                // nameElement.value = "";
                // emailElement.value = "";
                // mobileElement.value = "";
                // messageElement.value = "";
                // contactForm.style.display = 'none';
                try{
                    
                    const successMessage = document.createElement('div');
                    successMessage.classList.add("message");
                    successMessage.classList.add("centered");
                    successMessage.classList.add("slender");
                    successMessage.innerHTML = "تم ارسال رسالتك بنجاح!";
                    
                    successMessage.style.opacity = '0';
                    successMessage.style.animationName = 'animquickfadein';
                    successMessage.style.animationDuration = '0.50s';
                    successMessage.style.animationFillMode = 'forwards';

                    contactForm.parentNode.append(successMessage);
                    
                    contactForm.style.opacity = '0';
                    contactForm.style.opacity = '1';
                    contactForm.style.animationName = 'animquickfadeout';
                    contactForm.style.animationFillMode = 'forwards';

                    contactForm.style.animationDuration = '0.5s';
                    contactForm.removeEventListener('submit', null);

                    
                }
                catch(error){
                    document.querySelector('body').innerHTML = error;
                }
            })
            // .then(data => {
            //     alert(data)
            //     // nameElement.innerHTML = "";
            //     // emailElement.innerHTML = "";
            //     // mobileElement.innerHTML = "";
            //     // messageElement.innerHTML = "";
            //     // contactForm.innerHTML = "asdasdasdasd";

            // })
            .catch(error => {
                console.error(error);
            });
        });

        scr.innerHTML = "";
        
    </script>
    <!-- INCLUDE FOOTER -->
    <?php require 'components/footer.php'; ?>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./js/particles.js"></script>
</body>
</html>