 </main>			
	  	<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js">
        </script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=$base?>/js/mask.money.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    </body>

    <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="modalAlertTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalAlertTitle">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	    </div>
	  </div>
	</div>

    <script type="text/javascript">
    	$(document).ready(function(){

			$(".money").maskMoney({
         		prefix: "",
         		decimal: ",",
         		thousands: ".",
         		allowZero: true
	     	});

	     	$('.percent').mask('##0,00', {reverse: true});

	     	$(".phoneBR").mask("(99) 9999-9999?9");
	     	$(".phoneBR").keyup(function (event) {  
	            var target, phone, element;  
	            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	            phone = target.value.replace(/\D/g, '');
	            element = $(target);  
	            if(phone.length > 10) { 
	            	element.unmask();   
	                element.mask("(99) 99999-999?9");  
	            } else if (phone.length > 9) {  
	            	element.unmask();  
	                element.mask("(99) 9999-9999?9");  
	            }  
        	});

	     	$(".phoneBRddi").mask("+55 (99) 9999-9999?9", {autoclear: false});
	     	$(".phoneBRddi").keyup(function (event) {  
	            var target, phone, element;  
	            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	            phone = target.value.replace(/\D/g, '');
	            element = $(target);  
	            if(phone.length > 12) { 
	            	element.unmask();   
	                element.mask("+55 (99) 99999-999?9", {autoclear: false});  
	            } else if (phone.length > 11) {  
	            	element.unmask();  
	                element.mask("+55 (99) 9999-9999?9", {autoclear: false});  
	            }  
        	});


        	$(".phone").mask("+99 (99) 9999-9999?9", {autoclear: false});
	     	$(".phone").keyup(function (event) {  
	            var target, phone, element;  
	            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	            phone = target.value.replace(/\D/g, '');
	            element = $(target);  
	            if(phone.length > 12) { 
	            	element.unmask();   
	                element.mask("+99 (99) 99999-999?9", {autoclear: false});  
	            } else if (phone.length > 11) {  
	            	element.unmask();  
	                element.mask("+99 (99) 9999-9999?9", {autoclear: false});  
	            }  
        	});

		});

		function moneyToFloat(valor) {
			if(valor != undefined && valor != null) {
				var number = parseFloat(valor.replace(/(,|\.)([0-9]{3})/g,'$2').replace(/(,|\.)/,'.'));
				return Number.isNaN(number) ? 0 : number
			}
			return ''
		}

		function floatToMoney(number, options = {}) {
		    const { moneySign = true } = options;

		    if(Number.isNaN(number) || !number) return "";

		    if(typeof number === "string") { // n1
		        number = Number(number);
		    }

		    let res;

		    const config = moneySign ? {style: 'currency', currency: 'BRL'} : {minimumFractionDigits: 2};

		    moneySign
		    ? res = number.toLocaleString('pt-BR', config)
		    : res = number.toLocaleString('pt-BR', config)

		    const needComma = number => number <= 1000;
		    if(needComma(number)) {
		        res = res.toString().replace(".", ",");
		    }

		    return res; // n2
		}

		var floatFloor = function(numero, casasDecimais) {
		  casasDecimais = typeof casasDecimais !== 'undefined' ?  casasDecimais : 2;
		  return +(Math.floor(numero + ('e+' + casasDecimais)) + ('e-' + casasDecimais));
		};

		function showMessage(title, msg) {
			$('#modalAlertTitle').text(title);
			$('#modalAlert .modal-body').text(msg)
			$('#modalAlert').modal('show')
		}

		function successMessage(msg) {
			$('#modalAlert').removeClass("modal-danger").addClass("modal-success")
			showMessage("Sucesso!", msg)
		}

		function errorMessage(msg) {
			$('#modalAlert').removeClass("modal-success").addClass("modal-danger")
			showMessage("Error!", msg)
		}

    </script>
</html>