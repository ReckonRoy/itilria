let schedulemeeting = {
    zoom_btn : document.getElementById("schedulezoom_btn"),
    call_btn: document.getElementById("schedulecall_btn"), 
    glass_pane: document.getElementById("glass-pane"),
    close_btn: null,
    modal: null,

    modalNone: function(modalName)
    {
            this.modal.style.display = "none";
            this.close_btn.style.display = "none";
            this.glass_pane.style.display = "none";
    },

    modalBlock: function()
    {
        this.modal.style.display = "block";
        this.close_btn.style.display = "block";
        this.glass_pane.style.display = "block";
    },

    zoommethod: function()
    {
        this.zoom_btn.addEventListener("click", function()
        {
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
    },

    callmethod: function()
    {
        this.call_btn.addEventListener("click", function()
        {
            
            schedulemeeting.modal = document.getElementById("schedule-call-container");
            schedulemeeting.close_btn = document.getElementById("sc-headerpanel-close");
            schedulemeeting.modalBlock();
            window.scrollTo(0, schedulemeeting.modal.offsetTop);
            
            //close zoom container
            schedulemeeting.close_btn.addEventListener("click", function()
            {
                schedulemeeting.modalNone("schedule-call-container");
            });
        });
    },
}

schedulemeeting.zoommethod();
schedulemeeting.callmethod();