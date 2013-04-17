function check() { 
	var loanamt = top.document.loan_form.amt.value;
	var paymnt = top.document.loan_form.pay.value;
	var rate = top.document.loan_form.rate.value;

	if(loanamt=="" || isNaN(parseFloat(loanamt)) || loanamt==0) { 
		alert("Please enter a valid loan amount.");
		top.document.loan_form.amt.value="";
		top.document.loan_form.amt.focus();
		return false; 
	} else if(paymnt=="" || isNaN(parseFloat(paymnt)) || paymnt==0) {
		alert("Please enter a valid number of payments.");
		top.document.loan_form.pay.value="";
		top.document.loan_form.pay.focus();
		return false; 
	} else if(rate=="" || isNaN(parseFloat(rate)) || rate==0) {
		alert("Please enter the interest rate.");
		top.document.loan_form.rate.value="";
		top.document.loan_form.rate.focus();
		return false; 
	} else {
		show(); 
	}
}

function clearScreen() { 
	top.document.loan_form.amt.value="";
	top.document.loan_form.pay.value="";
	top.document.loan_form.rate.value="";
	top.document.getElementById("pmt").innerHTML="";
	top.document.getElementById("det").innerHTML="";
}

function fixVal(value,numberOfCharacters,numberOfDecimals,padCharacter) { 
	var i, stringObject, stringLength, numberToPad;            // define local variables

	value=value*Math.pow(10,numberOfDecimals);                 // shift decimal point numberOfDecimals places
	value=Math.round(value);                                   //  to the right and round to nearest integer

	stringObject=new String(value);                            // convert numeric value to a String object
	stringLength=stringObject.length;                          // get length of string
	while(stringLength<numberOfDecimals) {                     // pad with leading zeroes if necessary
		stringObject="0"+stringObject;                     // add a leading zero
		stringLength=stringLength+1;                       //  and increment stringLength variable
	}

	if(numberOfDecimals>0) {			           // now insert a decimal point
		stringObject=stringObject.substring(0,stringLength-numberOfDecimals)+"."+
		stringObject.substring(stringLength-numberOfDecimals,stringLength);
	}

	if (stringObject.length<numberOfCharacters && numberOfCharacters>0) {
		numberToPad=numberOfCharacters-stringObject.length;      // number of leading characters to pad
		for (i=0; i<numberToPad; i=i+1) {
			stringObject=padCharacter+stringObject;
		}
	}

	return stringObject;                                       // return the string object
}

function show() {
	var amount=parseFloat(top.document.loan_form.amt.value);
	var numpay=parseInt(top.document.loan_form.pay.value);
	var rate=parseFloat(top.document.loan_form.rate.value);
 
	rate=rate/100;
	var monthly=rate/12;
	var payment=((amount*monthly)/(1-Math.pow((1+monthly),-numpay)));
	var total=payment*numpay;
	var interest=total-amount;

	var output = "";
	var detail = "";

	output += "<table align='center' style='width:90%;margin:10px'> \
			<tr><td>Loan amount:</td><td align='right'>$"+amount+"</td></tr><tr><td>Num payments:</td> \
			<td align='right'>"+numpay+"</td></tr><tr><td>Annual Rate:</td><td align='right'>"+fixVal(rate,0,4,' ')+"</td></tr> \
			<tr><td>Monthly Rate:</td><td align='right'>"+fixVal(monthly,0,5,' ')+"</td></tr><tr><td>Monthly Payment:</td> \
			<td align='right'>$"+fixVal(payment,0,2,' ')+"</td></tr><tr><td>Total Paid:</td><td align='right'>$"+fixVal(total,0,2,' ')+"</td></tr> \
			<tr><td>Total Interest:</td><td align='right'>$"+fixVal(interest,0,2,' ')+"</td></tr></table>";

	detail += "<table border='0' align='center' cellpadding='5' cellspacing='0' width='97%' style='font-family:courier;font-size:12px'> \
			<tr><td align='center' valign='bottom' bgcolor='white'><b>Pmt</b></td><td align='right' valign='bottom' bgcolor='white'><b>Amount</b></td> \
			<td align='right' valign='bottom' bgcolor='white'><b>Interest</b></td><td align='right' valign='bottom' bgcolor='white'><b>Principal</b></td> \
			<td align='right' valign='bottom' bgcolor='white'><b>Balance</b></td></tr><tr><td align='center' bgcolor='white'>0</td> \
			<td align='center' bgcolor='white'>&nbsp;</td><td align='center' bgcolor='white'>&nbsp;</td><td align='center' bgcolor='white'>&nbsp;</td> \
			<td align='right' bgcolor='white'>"+fixVal(amount,0,2,' ')+"</td></tr>";

	newPrincipal=amount;

	var i = 1;
	while (i <= numpay) {
		newInterest=monthly*newPrincipal;
		reduction=payment-newInterest;
		newPrincipal=newPrincipal-reduction;
		
		detail += "<tr><td align='center'>"+i+"</td><td align='right' bgcolor='white'>"+fixVal(payment,0,2,' ')+"</td> \
				<td align='right' bgcolor='white'>"+fixVal(newInterest,0,2,' ')+"</td> \
				<td align='right' bgcolor='white'>"+fixVal(reduction,0,2,' ')+"</td> \
				<td align='right' bgcolor='white'>"+fixVal(newPrincipal,0,2,' ')+"</td></tr>";

		i++;
	}

	detail += "</table>";

	document.getElementById("pmt").innerHTML = output;
	document.getElementById("det").innerHTML = detail;
}
