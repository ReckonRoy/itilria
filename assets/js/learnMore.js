const modal_object = {
    map: null,
    //button_array: [],
    title_array: [],
    appendServices: [],
    add_service_values: [],
    service_title: document.getElementById("service-title"),
    service_rate: document.getElementById("service-rate"),
    title: document.getElementsByClassName("title"),
    learnmore_btn: document.getElementsByClassName("l-m-b"),
    close_btn: null,
    modal: null,
    glass_pane: document.getElementById("glass-pane"),
    contact_btn: document.getElementById("contactus_btn"),
    services_object: document.getElementsByClassName("service-check-box"),
    addservice_btn: document.getElementById("a-s"),
    done_btn: document.getElementById("done-btn"),
    addservice_modal: document.getElementById("services-select"),
    service_textarea: document.getElementById("service-textarea"),
    schedulezoom_btn: document.getElementById("schedulezoom_btn"),
    back_btn: document.getElementById("szc-back-btn"),
    
    backFunction()
    {
        modal_object.back_btn.addEventListener("click", function(){
            modal_object.modalNone("schedule-zoom-container");
            modal_object.modal = document.getElementById("learn-more-modal")
            modal_object.close_btn = document.getElementById("close-lm-modal");
            modal_object.modalBlock();
        });
    },

    modalNone: function(modalName)
    {
            this.modal.style.display = "none";
            this.close_btn.style.display = "none";
            this.glass_pane.style.display = "none";
    },

    /*
    *The following method creates a pop-up for selecting services
    *When user clicks "add another service" button 
    */
    serviceSelect: function()
    {
        //when done button is clicked - add selected
        // values to the messages body field of contact us
        modal_object.done_btn.addEventListener("click", function()
        {
            modal_object.service_textarea.value = "Services That you have selected \n";
            //reset add_service_values array
            modal_object.add_service_values = [];
            for( var i = 0; i < modal_object.services_object.length; i++)
            {
                //create uid for each service
                modal_object.services_object[i].setAttribute("id", modal_object.services_object[i].className + i);
                modal_object.add_service_values.push(modal_object.services_object[i].id);
            }

            for(var i = 0; i < modal_object.add_service_values.length; i++)
            {
                if(document.getElementById(modal_object.add_service_values[i]).checked == true)
                {   
                    modal_object.service_textarea.value += document.getElementById(modal_object.add_service_values[i]).value + "\n";
                }
            }
            modal_object.service_textarea.value += "\nDear Admin/Consultant \n";

            modal_object.addservice_modal.style.display = "none";
        });

        modal_object.addservice_btn.addEventListener("click", function()
        {
            for(var i = 0; i < modal_object.add_service_values.length; i++)
            {
                if(document.getElementById(modal_object.add_service_values[i]).checked == true)
                {   
                    document.getElementById(modal_object.add_service_values[i]).checked = false;
                }
            }
            modal_object.addservice_modal.style.display = "block";
        });
    },

    /*
    *method modalBlock controls the displaying of pop-ups
    */
    modalBlock: function()
    {
        this.modal.style.display = "block";
        this.close_btn.style.display = "block";
        this.glass_pane.style.display = "block";
    },

    /* 
    *create uid for learn more button(s)
    * */
    createButtonsId: function()
    {
        for(var i = 0; i < this.learnmore_btn.length; i++)
        {
            this.learnmore_btn[i].setAttribute('id', this.learnmore_btn[i].className + "" + i);
            modal_object.button_array.push(this.learnmore_btn[i].id);

        }
    },

    //Create title to be displayed on each services 
    //based banner when learn more button is clicked
    createTitleId: function()
    {
        for(var i = 0; i < this.title.length; i++)
        {
            this.title[i].setAttribute("id", this.title[i].className + "" + i);
            modal_object.title_array.push(this.title[i].id);
            
        }
    },

    button_object: function()
    {
        console.log(modal_object.button_array);
        console.log(modal_object.title_array);
    },

    createTitleMap: function()
    {
        modal_object.map = new Map();

        //using loop to insert key
        //value in map
        for(var i = 0; i < modal_object.button_array.length; i++)
        {
            modal_object.map.set(modal_object.button_array[i], modal_object.title_array[i]);
        }
    },
    /*
    *invokeModal method creates a banner pop-up coresponding to the service type 
    *when the learn more button has been clicked
    **/
    invokeModal: function(btn_id)
    {
        modal_object.scheduleZoomMeetingModal();
        modal_object.contactUsModal();
        modal_object.serviceSelect();
        modal_object.backFunction();
        modal_object.modal = document.getElementById("learn-more-modal")
        modal_object.close_btn = document.getElementById("close-lm-modal");
        modal_object.createTitleMap();
        this.service_title.textContent = "";
        for( var key of modal_object.map.keys())
        {
            if(btn_id == key)
            {
                this.service_title.textContent = document.getElementById(modal_object.map.get(key)).textContent;
            }
        }
        //display modal box/pop up
        this.modalBlock();
        
        //close modal
        modal_object.close_btn.addEventListener("click", function(){
            modal_object.modalNone();
        });
        
    },

    /*
    *Function handles the invocation of the contact-us pop-up 
    */
    contactUsModal: function()
    {
        modal_object.contact_btn.addEventListener("click", function(){
            
            modal_object.modalNone();
            modal_object.modal = document.getElementById("contact-modal");
            modal_object.close_btn = document.getElementById("hpc-modal");
            modal_object.modalBlock();
            if(modal_object.service_textarea.value == "")
            {
                modal_object.service_textarea.value += "Dear Admin/Consultant\n";
            }
            
            //close contact modal
            modal_object.close_btn.addEventListener("click", function()
            {
                modal_object.modalNone("contact-modal");
            });
        });
        
    },

    /*
    *Function handles the invocation of the schedule zoom meeting pop-up 
    */
    scheduleZoomMeetingModal: function()
    {
        modal_object.schedulezoom_btn.addEventListener("click", function(){
            
            modal_object.modalNone();
            modal_object.modal = document.getElementById("schedule-zoom-container");
            modal_object.close_btn = document.getElementById("szc-headerpanel-close");
            modal_object.modalBlock();
            
            
            //close zoom container
            modal_object.close_btn.addEventListener("click", function()
            {
                modal_object.modalNone("schedule-zoom-container");
            });
        });
        
    },

    clickAction: function()
    {
        for(var i = 0; i < modal_object.button_array.length; i++)
        {
            document.getElementById(modal_object.button_array[i]).addEventListener("click", function()
            {
                modal_object.invokeModal(this.id);
            });
        }
        
    },

    createContent: function()
    {

    }
}

