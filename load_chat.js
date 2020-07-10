function load_chat(id) 
{
    document.getElementById('f').style.cssText = `box-shadow: 5px 5px 10px`;
    document.getElementById('head').innerHTML = document.getElementById(id).textContent;
    // if (clas == "group") 
    // {
    //     document.getElementById('under_head').innerHTML = "11 169 подписчиков";
    // }
    // else
    // {
    //     document.getElementById('under_head').innerHTML = "был(а) вчера в 12:51";
    // }

    // var xhttp;  
    // xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() 
    // {
    //     if (this.readyState == 4 && this.status == 200) 
    //     {
    //         document.getElementById("chat").innerHTML = this.responseText;
    //     }
    // };

    // xhttp.open("GET", "Php.php?q="+id, true);
    // xhttp.send();
    // document.getElementById("chat").innerHTML = this.responseText;
}

// document.getElementById("btn").onclick = show_chat_txt();
btn.onclick = function() 
{
    var val = document.getElementById("txt").value;
    document.getElementById("chat").innerHTML = val;
};