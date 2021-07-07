const isReadMore = {
    readMore_btn: document.getElementsByClassName("t-m-t"),
    txt_target: document.getElementsByClassName("h-t-isp"),
    description_object: document.getElementsByClassName('description'),
    assignButtonId: function()
    {
        for(var i = 0; i < isReadMore.readMore_btn.length; i++){
            isReadMore.readMore_btn[i].setAttribute('id', isReadMore.readMore_btn[i].className + "" + i);
            this.clickAction(isReadMore.readMore_btn[i].id);
        }
    },

    assignTextId: function()
    {
        for(var j = 0; j < isReadMore.txt_target.length; j++)
        {
            isReadMore.txt_target[j].setAttribute('id', isReadMore.txt_target[j].className + "" + j);
        }
    },

    assignDescriptionId: function()
    {
        for(var j = 0; j < isReadMore.description_object.length; j++)
        {
            isReadMore.description_object[j].setAttribute('id', isReadMore.description_object[j].className + "" + j);
        }
    },

    clickAction: function(object)
    {
        document.getElementById(object).addEventListener("click", function()
        {

            isReadMore.expand(this.id);
        });
    },

    expand: function(object_val)
    {
        if(object_val == 't-m-t0')
        {   
            switch(document.getElementById('h-t-isp0').style.display)
            {
                case "": {
                    //height: 300px;
                    //overflow: scroll;
                        document.getElementById("description0").style.height = "300px";
                        document.getElementById("description0").style.overflow = "scroll";
                        document.getElementById('h-t-isp0').style.display = "block";
                        document.getElementById(object_val).textContent = "Read Less";
                        };
                break;
                case "block": {
                    document.getElementById("description0").style.height = "";
                    document.getElementById("description0").style.overflow = "";
                    document.getElementById('h-t-isp0').style.display = "";
                    document.getElementById(object_val).textContent = "Read More";
                    };
            }
        }else if(object_val == 't-m-t1'){
            switch(document.getElementById('h-t-isp1').style.display)
            {
                case "": {
                        document.getElementById("description1").style.height = "300px";
                        document.getElementById("description1").style.overflow = "scroll";
                        document.getElementById('h-t-isp1').style.display = "block";
                        document.getElementById(object_val).textContent = "Read Less";
                        };
                break;
                case "block": {
                    document.getElementById("description1").style.height = "";
                    document.getElementById("description1").style.overflow = "";
                    document.getElementById('h-t-isp1').style.display = "";
                    document.getElementById(object_val).textContent = "Read More";
                    };
            }
        }else if(object_val == 't-m-t2'){
            switch(document.getElementById('h-t-isp2').style.display)
            {
                case "": {
                        document.getElementById("description2").style.height = "300px";
                        document.getElementById("description2").style.overflow = "scroll";
                        document.getElementById('h-t-isp2').style.display = "block";
                        document.getElementById(object_val).textContent = "Read Less";
                        };
                break;
                case "block": {
                    document.getElementById("description2").style.height = "";
                    document.getElementById("description2").style.overflow = "";
                    document.getElementById('h-t-isp2').style.display = "";
                    document.getElementById(object_val).textContent = "Read More";
                    };
            }
        }
        
    },
    
};
isReadMore.assignTextId();
isReadMore.assignDescriptionId();
isReadMore. assignButtonId();