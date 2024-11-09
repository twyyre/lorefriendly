<!DOCTYPE html>
<html lang="en">
<!-- INCLUDE HEAD ELEMENT -->
<?php require 'components/head.php'; ?>
<body>
    <!-- INCLUDE PARTICLE EFFECT CONTAINER -->
    <div id="particles-js"></div> 
    <!-- INCLUDE HEADER -->
    <?php require 'components/header.php'; ?>
    <div class="ver-2"></div>
    <main class="main centered">
        <h1 class="main-title">نموذج التسجيل</h1>
        <br><br>
        <form id="enrollForm" class="form slender-2 centered">
            <p class="main-desc centertxt">يمكنك التسجيل في أي دورة من دوراتنا عن طريق النموذج التالي</p><br><br>
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" required/>
            <br><br>
            
            <label for="mobile">رقم الهاتف</label>
            <input type="number" id="mobile" name="mobile" required/>
            <br><br>

            <label for="age">العمر</label>
            <input type="range" id="age" name="age" min="6" max="26" value="18" class="slider"/>
            <span id="ageValue">18</span>
            <br><br>

            <label for="course">الدورة</label>
            <select id="course" name="course">
                <option value="1">1- أساسيات البرمجة في بايثون (Python)</option>
                <option value="2">2- البرمجة للأطفال في سكراتش</option>
                <option value="3">3- أساسيات البرمجة في جافاسكريبت (JS)</option>
                <option value="4">4- أساسيات البرمجة في سي شارب (#C)</option>
                <option value="5">5- أساسيات البرمجة في سي بلس بلس (++C)</option>
                <option value="6">6- أساسيات البرمجة في بي اتشي بي (PHP)</option>
                <option value="7">7- أساسيات الباك اند في اكسبريس</option>
                <option value="8">8- أساسيات الباك اند في دوت نت</option>
                <option value="9">9- أساسيات الباك اند في فلاسك</option>
                <option value="10">10- أساسيات الباك اند في لارافيل</option>
                <option value="11">11- لغة انجليزية - المستوى الأول</option>
                <option value="12">12- أساسيات الفرونت اند (HTML - CSS - JS)</option>
            </select>
            <br><br>

            <input class="btn" type="submit" value="تسجيل" /><br><br>
            <p>بعد التسجيل المبدئي من خلال النموذج، سيتم التواصل مع حضرتكم من قبل فريقنا لتأكيد التسجيل و الرد على الاستفسارات.</p>
        </form>
        <script>
            const ageSlider = document.getElementById("age");
            const ageValue = document.getElementById("ageValue");

            ageSlider.addEventListener("input", function() {
            ageValue.textContent = this.value;
            });
        </script>
    </main>
    <script>
        try{
            const nameElement = document.querySelector('input[name="name"]');
            const mobileElement = document.querySelector('input[name="mobile"]');
            const ageElement = document.querySelector('input[name="age"]');
            const courseidElement = document.querySelector('input[name="course"]');

            enrollForm.addEventListener('submit', (event) => {
                event.preventDefault();
                // Submit data using AJAX or other methods
                const formData = new FormData(enrollForm);
                const queryParams = new URLSearchParams(formData);

                fetch('../api.php/course/enroll?' + queryParams.toString(), {
                    method: 'GET'
                })
                .then(response => {
                        console.log(response.json());
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

                        enrollForm.parentNode.append(successMessage);
                        
                        enrollForm.style.opacity = '0';
                        enrollForm.style.opacity = '1';
                        enrollForm.style.animationName = 'animquickfadeout';
                        enrollForm.style.animationFillMode = 'forwards';

                        enrollForm.style.animationDuration = '0.5s';
                        enrollForm.removeEventListener('submit', null);

                    }
                    catch(error){
                        document.querySelector('body').innerHTML = error;
                    }
                })
                .then(data => {})
                .catch(error => {
                    console.error(error);
                });
            });


        }
        catch(error){
            document.querySelector('body').innerHTML = error;
        }
    </script>
    <!-- INCLUDE FOOTER -->
    <?php require 'components/footer.php'; ?>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./js/particles.js"></script>
</body>
</html>