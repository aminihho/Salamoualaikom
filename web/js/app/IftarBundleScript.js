var matched, browser;
colors = ['#0DCA24', '#3FC1FE', '#534B57','#1f1f20','#916319' ,'#8959A8', '#8959A8','#31708f','#880000'];
// total water By Day:
total_water_day = 12;
// total_dattel_day:
total_dattel_day = 4;
// total dinks By day:
total_drink_day = 12;
// total Mild By day:
total_milk_day = 12;
// the Total number of Muslima By Day.
total_person_by_day = 100;
// how many we plan enchla that the Musilma Dattel by day eat (please min 3,5,7,9,)
dattelForMuslimaByDay = 7;
// how many glass water for The Muslima By Day. u can put 2 glass or more:
watterForMuslimaByDay = 1;
// how many glass drinks for The Muslima By Day. u can put 2 glass or more:
drinksForMuslimaByDay = 1;
// how many glass Milk for The Muslima By Day. u can put 2 glass or more:
milkForMuslimaByDay = 1;
// how many Portion of principal Food, that the Muslima can eat for one Day:
foodForMuslimaByDay = 1;
// how many Portion(grams) of Salade, that the Muslima can eat for one Day:
saladForMuslimaByDay = 1;
// how many Portion(Ml) of Soope, that the Muslima can eat for one Day:
soopeForMuslimaByDay = 1;


liste_of_finsched_cell = new Array();


jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();

    var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
        /(msie) ([\w.]+)/.exec( ua ) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
        [];

    return {
        browser: match[ 1 ] || "",
        version: match[ 2 ] || "0"
    };
};

matched = jQuery.uaMatch( navigator.userAgent );
browser = {};

if ( matched.browser ) {
    browser[ matched.browser ] = true;
    browser.version = matched.version;
}

// Chrome is Webkit, but Webkit is also Safari.
if ( browser.chrome ) {
    browser.webkit = true;
} else if ( browser.webkit ) {
    browser.safari = true;
}

jQuery.browser = browser;

