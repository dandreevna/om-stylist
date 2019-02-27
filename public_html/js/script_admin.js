$(function(){

// ---------------------- Функция ajax - запроса к серверу -------------------

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

// ------------------------------- Admin -------------------------------------

    func_query('', 'get_COUNT', function(count){

        if (count.request>0){
            $('#count_request').html('('+count.request+')');
        }
        if (count.questions>0){
            $('#count_question').html('('+count.questions+')');
        }     

    });//end func_query

// ----------------------------- serviceAdd ----------------------------------

    $('#submit_serviceAdd').on('click', function(){ 

        let service = [];

        service[0] = $('#form_serviceAdd input[name="name"]').val();
        let category = $('#serviceAdd_select :selected').val();
        if (category == 'УСЛУГИ СТИЛИСТА'){
            service[1] = 1;
        }else{
            service[1] = 2;
        } 
        service[2] = $('#form_serviceAdd input[name="price"]').val();

        func_query(service, 'add_Service', function(message){

            alert(message);

        });

    });//end on

// ------------------------------ question -----------------------------------

    
    func_query('', 'get_Question', function(questions){

        let $div_item = $(".item_question");

        for (let i=1; i < questions.length; i++){

            $new_item = $div_item.clone().appendTo(".list_questions");
            $new_item.attr('id',questions[i].id);
            $new_item.find(".close_question").attr('id',questions[i].id);  
            $new_item.find(".name").html(questions[i].name);
            $new_item.find(".date").html(questions[i].date);
            $new_item.find(".mail").html(questions[i].mail);
            $new_item.find(".mail").attr('href',"mailto:"+questions[i].mail);
            $new_item.find(".question").html(questions[i].question);
            if (questions[i].admin == 0){
                $new_item.addClass('admin_0');
            }

        }//end for i

        $div_item.attr('id',questions[0].id);
        $div_item.find(".close_question").attr('id',questions[0].id);  
        $div_item.find(".name").html(questions[0].name);
        $div_item.find(".date").html(questions[0].date);
        $div_item.find(".mail").html(questions[0].mail);
        $div_item.find(".question").html(questions[0].question);
        if (questions[0].admin == 0){
            $div_item.addClass('admin_0');
        }
    
    });//end func_query questions

    $('.list_questions').on('click', '.item_question', function(){ 

        let $this = $(this);

        if ($this.hasClass('admin_0')){
            $this.removeClass('admin_0');
            let id = $this.attr('id');
            func_query(id, 'Question_DelAdmin', function(status){
                //console.log(status);
            });//end func_query
        }//end if

    });//end on

    $('.list_questions').on('click', '.close_question', function(){ 

        let $this = $(this);
        let id = $this.attr('id');

        $('.item_question[id='+id+']').slideUp();

        func_query(id, 'Del_Question', function(status){
            // console.log(status);
        });//end func_query

    });//end on

// ------------------------------- request -----------------------------------
 
    func_query('', 'get_Request', function(requests){

        let $div_item = $(".item_request");

        for (let i=1; i < requests.length; i++){

            $new_item = $div_item.clone().appendTo(".list_request");
            $new_item.attr('id',requests[i].id);
            $new_item.find(".close_request").attr('id',requests[i].id);  
            $new_item.find(".name").html(requests[i].name);
            $new_item.find(".date").html(requests[i].date_request);
            $new_item.find(".mail").html(requests[i].mail);
            $new_item.find(".mail").attr('href',"mailto:"+requests[i].mail);
            $new_item.find(".phone").html(requests[i].phone);
            $new_item.find(".phone").attr('href',"tel:"+requests[i].phone);
            $new_item.find(".select").html(requests[i].select_request);
            $new_item.find(".date_request").html(requests[i].date);
            $new_item.find(".comment").html(requests[i].comment);
            if (requests[i].admin == 0){
                $new_item.addClass('admin_0');
            }

        }//end for i

        $div_item.attr("id",requests[0].id);
        $div_item.find(".close_request").attr('id',requests[0].id);  
        $div_item.find(".name").html(requests[0].name);
        $div_item.find(".date").html(requests[0].date_request);
        $div_item.find(".mail").html(requests[0].mail);
        $div_item.find(".mail").attr('href',"mailto:"+requests[0].mail);
        $div_item.find(".phone").html(requests[0].phone);
        $div_item.find(".phone").attr('href',"tel:"+requests[0].phone);
        $div_item.find(".select").html(requests[0].select_request);
        $div_item.find(".date_request").html(requests[0].date);
        $div_item.find(".comment").html(requests[0].comment);
        $div_item.find(".comment").html(requests[0].comment);
        if (requests[0].admin == 0){
            $div_item.addClass('admin_0');
        }
    
    });//end func_query requests

    $('.list_request').on('click', '.item_request', function(){ 

        let $this = $(this);

        if ($this.hasClass('admin_0')){
            $this.removeClass('admin_0');
            let id = $this.attr('id');
            func_query(id, 'Request_DelAdmin', function(status){
                // console.log(status);
            });//end func_query
        }//end if

    });//end on

    $('.list_request').on('click', '.close_request', function(){ 

        let $this = $(this);
        let id = $this.attr('id');

        $('.item_request[id='+id+']').slideUp();

        func_query(id, 'Del_Request', function(status){
            // console.log(status);
        });//end func_query

    });//end on

// ----------------------------- serviceDel ----------------------------------

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
                        $new_item1.find(".del").attr('idServ',services[j].id);
                        $new_item1.find(".read").attr('idServ',services[j].id);
                    }
                }else{
                    $div_item1.find(".name_cat").html(services[j].name);
                    $div_item1.find(".price_cat").html(services[j].price);
                    $div_item1.find(".del").attr('idServ',services[j].id);
                    $div_item1.find(".read").attr('idServ',services[j].id);
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
                        $new_item1.find(".del").attr('idServ',services[j].id);
                        $new_item1.find(".read").attr('idServ',services[j].id);
                    }

                }//end for j

            }//end for i

        });//end func_query services
    });//end func_query category

    //удаление услуги
    $('.list_price_cat').on('click', '.del', function(){ 

        $this = $(this);
        let idServ = $this.attr('idServ');

        let vopros = confirm('Удалить выбранную услугу?');

        if (vopros){
            func_query(idServ, 'Del_Service', function(message){
                $this.closest('.item_price_cat').slideUp();
            });
        }

    });//end on

    // редактирование услуги
    $('.list_price_cat').on('click', '.read', function(){ 

        $this = $(this);
        let idServ = $this.attr('idServ');

        let name_service = $this.closest('.item_price_cat').find(".name_cat").html();
        let price_service = $this.closest('.item_price_cat').find(".price_cat").html();

        $('#form_service input[name="name_service"]').val(name_service);
        $('#form_service input[name="price_service"]').val(price_service);

        $('.read_service').on('click', function(){

            let service = [];
            service[0] = idServ;
            service[1] = $('#form_service input[name="name_service"]').val();
            service[2] = $('#form_service input[name="price_service"]').val();

            func_query(service, 'Read_Service', function(message){

                alert(message);

            });

        });//end on read_service

    });//end on list_price_cat

