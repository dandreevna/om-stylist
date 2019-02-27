<main>

	<div id="about">
        <!-- ***************************    Модальное окно для заявки   ************************************** -->
            <button type="button" class="btn_about" data-toggle="modal" data-target="#myModal2">Оставить заявку</button>
            <div id="myModal2" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Заполните заявку</h4>
                            <button class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">  

                            <form action="#" method="post" name="form_request" id="form_request">                                 

                                <p>Имя:<br><input type="text" class="required form_name" name="name" title="Введите имя"/></p>
                                <p>Телефон:<br><input type="text" name="phone" class="required" title="Введите телефон"/></p>
                                <p>E-mail:<br><input type="text" name="mail" /></p>
                                <p>Выберите услугу:<br>
                                    <select name="request" id="request_select">
                                        <option value="Прическа">Прическа</option>
                                        <option value="Макияж">Макияж</option>
                                        <option value="Прическа и макияж">Прическа и макияж</option>
                                        <option selected value="Стрижка">Стрижка</option>
                                        <option value="Окрашивание">Окрашивание</option>
                                        <option value="Стрижка и окрашивание">Стрижка и окрашивание</option>
                                        <option value="Другое">Другое</option>
                                    </select></p>
                                <p>Укажите желаемую дату для получения услуги:<br>
                                <input type="text" id="request_date" name="request_date"></p>
                                <p>Ваш комментарий:<br><textarea name="comment" /></textarea></p> 
                                <center><input type="submit" name="submit" id="submit" class="add_request" value="Отправить"> </center> 
                            </form>                               
                        </div>
                    </div>
                </div>
            </div>
		<h>Обо мне</h><br>
		<img src="/img/photo.jpg" class="photo">
	    <p><span class="great">Добро пожаловать в мир создания красоты и стиля!</span></p>
	    <p>Меня зовут <span class="great">Оля!</span> Я парикмахер - <span class="great">визажист, преподаватель парикмахерского искусства</span>. Работаю в <span class="great">Рязани</span>, а также выезжаю по записи в <span class="great">Москву и Рязанскую область</span>. <i>Могу выполнять не только свадебные и вечерние образы, но также и повседневные виды работ, окрашивания и стрижки любой сложности.</i></p>
	    <p>Записавшись ко мне, вам ничего не придется покупать. <span class="great">Всё нужное для работы всегда есть</span> у меня: профессиональная косметика, пучковые ресницы, лаки, расчески, инструменты класса люкс, шпильки, невидимки, кроме декоративных украшений (их вы приносите сами).
	    <p><span class="great">Использую только профессиональную косметику, косметику люкс</span><br>
	        <i>MAC, Make Up Atelier Paris, INGLOT, NYX, Becca, tarte, ABH и многие другие бренды.</i></p>
	    <p><span class="great">Образование</span>: Колледж сферы услуг №29 г.Москвы (парикмахер, модельер-художник), Московский педагогический государственный университет (психолог-социальный педагог), <a href="https://goaravetisyan.ru/school/" target="_blank"> Школа Гоар Аветисян</a> (визажист), <span class="great">множество сертификатов и мастер-классов</span>, <span class="great">участия в конкурсах и победы</span>. 	    
	</div>

    <div id="portfolio">
        <h>Фотогалерея</h>
        <p><span class="great">Ознакомиться с большим количеством моих работ Вы можете <a href="https://vk.com/koluntaeva?z=albums2806517" target="_blank" class="strelka">здесь</a></span><p>
        <div class="img_portfolio">
            <figure>
                <img src="/img/portfolio1.jpg"></a>
            </figure>
            <figure>
                <img src="/img/portfolio2.jpg"></a>
            </figure>
            <figure>
                <img src="/img/portfolio3.jpg">
            </figure>
            <figure>
                <img src="/img/portfolio4.jpg">
            </figure>
            <figure>
                <img src="/img/portfolio5.jpg">
            </figure>
            <figure>
                <img src="/img/portfolio6.jpg">
            </figure>
            <figure>
                <img src="/img/portfolio7.jpg">
            </figure>
            <figure>
                <img src="/img/portfolio8.jpg">
            </figure>
            <figure class="img_portfolio_none">
                <img src="/img/portfolio9.jpg" class="img_portfolio_none">
            </figure>
            <figure class="img_portfolio_none">
                <img src="/img/portfolio10.jpg" class="img_portfolio_none">
            </figure>
            <figure class="img_portfolio_none">
                <img src="/img/portfolio11.jpg" class="img_portfolio_none">
            </figure>
            <figure class="img_portfolio_none">
                <img src="/img/portfolio12.jpg">
            </figure>
        </div>           
    </div>

	<div id="price">
		<h>Цены</h><br>
        <img src="/img/price1.jpg" id="img1">
        <img src="/img/price2.jpg" id="img2">
        <img src="/img/price3.jpg" id="img3">
        
        <table>

            <thead>
                <tr>
                    <th>Услуга</th>
                    <th width="25%">Цена (руб.)</th>
                </tr>
            </thead>

            <tbody class="list_price_cat">
                <tr class="item_category first" id="">
                    <td colspan="2">
                        <span class="category"></span>   
                    </td> 
                </tr>
                <tr class="item_price_cat">
                    <td> 
                        <span class="name_cat"></span>
                    </td>  
                    <td>
                        <span class="price_cat"></span>    
                    </td> 
                </tr>
            </tbody>

        </table>     
	</div>

    <div id="blog">
        <h>Школа</h><br>
        <img src="/img/blog1.jpg" id="b_img1">
        <img src="/img/blog2.jpg" id="b_img2">
        <img src="/img/blog3.jpg" id="b_img3">
        <p><span class="great">Макияж для себя</span></p>
        <p><span id="blog_0"></span></p>
        <!-- ***************************    Модальное окно для кнопки   ************************************** -->
            <button type="button" class="btn_question" data-toggle="modal" data-target="#myModal3">Программа курса</button>
            <div id="myModal3" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Программа курса</h4>
                            <button class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">  
                            <p><span class="great">Занятие №1</span></p>
                            <p>- секреты идеального тона</p>
                            <p>- скульптурирование (сухая коррекция лица)</p>
                            <p>- дневной макияж</p>
                            <p>- отработка на себе</p>
                            <p><span class="great">Занятие №2</span></p>
                            <p>- скульптурирование (кремовая коррекция лица)</p>
                            <p>- вечерний макияж + стрелка</p>
                            <p>- отработка на себе</p>
                            <p>- бьюти-консультация</p>                       
                        </div>
                    </div>
                </div>
            </div>
        <!-- ***************************************************************** -->
        <br><br>
        <p><span class="great">Базовый курс по макияжу</span></p>
        <p><span id="blog_1"></span></p>
        <!-- ***************************    Модальное окно для кнопки   ************************************** -->
            <button type="button" class="btn_question" data-toggle="modal" data-target="#myModal4">Программа курса</button>
            <div id="myModal4" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Программа курса</h4>
                            <button class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">  
                            <p><span class="great">1-е занятие:</span></p>
                            <p>- Знакомство</p> 
                            <p>- Лекция</p>
                            <p>- Разбор кистей по функциональности</p>
                            <p>- Изучение цветового круга</p>
                            <p>- Главные секреты визажистов и особенности ведения блога в Instagram</p>

                            <p><span class="great">2-е занятие:</span></p>
                            <p>- Дневной макияж:</p>
                            <p>* Секреты идеального тона лица</p>
                            <p>* "Нюдовые" губы</p>
                            <p>* Легкий макияж бровей</p>
                            <p>- Отработка дневного макияжа</p>

                            <p><span class="great">3-е занятие:</span></p>
                            <p>- Кремовая коррекция лица (кремовые текстуры)</p>
                            <p>- Отработка техники </p>

                            <p><span class="great">4-е занятие:</span></p>
                            <p>- Свадебный макияж:</p>
                            <p>* Правила работы с невестами</p>
                            <p>* Секреты суперустойчивого макияжа</p>
                            <p>- Отработка свадебного макияжа </p>

                            <p><span class="great">5-е занятие:</span></p>
                            <p>- Изучение и демонстрация стрелок</p>
                            <p>- Отработка стрелок</p>

                            <p><span class="great">6-е занятие:</span></p>
                            <p>- Дымчатый макияж:</p>
                            <p>* Работа над растушевкой</p>
                            <p>- Отработка дымчатого макияжа</p>

                            <p><span class="great">7-е занятие:</span></p>
                            <p>- Вечерний макияж:</p>
                            <p>* Сухая коррекция лица</p>
                            <p>* Универсальный классический вариант макияжа глаз, подходящий для любого мероприятия</p>
                            <p>- Отработка вечернего макияжа</p>

                            <p><span class="great">8-е занятие:</span></p>
                            <p>- Работа с цветом (использование контрастных оттенков в коммерческом макияже)</p>

                            <p><span class="great">9-е занятие:</span></p>
                            <p>- Макияж «Растушеванная стрелка»</p>
                            <p>- Отработка техники</p>
                            <p><span class="great">10-е занятие:</span></p>
                            <p>- Экзамен</p>
                      
                        </div>
                    </div>
                </div>
            </div>
        <!-- ***************************************************************** -->
    </div>

    <iframe src="//widget.stapico.ru/?q=olgamyagkova_st&s=160&w=5&h=3&b=0&bg=43283E&flw_bg=43283E&p=5&title=%D1%8F%20%D0%B2%20instagram&profile=no&effect=0" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:100%; height: 640px; margin: 50px 0 0;" ></iframe> <!-- stapico - stapico.ru -->

    <div id="questions">
        <h style="margin-top:0;">Популярные вопросы</h>

        <div class="questions_container"> 
            <div class="item_question">
                <h3>
                    <span class="great">Сколько времени уходит на прическу и макияж?</span>
                </h3>   
                <div class="answer">
                    <p>В среднем от одного часа до двух часов, в зависимости от сложности. Макияж 1-1,5 часа. Время на окрашивание в среднем от 1,5 часов до 7, в зависимости от сложности и вида (простое окрашивание 1,5 часа, мелирование 3-4 часа, омбре, сомбре и балаяж 4-6 часов, более сложные 7)</p>
                </div>    
            </div>    
            <div class="item_question">
                <h3>
                    <span class="great">Что нужно приносить с собой?</span>   
                </h3>
                <div class="answer">
                    <p>Нужно принести необходимые аксессуары (украшения, короны, диадемы, фата, цветочки, заколки и т.д.). Накладные пряди (натуральные) перед причёской нужно принести заранее, хотя бы за пару дней. На репетицию нужно все тоже самое.</p>
                </div>    
            </div>    
            <div class="item_question">
                <h3>
                    <span class="great">Даете ли вы скидки?</span>    
                </h3>               
                <div class="answer">
                    <p>Постоянным клиентам скидка 10%.</p>
                </div>    
            </div>    
            <div class="item_question">
                <h3>
                    <span class="great">Когда можно сделать репетицию свадебного образа и кого можно взять с собой на репетицию?</span>   
                </h3>                
                <div class="answer">
                    <p>Репетиция проводится во все дни кроме пятницы и субботы. На репетицию вы приходите одни, без сопровождения (все фото вариантов будут на фото).</p>
                </div>    
            </div>    
            <div class="item_question">
                <h3>
                    <span class="great">Нужна ли предоплата? </span>  
                </h3>  
                <div class="answer">
                    <p>Запись на причёски и макияж происходит только по предоплате 50% от стоимости услуги (бронирование времени). Запись на окрашивания происходит только по предоплате 500 руб.</p>
                </div>    
            </div>    
        </div>
        <!-- ***************************    Модальное окно для вопросов   ************************************** -->
            <center><button type="button" name="" value="" class="btn_question" data-toggle="modal" data-target="#myModal1">Задать вопрос</button></center>
            <div id="myModal1" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Задайте свой вопрос</h4>
                            <button class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body"> 

                            <form id="form_question" action="#" method="post" name="form_question">                                   

                                <p>Имя:<br><input type="text" class="form_name required" name="name" title="Введите имя"/></p>
                                <p>E-mail:<br><input type="text" name="mail" class="required email" title="Введите корректный email"/></p>
                                <p>Ваш вопрос:<br><textarea name="question" class="required" title="Задайте вопрос"/></textarea></p>
                       
                                <center><input type="submit" class="add_question" value="Отправить"></center>
                            </form>                                 
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div id="reviews">
        <h>Отзывы</h>
        <div id="vk_comments"></div>
        <script type="text/javascript">
            VK.Widgets.Comments("vk_comments", {limit: 5, attach: "*"});
        </script>       
    </div>

</main>