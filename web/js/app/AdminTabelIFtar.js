/**
 * Created by kourda on 4/26/17.
 */
var total_person_day = 100;
var max_milk = 12;
var max_dattel = 12;
var max_water = 12;
var max_drink = 4;


$(document).ready(function () {



});

// Function send Request to the Server to update the Data:
function updateDataAction( resource, id_person) {
    var id_input = "input_"+resource+'_'+id_person;
    var new_val = $('#'+id_input).val();
    console.log(resource);
    var url = Routing.generate('iftar_admin_update_food',{ 'resource' : resource, 'id' : id_person ,'new_val': new_val});
    console.log(url);
    $.get(url, function ( data, status ) {
        if(status = 'status'){
            drawTable(data);
            $location.search('ui-state', null);
            //$location.search('', null);

        }
        else{
            // informe the user aubout the Erros and display the origine Table.
        }

    });
}
// Function send Request to the Server to update the Data:
function deleteDataAction( resource, id_person){
    // send the Data to the Serer and Update the Table.
    console.log('delete:');console.log(resource); console.log(id_person);
    var url = Routing.generate('iftar_admin_delete_food',{ 'resource' : resource, 'id' : id_person });
    $.get(url, function ( data, status ) {
        if(status = 'status'){
            drawTable(data);
        }
        else{
            // informe the user aubout the Erros and display the origine Table.
        }

    });

}
// function to Draw the new table:


function drawTable( data ){
    $('#iftar_tbody').remove();
    $('#iftar_table').append('<tbody id = "iftar_tbody">');
    var i = 1;
    var json_keys = ['id', 'pesudo', 'food', 'qte_person_day_food', 'soope', 'qte_person_day_soope', 'salad', 'qte_person_day_salade', 'donate_milk' ,'qte_milk','donte_water', 'qte_water', 'donate_another_drinks', 'qte_another_drinks', 'donate_dattel', 'donate_dattel_qte'];
    var json = $.parseJSON(data);
    console.log(json);
    $.each(json, function (key, val) {
        $.each(val, function (key, val) {
            var tags = val ;
            $.each(tags, function (key, val ) {
                var  new_line_in_table = '<tr id ="iftar_tr_'+i+'"> </tr>';
                $('#iftar_tbody').append( new_line_in_table );

                var string = '<td>' +i+'Ramdathan </td>';
                $('#iftar_tr_'+i).append( string);
                // drow the column food:
                 var indice_resource_available = json_keys[2] ;
                 var indice_resource_qte = json_keys[3];
                 var message = 'Food' ;
                 var resource = 'food' ;

                var column_to_drow_in_table = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , total_person_day);
                $('#iftar_tr_'+i).append('<td>'+column_to_drow_in_table);

                // drow the column soope:
                var indice_resource_available = json_keys[4] ;
                var indice_resource_qte = json_keys[5];
                var message = 'Soope' ;
                var resource = 'soope' ;
                var column_soope = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , total_person_day);
                $('#iftar_tr_'+i).append('<td>'+column_soope);
                // drow the column salade:
                var indice_resource_available = json_keys[6] ;
                var indice_resource_qte = json_keys[7];
                var message = 'Salade' ;
                var resource = 'salade' ;
                var column_salade = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , total_person_day);
                $('#iftar_tr_'+i).append('<td>'+column_salade);


                // drow the column Milk:
                var indice_resource_available = json_keys[8] ;
                var indice_resource_qte = json_keys[9];
                var message = 'Milk' ;
                var resource = 'milk' ;
                var column_milk = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , max_milk);
                $('#iftar_tr_'+i).append('<td>'+column_milk);

                // drow the column water:
                var indice_resource_available = json_keys[10] ;
                var indice_resource_qte = json_keys[11];
                var message = 'Water' ;
                var resource = 'water' ;
                var column_water = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , max_water);
                $('#iftar_tr_'+i).append('<td>'+column_water);

                // drow the column Drinks:
                var indice_resource_available = json_keys[12] ;
                var indice_resource_qte = json_keys[13];
                var message = 'Drinks' ;
                var resource = 'drink' ;
                var column_drink = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , max_drink);
                $('#iftar_tr_'+i).append('<td>'+column_drink);

                // drow the column Dattel:
                var indice_resource_available = json_keys[14] ;
                var indice_resource_qte = json_keys[15];
                var message = 'Dattel' ;
                var resource = 'dattel' ;
                var column_drink = drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , max_dattel);
                $('#iftar_tr_'+i).append('<td>'+column_drink);

                $('#iftar_tr_'+i).enhanceWithin();
                i = i + 1;
            });
        })


    });
}



function drawColumnByname(val, indice_resource_available, indice_resource_qte, message, resource , total_resource_day){
    var total = 0;
    var result = '';
    var bool = false ;
    var string = '';
    $.each(val, function( key, val ){
        $.each(val, function( key, val ){
            var persons = val;
            $.each(persons, function( key, val ){

                if( ( val[indice_resource_available] == true ) &&( val[indice_resource_qte] > 0) ){
                    bool = true ;
                    var id = val['id'];
                    var psudo = val['pesudo'];
                    total = total + val[indice_resource_qte];

                        var id_popupDialog = 'popupDialog_'+resource+'_'+id;
                        var id_input = 'input_'+resource+'_'+id;


                        string = string +'<a href="#'+ id_popupDialog+'" data-rel="popup" data-position-to="window" data-transition="pop"  data-mini="true" class=" ui-btn ui-corner-all ui-btn-inline ui-icon-user  ui-btn-icon-notext"></a>';
                        string = string + '<div data-role="popup" id="'+ id_popupDialog +'" data-overlay-theme="b" data-theme="b"  style="max-width:400px;">';
                        string = string + '<div data-role="header" data-theme="a">';
                        string = string + '<h1>'+psudo+'</h1>';
                        string = string + '</div>';
                        string = string +'<div role="main" class="ui-content">';
                        string = string +'<h3 class="ui-title">Are you sure you want to update this Information? </h3>';
                        string = string +'<span>Quantity of '+ message +'</span>';
                        string = string + '<input id="'+id_input+'" type="Number" value="'+val[indice_resource_qte]+'" min="0" max="'+total_resource_day+'"/>';
                        string = string +'<a href="#" onclick="updateDataAction(\''+ resource +'\','+id+')" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b iftar_admin_link_update " data-rel="external" >update</a> ';
                        string = string +'<a href="#" onclick="deleteDataAction(\''+ resource +'\','+id+')" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b iftar_admin_link_delete" data-rel="external">Delete</a>';
                        string = string +'<a href="#" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">cancel</a>';
                        string = string +'</div>';
                        string = string +'</div>';

                       $(document).on('popupaterclose', id_popupDialog, function(){
                            $('.iftar_admin_link_update a').unbind('click');
                            $('.iftar_admin_link_delete a').unbind('click');

                        });


                }
            });
        });
        // disponible Resource / Total_resource and close td
        if( bool == true ){

            string = string + '<span class="iftar_text">'+total+'/'+total_resource_day+'</span></td> ';
        }

    });
    return string;
}