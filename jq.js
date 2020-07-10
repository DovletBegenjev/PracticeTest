// $('#chatWindow').load(function ()
// {
//     var $contents = $('#chatWindow').contents();
//     $contents.scrollBot($contents.height());
// });

// $( document ).ready(function()
// {
//     $( "#btn" ).click(function()
//     {
//         $.ajax(
//         {
//             method: "POST",
//             url: "frame.php",
//             data: message = $("#text").val(),
//             dataType: "json",
//             success: function(data)
//             {
//                 // if(data.text)
//                 // {
//                 //     for (var i = 0; i < data.text.length; i++) 
//                 //     {
//                         $('#chat-area').append($("<p>"+ data.text[i] +"</p>"));
//                 //     }								  
//                 // }
//                document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
//             },
//             statusCode: 
//             {
//                 200: function () 
//                 { // выполнить функцию если код ответа HTTP 200
//                   console.log( "Ok" );
//                 }
//             }
//         })
//     });
// });   
var instanse = false;
var state;
var mes;
function Chat () 
{
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
}

function getStateOfChat()
{
    // alert("hiy");
    if(!instanse)
    {
		instanse = true;
		$.ajax(
        {
            type: "POST",
            url: "frame.php",
            data: 
            {  
                'function': 'getState'
            },
            dataType: "json",
            success: function(data)
            {
                state = data.state;
                instanse = false;
            },
            statusCode: 
            {
                200: function () 
                { // выполнить функцию если код ответа HTTP 200
                  console.log( "Ok getState" );
                }
            }
		});
	}	 
}

function updateChat()
{
    // alert("hiy2");
    if(!instanse)
    {
        instanse = true;
        $.ajax(
        {
            type: "POST",
            url: "frame.php",
            data: 
            {  
                'function': 'update',
                'state': state,
            },
            dataType: "json",
            success: function(data)
            {
                if(data.text)
                {
                    for (var i = 0; i < data.text.length; i++) 
                    {
                        $(document).on('append', '#chat-area', function()
                        {
                            $("<p>"+ data.text[i] +"</p>");
                        });
                        // $('#chat-area').text(data);
                    }								  
                }
                document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
                instanse = false;
                state = data.state;
            },
            statusCode: 
            {
                200: function () 
                { // выполнить функцию если код ответа HTTP 200
                  console.log( "Ok update" );
                }
            }
        });
    }
    else 
    {
        setTimeout(updateChat, 1500);
    }
}

function sendChat(message)
{   
    // alert("hiy3");    
    updateChat();
    $.ajax(
    {
	    type: "POST",
		url: "frame.php",
        data: 
        {  
		   	'function': 'send',
			'message': message
		},
		dataType: "json",
        success: function(data)
        {
		    updateChat();
        },
        statusCode: 
        {
            200: function () 
            { // выполнить функцию если код ответа HTTP 200
              console.log( "Ok send" );
            }
        }
	});
}