function mailMessage()
{
    alert("loaded");
}
modal_object.createTitleId();
//create id for each instance of a button
modal_object.createButtonsId();
modal_object.button_object();
//more button has been clicked
modal_object.clickAction();

/** 
 * Object handles the invocation and
 * all processes pertaing to the scdhedule a call pop-up 
*/

callsetup = {
    schedulecall_btn: document.getElementById("schedulecall_btn"),
    schedulecall_container: document.getElementById("schedule-call-container"),
    back_btn: document.getElementById("sc-back-btn"),
    close_btn: document.getElementById("sc-headerpanel-close"),

    //function is responsible for what happens to a parent caontainer
    //when a child container is called
    popupParent: function(child){
        document.getElementById("learn-more-modal").style.display = "none";
        document.getElementById("close-lm-modal").style.display = "none";
        child.style.display = "block";
    },

    popupBack: function(child)
    {
        document.getElementById("learn-more-modal").style.display = "block";
        document.getElementById("close-lm-modal").style.display = "block";
        child.style.display = "none";
    },

    closePopup: function(container)
    {
        container.style.display = "none";
        document.getElementById("glass-pane").style.display = "none";
    },

    callPopupControl: function()
    {
        //display call popup
        callsetup.schedulecall_btn.addEventListener("click", function()
        {
            callsetup.popupParent(callsetup.schedulecall_container);
        });
/** 
        //go back to parent container
        callsetup.back_btn.addEventListener("click", function()
        {
            callsetup.popupBack(callsetup.schedulecall_container);
        });
*/
/*
        //exit container
        callsetup.close_btn.addEventListener("click", function()
        {
            callsetup.closePopup(callsetup.schedulecall_container);
        });
        */
    }
}

//invoke the callPopup method of the callsetup object
callsetup.callPopupControl();