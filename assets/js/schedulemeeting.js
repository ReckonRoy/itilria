let schedulemeeting = {
    zoom_btn : document.getElementById("schedulezoom_btn"),
    zoom_submit_btn: document.getElementById("szc-submit-btn"),
    call_submit_btn: document.getElementById("sc-submit-btn"),
    call_btn: document.getElementById("schedulecall_btn"), 
    contact_section: document.getElementById("contact-section"),
    glass_pane: document.getElementById("glass-pane"),
    meeting_container: document.getElementById("schedule-meeting-container"),
    res_meeting_popup: document.getElementById("rm-container"),
    ok_exit: document.getElementById("rm-f-btn"),
    close_btn: null,
    modal: null,
    xhr: null,
    url: null,
    name: null,
    email: null,
    contact: null,
    time:null,
    date: null,

    modalNone: function(modalName)
    {
            this.modal.style.display = "none";
            this.close_btn.style.display = "none";
    },

    modalBlock: function()
    {
        this.modal.style.display = "block";
        this.close_btn.style.display = "block";
    },

    zoommethod: function()
    {
        this.zoom_btn.addEventListener("click", function()
        {
            schedulemeeting.url = "./forms/scheduleMeeting.php";
            schedulemeeting.modal = document.getElementById("schedule-zoom-container");
            schedulemeeting.close_btn = document.getElementById("szc-headerpanel-close");
            schedulemeeting.modalBlock();
            window.scrollTo(0, schedulemeeting.modal.offsetTop);
            //close zoom container
            schedulemeeting.close_btn.addEventListener("click", function()
            {
                schedulemeeting.modalNone("schedule-zoom-container");
            });
        });

        //get field values when button event is triggered
        this.zoom_submit_btn.addEventListener("click", function()
        {
            schedulemeeting.name = document.getElementById("szc-name").value;
            schedulemeeting.email = document.getElementById("szc-email").value;
            schedulemeeting.time = document.getElementById("szc-time").value;
            schedulemeeting.date = document.getElementById("szc-date").value;

            //instantiate XMLHtmlRequest object
            schedulemeeting.xhr = schedulemeeting.create_xhr();
            //ajax request
            schedulemeeting.request();
        });
    },

    callmethod: function()
    {
        schedulemeeting.call_btn.addEventListener("click", function()
        {
            schedulemeeting.url = "./forms/schedulecall.php";
            schedulemeeting.modal = document.getElementById("schedule-call-container");
            schedulemeeting.close_btn = document.getElementById("sc-headerpanel-close");
            schedulemeeting.modalBlock();
            window.scrollTo(0, schedulemeeting.modal.offsetTop);
            
            //close call container
            schedulemeeting.close_btn.addEventListener("click", function()
            {
                schedulemeeting.modalNone("schedule-call-container");
            });
        });

        //get field values when button event is triggered
        schedulemeeting.call_submit_btn.addEventListener("click", function()
        {
            schedulemeeting.name = document.getElementById("sc-name").value;
            schedulemeeting.email = document.getElementById("sc-email").value;
            schedulemeeting.contact = document.getElementById("sc-contact").value;
            schedulemeeting.time = document.getElementById("sc-time").value;
            schedulemeeting.date = document.getElementById("sc-date").value;
            
            //instantiate XMLHtmlRequest object
            schedulemeeting.xhr = schedulemeeting.create_xhr();
            //ajax request
            schedulemeeting.request();
        });

        //exit when ok button is pressed
        schedulemeeting.ok_exit.addEventListener("click", function()
        {
            schedulemeeting.res_meeting_popup.style.display = "none";
            schedulemeeting.glass_pane.style.display = "none";
        });
    },

    //create XMLHttpRequest Object
    create_xhr: function()
    {
        var xhr = null;
        try{
            xhr = new XMLHttpRequest();
        }catch(e){
            try{
                xhr = new ActiveXObject("Microsoft.XMLHttp")
            }catch(e)
            {}
        } 

        return xhr;
    }, 

    request: function()
    {
        if(this.xhr)
        {
            try{
                schedulemeeting.xhr.open("POST", schedulemeeting.url, true);
                schedulemeeting.xhr.onreadystatechange = schedulemeeting.response;
                schedulemeeting.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                
                if(schedulemeeting.url == "./forms/scheduleMeeting.php")
                {
                    schedulemeeting.xhr.send("name=" + schedulemeeting.name + "&email=" + schedulemeeting.email + "&time=" + schedulemeeting.time + "&date=" + schedulemeeting.date);
                }else if(schedulemeeting.url == "./forms/schedulecall.php")
                {
                    schedulemeeting.xhr.send("name=" + schedulemeeting.name + "&email=" + schedulemeeting.email + "&contact=" + schedulemeeting.contact + "&time=" + schedulemeeting.time + "&date=" + schedulemeeting.date);
                }
                
                //change cursor to busy hour glass
                document.body.style.cursor = "wait";
            }catch(e)
            {
                alert("Can't connect to server:\n" + e.toString());
                //revert busy hour glass to normal cursor
                document.body.style.cursor = "default";
            }
        }
    },

    response: function()
    {
        //check if request is complete
        if(schedulemeeting.xhr.readyState == 4)
        {
            //revert busy hour glass to normal cursor
            document.body.style.cursor = "default";
            
            if(schedulemeeting.xhr.status == 200)
            {
                try{
                    var result = JSON.parse(schedulemeeting.xhr.responseText);
                    if(result[0] == false){
                      
                        schedulemeeting.serverResponse(result[1], result[2]);
                        
                    }else if(result[0] == true){
                        schedulemeeting.serverResponse(result[1], result[2]);
                    }
                }catch(e)
                {
                    alert("Error reading response: " + e.toString());
                }
            }else{
                alert(schedulemeeting.xhr.statusText);
                //revert busy hour glass to normal cursor
                document.body.style.cursor = "default";
            }
        }
    },

    serverResponse: function(server_class, server_message){
        
        var header = "";
        var header_panel = document.getElementById("rm-header");
        var body_container = document.getElementById("rm-body");
        schedulemeeting.glass_pane.style.display = "block";
        
        schedulemeeting.res_meeting_popup.style.display = "block";
        var calcDiv2_geom = schedulemeeting.res_meeting_popup.clientHeight / 2;
        if(server_class == "error")
        {
            header = "Error Message!";

            //position pop-up in appropriate place in relation to the meeting divs 
            var calcDiv1_geom = schedulemeeting.modal.clientHeight / 2;
            
            var process_geom = ((schedulemeeting.modal.offsetTop + schedulemeeting.modal.clientHeight) - (calcDiv1_geom + calcDiv2_geom));
            schedulemeeting.res_meeting_popup.style.top = process_geom + "px";
            
            schedulemeeting.res_meeting_popup.style.borderWidth = "thin 1px";
            schedulemeeting.res_meeting_popup.style.borderStyle = "solid";
            schedulemeeting.res_meeting_popup.style.borderColor = "red";
            document.getElementById("rm-footer").style.backgroundColor = "red";
            header_panel.className = server_class;
            body_container.className = server_class;
        }else if(server_class == "success")
        {
            header = "Success Message!";

            //position pop-up in appropriate place in relation to the meeting divs 
            var calcDiv1_geom = schedulemeeting.modal.clientHeight / 2;
            var process_geom = ((schedulemeeting.modal.offsetTop + schedulemeeting.modal.clientHeight) - (calcDiv1_geom + calcDiv2_geom));
            schedulemeeting.res_meeting_popup.style.top = process_geom + "px";

            schedulemeeting.res_meeting_popup.style.borderWidth = "thin 1px";
            schedulemeeting.res_meeting_popup.style.borderStyle = "solid";
            schedulemeeting.res_meeting_popup.style.borderColor = "green";
            body_container.className = server_class;
            header_panel.className = server_class;
            document.getElementById("rm-footer").style.backgroundColor = "green";
        }
        
        calcDiv2_geom = 0;

        var header_content = document.getElementById("rm-h-text");
        header_content.textContent = header;

        var body_content = document.getElementById("rm-b-message");
        body_content.textContent = server_message;

    }
    
}

schedulemeeting.zoommethod();
schedulemeeting.callmethod();