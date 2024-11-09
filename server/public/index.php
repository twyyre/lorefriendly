<!DOCTYPE html>
<html lang="en">
<!-- INCLUDE HEAD ELEMENT -->
<?php require 'components/head.php'; ?>
<body>
    <!-- INCLUDE PARTICLE EFFECT CONTAINER -->
    <div id="particles-js"></div> 
    <!-- INCLUDE HEADER -->
    <?php require 'components/header.php'; ?>
    <!-- <div class="ver-2"></div> -->
    <main class="main">
        <?php require 'components/carousel.php'; ?>
        <div class="container">
            <h2 class="centered bg-black edge">رؤيتنا:</h2>
            <div class="ver"></div>
            <p class="righttxt slender">نرى مركز استرلاب كمركز عالمي للتعليم التكنولوجي، يربّي جيلًا من المهنيين المهرة القادرين على المساهمة بشكل كبير في نمو وتطور صناعة التكنولوجيا.</p>
            <div class="ver"></div>
        </div>
        <div class="container">
            <h1 class="main-title centertxt bg-black edge">الدورات</h1>
            <div class="card-group slender">
                <div class="card">
                    <a href="courseArticle.php?id=1">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/6.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=2">
                        <div class="card-title">دورة أساسيات البرمجة في php</div>
                        <div class="card-img"><img src="images/courses/1.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=3">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/2.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=4">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/3.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=5">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/7.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=6">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/8.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=7">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/9.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=8">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/10.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=9">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/11.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=10">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/12.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
                <div class="card">
                    <a href="courseArticle.php?id=11">
                        <div class="card-title">دورة أساسيات البرمجة في بايثون</div>
                        <div class="card-img"><img src="images/courses/13.png" alt=""></div>
                        <div class="card-btn"><button class="btn">التفاصيل</button></div>
                        <div class="card-footer"><p>2024-09-18</p></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="ver"></div>
            <div class="slender centered">
                <h2 class="centertxt bg-black edge">تواصل معنا</h2>
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
        </div>
    
    </main>
    <!-- INCLUDE FOOTER -->
    <?php require 'components/footer.php'; ?>
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
    <!-- <script>
        try{
            const carousel = document.querySelector('.carousel');
            const slides = document.querySelectorAll('.slide');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');

            let currentSlide = 0;

            function showSlide(index) {
                slides.forEach((slide) => {
                    slide.style.left = `${index * -100}%`;
                });
                currentSlide = index;
            }

            showSlide(0);

            prevButton.addEventListener('click', () => {
                showSlide((currentSlide - 1 + slides.length) % slides.length);
            });

            nextButton.addEventListener('click', () => {
                showSlide((currentSlide + 1) % slides.length);
            });

        }
        catch(error){
            document.querySelector('body').innerHTML = error;
        }
        
    </script> -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script>
        w3.slideshow(".slide", 1500);
    </script>
    <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script src="./js/particles.js"></script>
</body>
</html>