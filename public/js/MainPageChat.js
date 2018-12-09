var timer = new Date();



function Name()
{
	var name = $("#name_fff").val();
	return name;
}

function web_send_msg()
{
    // Retrieving values from input elements.
    var text = $("#WebChatTextID").val();
    //var name = $("#WebChatNameID").val();
    var name = Name();
    
    // Cleaning the form
    $("#WebChatTextID").val("");  
    
    // We will write down the time at the time of sending the message
    timer = new Date();
     
    // Sending a message to a chat channel
    CometServer().web_pipe_send("web_MainPageChat", {"text":text, "name":name});
    
    // Let's notify the other tabs that we have added a message to the chat
    comet_server_signal().send_emit("AddToMainPageChat", {"text":text, "name":name})
}

   
// The function will be executed after the page is loaded
$(document).ready(function()
{
    // Create a form for the chat. Layout.
    var html =  "<div style=\"border: 1px solid #ccc;padding:10px;\" >"
	          + "<div id=\"WebChatFormForm\" style=\"overflow: auto; height: 500px;\"></div>"
		  + "<input type=\"hidden\" id=\"WebChatNameID\" style=\"margin-top:10px;\" placeholder=\"Enter your name...\"> <div id=\"answer_div\" style=\"float:right;\" ></div>"
	          + "<textarea id = \"WebChatTextID\" placeholder = \"Send a message to online chat...\" style=\"resize: none; max-height: 100px;width: 650px;margin-top:10px;display: block;\"></textarea>"

                  + "<div style=\"margin-bottom: 0px;margin-top: 10px;\">"
                  +    "<input type=\"button\" style=\"width: 220px;\" onclick=\"web_send_msg();\" value=\"Send\" >"
                  +    " <div id=\"answer_error\"  style=\"float:right;\" ></div>"
                  + "</div>"
             +  "</div>";
    $("#web_chat_holder").html(html);

    // Subscribe to the channel in which the chat messages will be sent.
    CometServer().subscription("web_MainPageChat", function(msg){
        console.log(["msg", msg]);
        // Adding the received message to the message list.
        $("#WebChatFormForm").append("<p style='padding: 0px; margin: 0px;'><b>"+HtmlEncode(msg.data.name)+": </b>"+HtmlEncode(msg.data.text)+"</p>").scrollTop(999999);
    });

    // We subscribe to the event of adding a chat message to us, so that if the chat is opened in several tabs
    // our message added on one tab was displayed on all the rest without reloading the page
    comet_server_signal().connect("AddToMainPageChat", function(msg){
        console.log(["msg", msg]);
        // Adding the received message to the message list.
        $("#WebChatFormForm").append("<p style='padding: 0px; margin: 0px;' ><b>"+HtmlEncode(msg.name)+": </b>"+HtmlEncode(msg.text)+"</p>").scrollTop(999999);
    });
    
    // We subscribe to the channel to which notifications of the delivery of sent messages will be sent.
    CometServer().subscription("#web_MainPageChat", function(p)
    {
        // We will write down the time at the time of receiving the delivery report
        //var etime = new Date();
        
        //console.log(["answer_to_web_MainPageChat", p]);
        //$("#answer_div").html("The message was delivered to "+p.data.number_messages+" recipients for "+ (etime.getTime() - timer.getTime() )+"ms");
        //$("#answer_error").html(" "+p.data.error);
    });
 
});


function HtmlEncode(s)
{
  var el = document.createElement("div");
  el.innerText = el.textContent = s;
  s = el.innerHTML;
  return s;
}
