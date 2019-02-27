
<main>
    <span class="great"><a href="/admin/" class="strelka">Назад</a></span><br>
    <h>Редактирование услуг</h>
    <div id="serviceDel">
    	<table>

            <thead>
                <tr>
                    <th>Услуга</th>
                    <th width="20%">Цена (руб.)</th>
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
                        <img src="/img/read.png" class="read" idServ="" data-toggle="modal" data-target="#myModal5"><img src="/img/del.png" class="del" idServ=""><span class="name_cat"></span>
                    </td>  
                    <td>
                        <span class="price_cat"></span>    
                    </td> 
                </tr>
            </tbody>

        </table>  
        <!--*******************Модальное окно для редктирования услуг***********************-->
        <div id="myModal5" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Редактирование услуги</h4>
                        <button class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body"> 

                        <form id="form_service" action="#" method="post" name="form_service">                                   

                            <p>Услуга:<br><input type="text" name="name_service" title="Услуга"/></p>
                            <p>Цена:<br><input type="text" name="price_service" title="Цена"/></p>
                   
                            <center><input type="submit" class="read_service" value="Сохранить"></center>
                        </form>                                 
                    </div>
                </div>
            </div>
        </div>

    </div>   
</main>
<!--******************************************************************-->








