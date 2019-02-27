$(function(){

//----------------------------------МЕНЮ---------------------------------------
    
    let $links = $('.main_wrapper .menu a');
    let height = $('.main_wrapper .menu').height();
    
    let $btn = $('.btnUp');
    let btnIsOpen = false;
    let timeout = 200;
    let timer;

    $(window).on('scroll', function(){
        clearInterval(timer);
        timer = setTimeout(onScroll, timeout);
    });

    $links.on('click', function(e){
        e.preventDefault();

        $links.removeClass('active'); //удалили все классы
        let $link = $(this).addClass('active'); //добавили класс текущему
        let id = $link.attr('href'); // возращает значение атрибута href
        let $target = $(id); // получили ссыль на нужный пункт

        if($target.length > 0){
            $('html,body').animate({
                scrollTop: $target.offset().top - 50//- height едем до нужного пункта 
            }, 700);
        }
    });

    function onScroll(){

        let pos = $(this).scrollTop();

        if(!btnIsOpen && pos > 200){
            $btn.stop(true).fadeIn(500);
            btnIsOpen = true;
        }
        else if(btnIsOpen && pos <= 200){
            btnIsOpen = false;
            $btn.stop(true).fadeOut(500);           
        }

        for(let i = $links.length - 1; i >= 0; i--){
            let $a = $links.eq(i);
            let id = $a.attr('href');
            
            if($(id).offset().top < pos + 200){
                $links.removeClass('active');
                $a.addClass('active');
                break;
            }
        }
    }

    onScroll();

//-------------------------------стрелка вверх---------------------------------

    $btn.on('click', function(){
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });

//---------------------------открывющиеся вопросы------------------------------

    $('.answer').hide();

    $('h3').on('click', function(){
        let $answer = $(this).next('.answer');
        $answer.slideToggle(300);
        $(this).toggleClass('close_question');
        
    });//end click

//------------------------------Адаптивное меню--------------------------------

    $('.menuToggle').on('click', function(){

        let $menu = $('.menu');

        $('.menu').slideToggle(300, function(){

            let $this=$(this);

            if ( $this.css('display')==='none' ){
                $this.removeAttr('style');
            }

        });//end slideToggle

        $('.menu li a').click(function(){
            $menu.slideUp(300, function(){

                if ( $menu.css('display')==='none' ){
                    $menu.removeAttr('style');
                }

            });//end slideUp
            
        }); //end click 

    })//end on('click'...

//------------------------------Формы ввода------------------------------------
        
    $('#form_request').validate();
    $('#form_question').validate();
    $('#request_date').datepicker({
        minDate : 0,
        maxDate : '6m'
    });

// ---------------------- Функция ajax - запроса к серверу --------------------

    function func_query(parm, fun, callback) {
        
        let data_send = {
            action: 'ajax',
            func: fun,
            func_parm: parm
        };

        $.post("/", data_send, function(data_back) {

            if (data_back.status == "Succes") {                       
                callback(data_back.data);
            } else {
                console.log("ошибка запроса")
                 //Ajax запрос вернул ошибку...
            }
            
        }, 'json')

    } //end func_query

// -------------------------- Заполнение таблицы цены -------------------------

    func_query('', 'get_Category', function(category){
        func_query('', 'get_services_price', function(services){

            $div_item = $(".item_category");
            $div_item1 = $(".item_price_cat");
            $div_item.find(".category").html(category[0].name);
            let flag = 0;
            for (let j=0; j < services.length; j++){

                if (flag>0){
                    if (services[j].category == category[0].id){
                        $new_item1 = $div_item1.clone().appendTo(".list_price_cat");
                        $new_item1.find(".name_cat").html(services[j].name);
                        $new_item1.find(".price_cat").html(services[j].price);
                    }
                }else{
                    $div_item1.find(".name_cat").html(services[j].name);
                    $div_item1.find(".price_cat").html(services[j].price);
                    flag++;
                }    

            }//end for j
            
            for (let i=1; i < category.length; i++){

                $new_item = $div_item.clone().appendTo(".list_price_cat"); 
                $new_item.find(".category").html(category[i].name);

                for (let j=0; j < services.length; j++){

                    if (services[j].category == category[i].id){
                        $new_item1 = $div_item1.clone().appendTo(".list_price_cat");
                        $new_item1.find(".name_cat").html(services[j].name);
                        $new_item1.find(".price_cat").html(services[j].price);
                    }

                }//end for j

            }//end for i

        });//end func_query services
    });//end func_query category

//----------------------------- Функция времени -------------------------------

    function nowTime(){
        let now = new Date();
        let month = now.getMonth()+1;
        let day = now.getDate();
        let year = now.getFullYear();
        let h = now.getHours();
        let m = now.getMinutes();
        if (m < 10){
            m = '0' + m;
        }
        if (h < 10){
            h = '0' + h;
        }

        let nowTime = month + '/' + day + '/' + year + ' ' + h + ':' + m;
        return nowTime;
    }

//----------------------------- Отправка формы --------------------------------

    $('.add_request').on('click', function(){ 

        let request = [];

        request[0] = $('#form_request input[name="name"]').val();
        request[1] = $('#form_request input[name="phone"]').val();
        request[2] = $('#form_request input[name="mail"]').val();
        request[3] = $('#request_select :selected').val();
        request[4] = $('#request_date').val();
        request[5] = $('#form_request textarea[name="comment"]').val();  
        request[6] = nowTime();

        func_query(request, 'add_Request', function(message){

            alert(message);

        });

    });//end on

    $('.add_question').on('click', function(){ 

        let question = [];

        question[0] = $('#form_question input[name="name"]').val();
        question[1] = $('#form_question input[name="mail"]').val();
        question[2] = $('#form_question textarea[name="question"]').val();
        question[3] = nowTime();

        func_query(question, 'add_Question', function(message){

            alert(message);

        });

    });//end on

//----------------------------------- Blog ------------------------------------

    func_query('', 'get_Blog', function(blog){

            $('#blog_0').html(blog[0].text);
            $('#blog_1').html(blog[1].text);

    });

});//end ready