// ------------------------------ portfolio ----------------------------------

    $('.redact').on('click', function(){ 

        let $this = $(this);
        let $submit = $('#submit_portfolio');
        let id = $this.attr("id");
        $submit.attr("redactId",id);

        $submit.on('click', function(){
            //замена фотографии portfolioID.jpg на новую
            let file = $('#file')[0].files[0];
            let file_name = 'portfolio' + id + '.jpg';
            let data = [];
            data[0] = file;
            data [1] = file_name;
        });

    });//end on  

// --------------------------------- blog ------------------------------------

    func_query('', 'get_Blog', function(blog){

        $('#form_blog_0 textarea[name="blog_0"]').html(blog[0].text);
        $('#form_blog_1 textarea[name="blog_1"]').html(blog[1].text);

    });//end func_query

    $('#sumbit_blog_0').on('click', function(){ 

        let data = [];
        data[0] = 0;
        data[1] = $('#form_blog_0 textarea[name="blog_0"]').val();

        console.log(data);

        func_query(data, 'add_Blog', function(message){

            alert(message);

        });//end func_query

       

    });//end on  

    $('#sumbit_blog_1').on('click', function(){ 

        let data = [];
        data[0] = 1;
        data[1] = $('#form_blog_1 textarea[name="blog_1"]').val();

        console.log(data);

        func_query(data, 'add_Blog', function(message){

            alert(message);

        });//end func_query

    });//end on 

});//end ready

