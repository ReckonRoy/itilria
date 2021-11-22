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
		wprice_array = [7000, 5000, 3500];

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

		quoteObject.wts_price_field.value = wtype_map.get(quoteObject.wtype_dropdown.value);

		/**
		 * Retrieve price and set it as value for the price field
		 */ 	
		quoteObject.wtype_dropdown.onchange = function(){
			quoteObject.wts_price_field.value = wtype_map.get(quoteObject.wtype_dropdown.value);
		}
		
	},

	nop_selection: function()
	{

		/*
		*Get values from drop down and add them to a list
		*/
		var nop_array = Array.from(quoteObject.nop.options).map(option => option.value);
		var nop_prices = [1500, 3000, 5500];

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

		/**
		 * Retrieve price and set it as value for the price field
		 */ 	
		quoteObject.nop.onchange = function(){
			quoteObject.nop_field.value = nop_map.get(quoteObject.nop.value);
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
	 			if(quoteObject.quote_textfield.value == "Web Design")
	 			{
	 				quoteObject.custom_div.style.display = "grid";
	 			}else{
	 				console.log("UI coming soon");
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

}

quoteObject.req_btn_function();
quoteObject.select_service();
quoteObject.website_selection();
quoteObject.nop_selection();
quoteObject.custom_selection();