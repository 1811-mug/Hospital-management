function add_doc()
{
    var  doc_name = $("#doc_name").val();
    console.log(doc_name);
    var doc_pwd = $("#doc_pwd").val();
    console.log(doc_pwd);
    var doc_contact = $("#doc_contact").val();
    console.log(doc_contact);
    var doc_reg = $("#doc_reg").val();
    console.log(doc_reg);
    var d_gender = $("#d_gender").val();
    console.log(d_gender);
    $.ajax({
        url:'doc_server.php',
        type: 'POST',
        data:{
          param:'add_doctor',
          doc_name:doc_name,
          doc_pwd:doc_pwd,
          doc_contact:doc_contact,
          doc_reg:doc_reg,
          d_gender:d_gender
        },

        success:function(result)
        {
          console.log(result);
        }

    });

}


function doc_modify()
{
    var doc = $("#doc_detail").val();
    $.ajax({
        url:'doc_server.php',
        type: 'POST',
        data:{
          param:'modify_doc',
          doc_name:doc_name,
          doc_contact:doc_contact,
          doc_reg:doc_reg,
          d_gender:d_gender  
        },

        success:function(result)
        {
          console.log(result);
          if(result == "Location Share Successfully"){

            $(".mesgd").html(result);
                        setTimeout(function() {
                        window.location.reload();
                      }, 2000);
                   
          } 
        }

    });

}


function doc_del()
{
    
    var  doc_regi = $("#d_del").val();
    $.ajax({
        url:'doc_server.php',
        type: 'POST',
        data:{
          param:'del_doc',
          doc_regi:doc_regi,
        },

        success:function(result)
        {
          console.log(result);
        }

    });
    
}

