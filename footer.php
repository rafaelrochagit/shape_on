 
 		</main>	
		 		
		<!-- js -->
        <script type="text/javascript" src="<?=$base?>/assets/js/mask.money.min.js"></script>
        <script type="text/javascript" src="<?=$base?>/assets/js/jquery.mask-1.14.16.js"></script>
        <script type="text/javascript" src="<?=$base?>/assets/js/jquery.maskedinput-1.4.1.min.js"></script>
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
			$('#modalAlert .modal-title').text(title)
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

		function timeOutHide(id, timeInSeconds) {
			const time = timeInSeconds * 1000
			const selector = '#'+id
			if($(selector).attr('isShow') == undefined || $(selector).attr('isShow') == 'false') {
				$(selector).attr('isShow', 'true');
				setTimeout(function(){ 
					 $(selector).hide();
					 $(selector).attr('isShow', 'false');
				}, time);
			}
		}

		function isJson(str) {
		    try {
		        JSON.parse(str);
		    } catch (e) {
		        return false;
		    }
		    return true;
		}

    </script>
</html>