$( document ).ready(function() {
    initCheckbox();
    intitForm();
    $('#iftar_div_info').hide();
    //if the user want to bringe the Food for the Muslima "jazahou alha kayran 3ani" he try to insert the qte of person.

    $('#iftar_food').click(function () {

        if($("#iftar_food").prop('checked') == true){
            $('#iftar_label_food_Qte').show();
            $("#iftar_food_person_qte").attr('style', 'width:50px');
            $('#iftar_food_person_qte').show();
            $('#iftar_div_alert_danger').hide();
        }

        if($("#iftar_food").prop('checked') == false){
            $('#iftar_label_food_Qte').hide();
            $('#iftar_food_person_qte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });


    //if the user want to bringe the Soope for the Muslima "jazahou alha kayran 3ani" he try to insert the qte of person.

    $('#iftar_soope').click(function () {

        if($("#iftar_soope").prop('checked') == true){
            $('#iftar_label_soope_Qte').show();
            $("#iftar_soope_person_qte").attr('style', 'width:50px');
            $('#iftar_soope_person_qte').show();
            $('#iftar_div_alert_danger').hide();
        }

        if($("#iftar_soope").prop('checked') == false){
            $('#iftar_label_soope_Qte').hide();
            $('#iftar_soope_person_qte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });

    //if the user want to bringe the Salade  for the Muslima "jazahou alha kayran 3ani" he try to insert the qte of person.

    $('#iftar_salade').click(function () {

        if($("#iftar_salade").prop('checked') == true){
            $('#iftar_label_salade_Qte').show();
            $("#iftar_salade_person_qte").attr('style', 'width:50px');
            $('#iftar_salade_person_qte').show();
            $('#iftar_div_alert_danger').hide();
        }

        if($("#iftar_salade").prop('checked') == false){
            $('#iftar_label_salade_Qte').hide();
            $('#iftar_salade_person_qte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });

    //if the user want to bringe the Water for the Muslima "jazahou alha kayran meni"

    $('#iftar_watter').click(function () {

        if($("#iftar_watter").prop('checked') == true){
            $('#iftar_label_watterQte').show();
            $("#iftar_watterQte").attr('style', 'width:50px');
            $('#iftar_watterQte').show();
            $('#iftar_div_alert_danger').hide();
        }

        if($("#iftar_watter").prop('checked') == false){
            $('#iftar_label_watterQte').hide();
            $('#iftar_watterQte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });

    // if the user want to bring the dattel, then the Qte of the dattel will display."jazahou alhou kayren"

    $('#iftar_dattel').click(function () {

        if($("#iftar_dattel").prop('checked') == true){
            $('#iftar_label_dattelQte').show();
            $("#iftar_dattelQte").attr('style', 'width:50px');
            $('#iftar_dattelQte').show();
            $('#iftar_div_alert_danger').hide();
        }

        if($("#iftar_dattel").prop('checked') == false){
            $('#iftar_label_dattelQte').hide();
            $('#iftar_dattelQte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });


    // if the user want to bring the milk, then the Qte of the milk will display."jazahou alhou kayren"

    $('#iftar_milk').click(function () {

        if($("#iftar_milk").prop('checked') == true){
            $('#iftar_label_milkQte').show();
            $("#iftar_milkQte").attr('style', 'width:50px');
            $('#iftar_milkQte').show();
        }

        if($("#iftar_milk").prop('checked') == false){
            $('#iftar_label_milkQte').hide();
            $('#iftar_milkQte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });

    // if the user want to bring the milk, then the Qte of the milk will display."jazahou alhou kayren"

    $('#iftar_anotherDrink').click(function () {

        if($("#iftar_anotherDrink").prop('checked') == true){
            $('#iftar_label_anotherDrinkQte').show();
            $("#iftar_anotherDrinkQte").attr('style', 'width:50px');
            $('#iftar_anotherDrinkQte').show();
        }

        if($("#iftar_anotherDrink").prop('checked') == false){
            $('#iftar_label_anotherDrinkQte').hide();
            $('#iftar_anotherDrinkQte').hide();
            $('#iftar_div_alert_danger').hide();

        }
    });
    // add a calender to the Input: Start and End donate Date.
    $('#iftar_bundle_start_date').datepicker({ dateFormat: 'dd.mm.yy'});
    $('#iftar_endDate').datepicker({dateFormat: 'dd.mm.yy'});

    // send a Ajax to the Server to add new Donate:
    $('#iftar_button_submit_donate').click(function(){
        if ($('input[type=checkbox]:checked').length === 0){
            alert('u can not submit the Formular choice please one ');
        }

        if ($('input[type=checkbox]:checked').length === 1) {
            if($('#iftar_psedoOn').is(':checked'))
            {
                alert('u can not submit the Formular');
                return ;
            }

        }

            // send to the Server a Post Request to add new Resource:
        var formData = jQuery('#id_form_donate').serialize();

        $.ajax({

           // url:'http://127.0.0.1:8000/app/donates/newdonate',
            url : Routing.generate('i_ftar_add_new_donate'),
            type:'post',
            dataType:'json',
            data:formData,
            beforeSend:function(){
                console.log('wroking');
            },
            success: function(data){
                if(data.status == '201'){
                    callAjaxToGetAllDonatedPersonsInRamadathn();
                    $('#iftar_button_show_formular').show();
                }
                if(data.status == '400'){
                    $('.info').empty();
                    $('#iftar_div_alert_danger').show();
                    var json = data.data ;
                    console.log(json);
                    $.each(json, function (key, val) {
                        console.log(key);
                        DisplayErrors(key, val, 'personFoodQte', 'Food' );
                        DisplayErrors(key, val, 'personSoopeQte', 'Soupe' );
                        DisplayErrors(key, val, 'personSaladQte', 'Salade' );
                        DisplayErrors(key, val, 'dattelQte',  'Dattel' );
                        DisplayErrors(key, val, 'watterQte',  'Water' );
                        DisplayErrors(key, val, 'milkQte',  'Milk' );
                        DisplayErrors(key, val, 'anotherDrinkQte', 'Drinks' );
                        DisplayErrors(key, val, 'firstName', 'First Name' );
                        DisplayErrors(key, val, 'lastName', 'Last Name' );
                        DisplayErrors(key, val, 'telefonnummer', 'Phone' );
                        DisplayErrors(key, val, 'error_descrition', '' );


                    });
                  /*  var obj = $.parseJSON(json);
                    if( obj.personFoodQte != 'undefined' ){
                        console.log(obj.personFoodQte);
                    }*/


                }

            }
            // ERROR
        });
    });

    function DisplayErrors( key, message, element, word){

        if( key == element){

            $('#iftar_div_alert_danger').append('<p class="info"> .In'+word+' '+message+'</p>');
        }
    }


    function callAjaxToGetAllDonatedPersonsInRamadathn(){
        var url = Routing.generate('i_ftar_liste_donated_persons');
        $.get(url, function (data, status){
            var i = 1;
            $('#iftar_tbody').remove();
            $('#iftar_table').append('<tbody id = "iftar_tbody">');
            // calculate how may Resource of Food and Drinks I need By Day.

             resource = calculate_the_Resource_that_we_need_Muslima_by_Day ( total_person_by_day , dattelForMuslimaByDay, watterForMuslimaByDay, foodForMuslimaByDay, saladForMuslimaByDay, soopeForMuslimaByDay, drinksForMuslimaByDay, milkForMuslimaByDay )

            var json = $.parseJSON(data);
            $.each(json, function (key, val) {
                $.each(val, function (key, val) {
                        var tags = val ;
                        $.each(tags, function (key, val ) {
                            var  new_line_in_table = '<tr id ="iftar_tr_'+i+'"> </tr>';
                            $('#iftar_tbody').append( new_line_in_table );
                            var string = '<td>' +i+'Ramdathan</td>';
                            $('#iftar_tr_'+i).append( string);

                            var output = 'coock for';
                            string = '';
                            var id_td = 'td_fod_'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            // draw the column Food.
                            var column_food = drawColumnByname(val, 'food','qte_person_day_food', output, total_person_by_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_food+'</td>');
                            // draw the column Soope.
                            id_td = 'id_soope'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            var column_soop = drawColumnByname(val, 'soope','qte_person_day_soope', output, total_person_by_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_soop+'</td>');
                            // draw the column sald.
                            id_td = 'id_salad'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            var column_salad = drawColumnByname(val, 'salad','qte_person_day_salade', output, total_person_by_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_salad+'</td>');
                            output = ' he/she brink ';
                            // draw the column milk.
                            id_td = 'id_milk'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            var column_milk = drawColumnByname(val, 'donate_milk','qte_milk', output, total_milk_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_milk+'</td>');

                            // draw the column water.
                            id_td = 'id_water'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            var column_water = drawColumnByname(val, 'donte_water','qte_water', output, total_water_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_water+'</td>');

                            // draw the column drinks.
                            id_td = 'id_drinks'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            var column_drinks = drawColumnByname(val, 'donate_another_drinks','qte_another_drinks', output, total_drink_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_drinks+'</td>');

                            // draw the column dattel.
                            id_td = 'id_dattel'+i;
                            string = ' <td id = "'+id_td+'"> <div class="row"> <div class="col-xs-8"> ';
                            var column_datel = drawColumnByname(val, 'donate_dattel','donate_dattel_qte', output, total_dattel_day, id_td);
                            $('#iftar_tr_'+i).append(string+column_datel+'</td>');



                            // in this line
                        // increment Varibles;
                            i = i + 1;
                        // initial variables:

                        });
                })

            });
            $('#iftar_table').append('</tr></tbody>');
            $('[data-toggle = "popover"]').popover();
            darwfinshedcell();
            // delete all text from the Form.
            initFormular();

        });
    }


    function darwfinshedcell(){
        $( document ).ready(function() {

            while (typeof liste_of_finsched_cell != "undefined" && liste_of_finsched_cell != null && liste_of_finsched_cell.length > 0 ){
                var cell = liste_of_finsched_cell.pop()
                $('#'+cell).addClass('finshed-donate-cell');
            }
        });

    }


    function drawColumnByname(val, donated_food, indice, output, total_resource , id_td){
        var numberOfPersonnByDay = 0;
        var total = 0;
        var result = '';
        var bool = false ;
        $.each(val, function( key, val ){
            $.each(val, function( key, val ){
                var persons = val;
                $.each(persons, function( key, val ){

                    if( val[donated_food] == true ){
                        bool = true ;
                        var id = val['id'];
                        var psudo = val['pesudo'];
                        total = total + val[indice];
                        var color = colors[numberOfPersonnByDay];
                        var person = '<span   class="iftar" id ="'+id+'" data-toggle="popover" title="'+psudo+'"'+
                            ' data-content="'+output+val[indice]+'" >'+
                            '<span class="glyphicon glyphicon-user" style = "color:'+color+'"></span></span> ';
                        result = result + person;
                    }
                    numberOfPersonnByDay = numberOfPersonnByDay + 1 ;
                });
            });
            result = result + '</div>';
            var  string = '<div class="col-xs-4"> <div class="row"> ';
            var info_qte = '';
            if( bool == true) {
                var needed_recource = total_resource - total;

                var message = '';
                if( total>= total_resource ){
                    liste_of_finsched_cell.push(id_td);
                    message = 'completed';
                }else{
                    message = 'we need '+needed_recource;
                }

                info_qte = '<span class="iftar_text">'+ total + '/' + total_resource+ '</span>';
                info_qte = info_qte + '<span  data-toggle="popover" title="  "  data-content="'+message+' "> <span class="glyphicon glyphicon-tint"></span> </span>';
            }
            result = result + info_qte + '</div></div>';

        });
        return result;
    }

    // display popup when i click on Bild in Table.
   $('[data-toggle = "popover"]').on('click', function (){
       $('.popover fade right ').removeClass('in');
       $('[data-toggle = "popover"]').popover();
   });


    // $('[data-toggle = "popover"]').on('click', function() {
    //     $(this).popover();
    // });
    // click to show the formular for the use.
    $('#iftar_button_show_formular').click(function(){
        $(this).hide();
        $('#ifatr_div_form').addClass('in');
        initCheckbox();
        intitForm();
        $('#iftar_div_info').hide();
        hidenAlltheInput();
        $('#iftar_div_alert_danger').hide();

    });


    /**
     *  Falls das Benutzer möchte nicht mehr etwas spenden, dann wird Authomatische, das Eingabefeld , das der
     *  Bunutzer schon gewählt, wieder im Wert von 0 ersetzt.
     */
    $('input[type="checkbox"]').on('click', function(){
        // suchen alle EingabeFeld, mit dem Type Number und das Attribute "hidden"
        $('input[type="number"]:hidden').each( function(index, value){
            if($(value).css('display') == 'none'){
                $(value).val('0');
            }

        } );
    });


    /**
     * mit dieser Function wird die (donated)Daten vom Input-Text gelessen, und fragt der Client,
     * dem Server, nach die maximal Wert von (Essen, Soope, Salade, Wasseer, Datteln, etc..).
     * Hat nun den Client diese Wert, denn wird diesen Wert in Input-Eingabe eingesetzt.
     */

    $("#iftar_bundle_start_date").change( function() {

        hidenAlltheInput();
        $('#iftra_form_info').show();
        $('#iftar_div_info').hide();
        $('#iftar_div_alert_danger').hide();
        intitForm();

        var date = $("#iftar_bundle_start_date").val();
        //var url = 'http://127.0.0.1:8000/app/data';
        var url = Routing.generate('i_ftar_get_avlaible_data');
        // Send Request zum Server, um die Daten zu haben.
        $.post(url, {date: date},
             function ( data, status ){

                 $('#iftar_food_person_qte').attr('max', data.food_qte );
                 $('#iftar_soope_person_qte').attr('max', data.soope_qte );
                 $('#iftar_salade_person_qte').attr('max', data.salad_qte);
                 $('#iftar_watterQte').attr('max', data.water_qte );
                 $('#data.milk_qte').attr('max', iftar_milkQte );
                 $('#data.drink_qte').attr('max', iftar_anotherDrinkQte );
                 $('#iftar_dattelQte').attr('max', data.dattel_qte);




                 if( data.food_qte == 0) {
                     removeElementsVomHtml( iftar_label_food, iftar_food, iftar_label_food_Qte, iftar_food_person_qte );
                 }
                 if( data.soope_qte == 0 ) {
                     removeElementsVomHtml( iftar_label_soope, iftar_soope, iftar_label_soope_Qte,  iftar_soope_person_qte );
                 }
                 if( data.salad_qte == 0 ) {
                     removeElementsVomHtml( iftar_label_salade, iftar_salade, iftar_label_salade_Qte, iftar_salade_person_qte );
                 }
                 if( data.water_qte == 0) {
                     removeElementsVomHtml( iftar_label_water, iftar_watter,  iftar_label_watterQte, iftar_watterQte );
                 }
                 if(data.milk_qte == 0){
                     removeElementsVomHtml( iftar_label_milk, iftar_milk,  iftar_label_milkQte, iftar_milkQte );
                 }
                 if( data.drink_qte  == 0){
                     removeElementsVomHtml( iftar_label_drinkQte, iftar_anotherDrink, iftar_label_anotherDrinkQte, iftar_anotherDrinkQte );
                 }
                 if( data.dattel_qte == 0 ) {
                     removeElementsVomHtml(iftar_label_dattel, iftar_dattel, iftar_label_dattelQte, iftar_dattelQte);
                 }

                 if(( data.food_qte == 0) && ( data.soope_qte == 0 ) &&( data.salad_qte == 0 ) && ( data.water_qte == 0) && (data.milk_qte == 0) && ( data.drink_qte  == 0) && ( data.dattel_qte == 0 )){
                     $('#iftra_form_info').hide();
                     $('#iftar_div_info').show();
                 }


             }
        );
    });
});


/***
 *  mit dieser Function wird die Eingabefeled vom Seiten gelöscht, falls In der Moschee hat man günug Resource of Esssen oder Trinken.
 */

function removeElementsVomHtml(arg1, arg2, arg3, arg4 ){
    console.log(arg1.id); console.log(arg2.id);console.log(arg3.id);console.log(arg4.id);
    $('#'+arg1.id).hide();
    $('#'+arg2.id).hide();
    $('#'+arg3.id).hide();
    $('#'+arg4.id).hide();
}

function intitForm(){
    $('#iftar_label_food').show();
    $('#iftar_food').show();
    $('#iftar_label_soope').show();
    $('#iftar_soope').show();
    $('#iftar_label_salade').show();
    $('#iftar_salade').show();
    $('#iftar_label_water').show();
    $('#iftar_watter').show();
    $('#iftar_label_milk').show();
    $('#iftar_milk').show();
    $('#iftar_label_drinkQte').show();
    $('#iftar_anotherDrink').show();
    $('#iftar_label_dattel').show();
    $('#iftar_dattel').show();
}

function initFormular(){
    initCheckbox();
    $('input[type="text"]').val('');
    $('input[type="number"]').val('0');
    $('#ifatr_div_form').removeClass('in');

}



function initCheckbox(){
    // set  all the checkbox Inputs to false.
    $('input[type="checkbox"]').prop('checked' , false);
    $('input[type="checkbox"]').removeAttr('required')
}
function calculate_the_Resource_that_we_need_Muslima_by_Day ( numberOfMuslima , dattelForMuslimaByDay, watterForMuslimaByDay, foodForMuslimaByDay, saladForMuslimaByDay, soopeForMuslimaByDay, drinksForMuslimaByDay, milkForMuslimaByDay ){

    weight_datel = 7;
    weight_food = 250;
    weight_salad = 10;
    weight_soope = 70;

    number_glass_water_1_5_L = 8;
    number_glass_drinks_1_5_L = 8;
    number_glass_milk_1_L = 8;

    // how many Kg of Food I need for The muslima By Day.
    food_muslima_day = Math.round( (numberOfMuslima * foodForMuslimaByDay * weight_food)/1000 );
    // how many Litre of Soope I need for The muslima By Day.
    soope_muslima_day = Math.round( (numberOfMuslima * soopeForMuslimaByDay * weight_soope)/1000 );
    // how may Grams of Salad I need for The muslima By Day.
    salade_muslima_day = Math.round( (numberOfMuslima * saladForMuslimaByDay * weight_salad) );
    // how many Kg of Dattel I need for The muslima By Day.
    datel_muslima_day = Math.round( (numberOfMuslima * dattelForMuslimaByDay * weight_datel)/1000 );

    // how many bottle 1.5 L  of water I need for The muslima By Day.
    bottle_water_muslima_day = Math.round( (numberOfMuslima * watterForMuslimaByDay)/ number_glass_water_1_5_L );

    // how many bottle 1.5 L  of water I need for The muslima By Day.
    bottle_drinks_muslima_day = Math.round( (numberOfMuslima * drinksForMuslimaByDay)/ number_glass_drinks_1_5_L );

    // how many bottle 1. L  of Milk I need for The muslima By Day.
    bottle_milk_muslima_day = Math.round( (numberOfMuslima * milkForMuslimaByDay)/ number_glass_milk_1_L );

    var result =[food_muslima_day, soope_muslima_day, salade_muslima_day, bottle_milk_muslima_day, bottle_water_muslima_day, bottle_drinks_muslima_day, datel_muslima_day ];
    return result;
}

/**
 * diese Function hiden alle Eingabefeld.
 */
function hidenAlltheInput(){
    // Food:
    $('#iftar_label_food_Qte').hide();
    $('#iftar_food_person_qte').hide();
    // Soupe:
    $('#iftar_label_soope_Qte').hide();
    $('#iftar_soope_person_qte').hide();
    // Salade:
    $('#iftar_label_salade_Qte').hide();
    $('#iftar_salade_person_qte').hide()
    // Water:
    $('#iftar_label_watterQte').hide();
    $('#iftar_watterQte').hide();
    // Dattel
    $('#iftar_label_dattelQte').hide();
    $('#iftar_dattelQte').hide();
    // Drinks:
    $('#iftar_label_anotherDrinkQte').hide();
    $('#iftar_anotherDrinkQte').hide();
    // Milk:
    $('#iftar_label_milkQte').hide();
    $('#iftar_milkQte').hide();


}

