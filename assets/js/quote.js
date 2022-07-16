/**
 * @author Le-Roy S. Jongwe
 * @date 27/10/21
 */


var quoteObject = {
	/**
	 * DOM OBJECTS
	 */ 
	quote_textfield: document.getElementById("service_textfield"),
	service_dropdown: document.getElementById("service_dropdown"),
	service_list: document.getElementById("service-list"),
	wtype_dropdown: document.getElementById("wtype-select"),
	wts_price_field: document.getElementById("wts_price_field"),
	nop: document.getElementById("nop"),
	nop_field: document.getElementById("nop_field"),
	custom_div: document.getElementById("custom-div"),
	custom_rad_btn: document.getElementById("custom_rad_btn"),
	system_default: document.getElementById("system-default"),
	req_quote_btn: document.getElementById("req-quote-btn"),
	quote_div: document.getElementById("quo-div"),
	xhr: null,
	url: null,
	service_value: null,
	tow: null,//type of website
	service_base_price: null,
	number_of_pages: null,//number of pages 
	nop_price: null,//number of pages price
	project_desdcription: null,


	//dispay quote modal when quote button has been clicked
	req_btn_function: function(){

		quoteObject.req_quote_btn.addEventListener("click", function(){
			if(quoteObject.quote_div.style.display == "")
			{
				quoteObject.quote_div.style.display = "block";
			}else{
				quoteObject.quote_div.style.display = "";
			}
			
		});
	},
	/**
	 * The following fuction works the service text field its main purporse is to select the 
	 *service that the client needs and lead to the next action a user should take
	 */
	select_service : function()
	{
	 	quoteObject.quote_textfield.addEventListener("click", function()
		{

			if(quoteObject.service_dropdown.style.display == "")
			{
				quoteObject.service_dropdown.style.display = "block";

				//code to select service from list of services
				for(var i = 0; i < quoteObject.service_list.childElementCount; i++)
				{
						quoteObject.service_list.children[i].addEventListener("click", function(){
						quoteObject.quote_textfield.value = this.innerText;
						quoteObject.service_value = this.innerText;
						quoteObject.service_dropdown.style.display = "";
					});
					
				}
			}else{
				quoteObject.service_dropdown.style.display = "";
			}
		});

	},

	/**
	 * This function selects the type of website that the user has chosen and sets the price for that website
	 */ 
	website_selection: function()
	{

		/*
		*Get values from drop down and add them to a list
		*/
		var wtype_array = Array.from(quoteObject.wtype_dropdown.options).map(option => option.value);
		wprice_array = [7000.00, 5000.00, 3500.00];

		/**
		 * Create a map object
		 */
		var wtype_map = new Map();
		
		/**
		 * add values to map as key value pairs
		 */
		for(var i = 0; i < wtype_array.length; i++)
		{
			wtype_map.set(wtype_array[i], wprice_array[i]);
		}
		quoteObject.tow = quoteObject.wtype_dropdown.value;
		quoteObject.wts_price_field.value = wtype_map.get(quoteObject.wtype_dropdown.value);
		quoteObject.service_base_price = quoteObject.wts_price_field.value;

		/**
		 * Retrieve price and set it as value for the price field
		 */ 	
		quoteObject.wtype_dropdown.onchange = function(){
			quoteObject.wts_price_field.value = wtype_map.get(quoteObject.wtype_dropdown.value);
			quoteObject.service_base_price = quoteObject.wts_price_field.value;
			quoteObject.tow = quoteObject.wtype_dropdown.value;
		}
		
	},

	nop_selection: function()
	{

		/*
		*Get values from drop down and add them to a list
		*/
		var nop_array = Array.from(quoteObject.nop.options).map(option => option.value);
		var nop_prices = [1500.00, 3000.00, 5500.00];

		/**
		 * Create a map object
		 */
		var nop_map = new Map();
		
		/**
		 * add values to map as key value pairs
		 */
		for(var i = 0; i < nop_array.length; i++)
		{
			nop_map.set(nop_array[i], nop_prices[i]);
		}

		quoteObject.nop_field.value = nop_map.get(quoteObject.nop.value);
		quoteObject.nop_price = quoteObject.nop_field.value;

		/**
		 * Retrieve price and set it as value for the price field
		 */ 	
		quoteObject.nop.onchange = function(){
			quoteObject.nop_field.value = nop_map.get(quoteObject.nop.value);
			quoteObject.nop_price = quoteObject.nop_field.value;
			quoteObject.number_of_pages = quoteObject.nop.value;
			alert("tow:" + quoteObject.tow + "NOP : " + quoteObject.number_of_pages + "" + quoteObject.nop.value + "nop_price: " + quoteObject.nop_price);
		}
		
	},

	/**
	 * This function manages the visibility and other functionalities
	 *  that happen when the radio buttons have been clicked
	 */ 

	 custom_selection: function()
	 {
	 	quoteObject.custom_div.checked = "false";
	 	quoteObject.custom_rad_btn.addEventListener("change", function(){
	 		if(this.checked == true)
	 		{	
	 			if((quoteObject.service_value != "Web Design") && (quoteObject.service_value!= "Desktop Application") && (this.service_value != "Android Mobile Application") && (this.service_value != "IOS Mobile Application") && (this.service_value != "Graphic Design") && (this.service_value != "IT Help Desk"))
	 			{
	 				alert("Please select a valid service");
	 				quoteObject.custom_div.checked = "false";
	 			}else{
	 				if(quoteObject.quote_textfield.value == "Web Design")
		 			{
		 				quoteObject.custom_div.style.display = "grid";
		 			}else{
		 				//Message displayed when a value that does not have UI has been selected
		 				console.log("UI coming soon");
		 			}
	 			}
	 			
	 		}
	 	});

	 	quoteObject.system_default.addEventListener("change", function()
	 	{
	 		if(this.checked == true)
	 		{
	 			quoteObject.custom_div.style.display = "none";
	 			quoteObject.custom_div.checked = "false";
	 		}
	 	});

	 },
	 /**
	  * -----------------------------------------------------------------------------------------------------------------------------------
	  * From this point its the ajax code that is used to communicate with the back-end server 
	  * Capture data and send it to the server,
	  * where it will be validated and then saved to the database  
	  * -----------------------------------------------------------------------------------------------------------------------------------
	  */ 

	  //create XMLHttpRequest Object
	  createXHR: function()
	  {
	  	quoteObject.xhr = new XMLHttpRequest();
        try{
            quoteObject.xhr = new XMLHttpRequest();
        }catch(e){
            try{
                quoteObject.xhr = new ActiveXObject("Microsoft.XMLHttp")
            }catch(e)
            {}
        } 
	  },

	  //create a request method
	  request: function()
	  {
	  	if(quoteObject.xhr)
        {
            try{
                quoteObject.xhr.open("POST", quoteObject.url, true);
                quoteObject.xhr.onreadystatechange = quoteObject.response;
                quoteObject.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                
                if(quoteObject.url == "./forms/quoteObject.php")
                {
                    quoteObject.xhr.send("service=" + quoteObject.service_value + "&mode=" + quoteObject.custom_div.value + "&serviceType=" + quoteObject.tow + "&servicePrice=" + quoteObject.service_base_price + "&nop=" + quoteObject.date + "&nopPrice=" + quoteObject.date + "&projectDescr=" + quoteObject.date);
                }else if(quoteObject.url == "./forms/schedulecall.php")
                {
                    quoteObject.xhr.send("name=" + quoteObject.name + "&email=" + quoteObject.email + "&contact=" + quoteObject.contact + "&time=" + quoteObject.time + "&date=" + quoteObject.date);
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

	  //create a response method
}

quoteObject.req_btn_function();
quoteObject.select_service();
quoteObject.website_selection();
quoteObject.nop_selection();
quoteObject.custom_selection();