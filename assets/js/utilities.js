var rand_numers = random_numz(5);

//Debug trace   
function trace(s) {
    try {
        console.log(s)
    } catch (e) {
        //alert(s) 
    }
}

//loading script dynamically 
function loadjscssfile(filename, filetype) {
    if (filetype == "js") { //if filename is a external JavaScript file
        var fileref = document.createElement('script')
        fileref.setAttribute("type", "text/javascript")
        fileref.setAttribute("src", filename)
    }
    else if (filetype == "css") { //if filename is an external CSS file
        var fileref = document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", filename)
    }
    if (typeof fileref != "undefined")
        document.getElementsByTagName("head")[0].appendChild(fileref)
}

function validateEmail(txtEmail) {
    //var a = document.getElementById(txtEmail).value;
    var filter = /^((\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*?)\s*;?\s*)+/;
    if (filter.test(txtEmail)) {
        return true;
    }
    else {
        return false;
    }
}

function random_numz(digit)
{
    var digit = digit || 7;
    /*var randomNum = Math.floor(Math.random()*10); 
     return randomNum;*/
    var d = new Date().getTime();
    var n = Math.random();
    var x = Math.round(d * n);
    x = x + "";
    return(x.substring(x.length - digit));

}
function nl2br (str, is_xhtml) {
  // http://kevin.vanzonneveld.net
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: Philip Peterson
  // +   improved by: Onno Marsman
  // +   improved by: Atli Þór
  // +   bugfixed by: Onno Marsman
  // +      input by: Brett Zamir (http://brett-zamir.me)
  // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: Brett Zamir (http://brett-zamir.me)
  // +   improved by: Maximusya
  // *     example 1: nl2br('Kevin\nvan\nZonneveld');
  // *     returns 1: 'Kevin<br />\nvan<br />\nZonneveld'
  // *     example 2: nl2br("\nOne\nTwo\n\nThree\n", false);
  // *     returns 2: '<br>\nOne<br>\nTwo<br>\n<br>\nThree<br>\n'
  // *     example 3: nl2br("\nOne\nTwo\n\nThree\n", true);
  // *     returns 3: '<br />\nOne<br />\nTwo<br />\n<br />\nThree<br />\n'
  var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display

  return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

jQuery.random_num = function(digit)
{
    var digit = digit || 7;
    /*var randomNum = Math.floor(Math.random()*10); 
     return randomNum;*/
    var d = new Date().getTime();
    var n = Math.random();
    var x = Math.round(d * n);
    x = x + "";
    return(x.substring(x.length - digit));

}

jQuery.rich_data = function(data)
{
    var data = $.makeArray(data)

    $.map(data, function(val, i) {
        trace(val)
    });
}

$(document).ready(function() {
    $('.confirm').on('click', function() {
        if (confirm("Please Confirm To delete")) {
            return true;
        } else {
            return false;
        }
    });
	
	//this is for the home page slider autoplay script.
	$('.carousel').carousel({
	  interval: 5000
	});
	$('.carousel-control.right').trigger('click');
})

function ajaxLoader (el, options) {
	// Becomes this.options
	var defaults = {
		bgColor 		: '#fff',
		duration		: 800,
		opacity			: 0.7,
		classOveride 	: false
	}
	this.options 	= jQuery.extend(defaults, options);
	this.container 	= $(el);
	
	this.init = function() {
		var container = this.container;
		// Delete any other loaders
		this.remove(); 
		// Create the overlay 
		var overlay = $('<div></div>').css({
				'background-color': this.options.bgColor,
				'opacity':this.options.opacity,
				'width':container.width(),
				'height':container.height(),
				'position':'absolute',
				'top':'0px',
				'left':'0px',
				'z-index':99999
		}).addClass('ajax_overlay');
		// add an overiding class name to set new loader style 
		if (this.options.classOveride) {
			overlay.addClass(this.options.classOveride);
		}
		// insert overlay and loader into DOM 
		container.append(
			overlay.append(
				$('<div></div>').addClass('ajax_loader')
			).fadeIn(this.options.duration)
		);
    };
	
	this.remove = function(){
		var overlay = this.container.children(".ajax_overlay");
		if (overlay.length) {
			overlay.fadeOut(this.options.classOveride, function() {
				overlay.remove();
			});
		}	
	}

    this.init();
}

function update_url(_title, _url) {
    try {
        var stateObj = {};
        history.replaceState(stateObj, _title, _url);

    } catch (e) {

    }
}