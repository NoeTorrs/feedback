<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>MAIN</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<script type="text/javascript" src="<?= base_url('assets/jquery/jquery-3.3.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
</head>
<body>

	<div>
		<button class="btn btn-default" data-toggle="modal" data-target="#admin">ADMIN</button>
	</div>

	<div class="container">

		<p align="center" style="font-size: 80px; margin-top: 100px;">WERE YOU SATISFIED?</p>

		<br>

		<form method="post" action="<?=base_url('Main_Controller/upload_Review'); ?>">
			<div class="row">
				<div class="form-check form-check-inline">
					<div class="col-sm-6" align="center">
					  <label>
					    <input type="radio" name="status" value="good" style="visibility: hidden;" data-toggle="modal" data-target="#good">
					    <button type="submit" style="background: none;border: none;" name="btngood"><img src="<?=base_url('assets/images/good.png');?>"></button>
					  </label>
					</div>
					<div class="col-sm-6" align="center">
					  <label>
					    <input type="radio" name="status" value="bad" style="visibility: hidden;" data-toggle="modal" data-target="#bad">
					    <img src="<?=base_url('assets/images/bad.png');?>">
					  </label>
					</div>
				</div>
			</div>
		</form>
		
	</div>

	<!-- Good Modal -->
	<div class="modal fade" id="good" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" align="middle">
	  <div class="modal-dialog" role="document" style="top: 45%;">
	       <div class="alert alert-success" role="alert">
			  <strong>Thank You For Your Feedback!</strong>
	      	</div>
	  </div>
	</div>

	<!-- Bad Modal -->
	<div class="modal fade" id="bad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document" style="top: 30%;">
	    <div class="modal-content">
	      
	      <div class="modal-body">
	        <form method="post" action="<?php echo base_url('Main_Controller/Upload_Review'); ?>">
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Why?</label>
	            <textarea class="form-control" id="message-text" name="message-text" rows="5"></textarea>
	            <br>
	            <div class="autocomplete" style="width:300px;">
					<input class="form-control" id="myInput" type="text" name="empID" placeholder="Employee ID ...">
				</div>
	            <br>
	            <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	       	 	<button type="submit" class="btn btn-primary" name="btnbad">Send Message</button>
	       		</div>
	          </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Admin Modal -->
	<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document" style="top: 30%;">
	    <div class="modal-content">
	       <div class="modal-header">
		        <h1 class="modal-title">ADMIN</h1>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="post" action="<?php echo base_url('Main_Controller/login'); ?>">
		          <div class="form-group">
		            <input type="text" name="username" placeholder="username..." required class="form-control">
		            <br>
		            <input type="password" name="password" placeholder="password..." required class="form-control"> 
		            <br>
		            <div class="modal-footer">
		            <input type="submit" name="login" value="LOG IN" class="btn btn-primary">
		       		</div>
	          </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
	
	<script>
	function autocomplete(inp, arr) {
	  /*the autocomplete function takes two arguments,
	  the text field element and an array of possible autocompleted values:*/
	  var currentFocus;
	  /*execute a function when someone writes in the text field:*/
	  inp.addEventListener("input", function(e) {
	      var a, b, i, val = this.value;
	      /*close any already open lists of autocompleted values*/
	      closeAllLists();
	      if (!val) { return false;}
	      currentFocus = -1;
	      /*create a DIV element that will contain the items (values):*/
	      a = document.createElement("DIV");
	      a.setAttribute("id", this.id + "autocomplete-list");
	      a.setAttribute("class", "autocomplete-items");
	      /*append the DIV element as a child of the autocomplete container:*/
	      this.parentNode.appendChild(a);
	      /*for each item in the array...*/
	      for (i = 0; i < arr.length; i++) {
	        /*check if the item starts with the same letters as the text field value:*/
	        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
	          /*create a DIV element for each matching element:*/
	          b = document.createElement("DIV");
	          /*make the matching letters bold:*/
	          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
	          b.innerHTML += arr[i].substr(val.length);
	          /*insert a input field that will hold the current array item's value:*/
	          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
	          /*execute a function when someone clicks on the item value (DIV element):*/
	          b.addEventListener("click", function(e) {
	              /*insert the value for the autocomplete text field:*/
	              inp.value = this.getElementsByTagName("input")[0].value;
	              /*close the list of autocompleted values,
	              (or any other open lists of autocompleted values:*/
	              closeAllLists();
	          });
	          a.appendChild(b);
	        }
	      }
	  });
	  /*execute a function presses a key on the keyboard:*/
	  inp.addEventListener("keydown", function(e) {
	      var x = document.getElementById(this.id + "autocomplete-list");
	      if (x) x = x.getElementsByTagName("div");
	      if (e.keyCode == 40) {
	        /*If the arrow DOWN key is pressed,
	        increase the currentFocus variable:*/
	        currentFocus++;
	        /*and and make the current item more visible:*/
	        addActive(x);
	      } else if (e.keyCode == 38) { //up
	        /*If the arrow UP key is pressed,
	        decrease the currentFocus variable:*/
	        currentFocus--;
	        /*and and make the current item more visible:*/
	        addActive(x);
	      } else if (e.keyCode == 13) {
	        /*If the ENTER key is pressed, prevent the form from being submitted,*/
	        e.preventDefault();
	        if (currentFocus > -1) {
	          /*and simulate a click on the "active" item:*/
	          if (x) x[currentFocus].click();
	        }
	      }
	  });
	  function addActive(x) {
	    /*a function to classify an item as "active":*/
	    if (!x) return false;
	    /*start by removing the "active" class on all items:*/
	    removeActive(x);
	    if (currentFocus >= x.length) currentFocus = 0;
	    if (currentFocus < 0) currentFocus = (x.length - 1);
	    /*add class "autocomplete-active":*/
	    x[currentFocus].classList.add("autocomplete-active");
	  }
	  function removeActive(x) {
	    /*a function to remove the "active" class from all autocomplete items:*/
	    for (var i = 0; i < x.length; i++) {
	      x[i].classList.remove("autocomplete-active");
	    }
	  }
	  function closeAllLists(elmnt) {
	    /*close all autocomplete lists in the document,
	    except the one passed as an argument:*/
	    var x = document.getElementsByClassName("autocomplete-items");
	    for (var i = 0; i < x.length; i++) {
	      if (elmnt != x[i] && elmnt != inp) {
	        x[i].parentNode.removeChild(x[i]);
	      }
	    }
	  }
	  /*execute a function when someone clicks in the document:*/
	  document.addEventListener("click", function (e) {
	      closeAllLists(e.target);
	      });
	}

	/*An array containing all the country names in the world:*/
	var countries = ["20181000","20181001","20181002","20181003","20181004",];

	/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
	autocomplete(document.getElementById("myInput"), countries);
	</script>

</body>
</html>