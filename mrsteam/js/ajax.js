// setup browser-specific basics

var xmlhttp = false;
if (window.XMLHttpRequest) { // <- Mozilla/Firefox/Safari
	xmlhttp = new XMLHttpRequest();
} else if (window.ActiveXObject) { // <- IE
	xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
}

// JSON library
document.write("<script language='javascript' src='js/json.js'></script>");

// General functions

function GetURLCacheIssueWorkaround(strURL) {
	// browser caching issue. make each request unique by appending a random value at the end
	strRandomKey = 'rK' + Math.floor((Math.random() * 9999999)).toString(); 
	strRandomVal = 'rV' + Math.floor((Math.random() * 9999999)).toString(); 
	if (strURL.indexOf('?') > -1) {
		strDelim = '&';
	} else {
		strDelim = '?';
	}
	return strURL + strDelim + strRandomKey + '=' + strRandomVal;
}

function CFFIAA(objForm) { // <- less loquacious shortcut for function below
	return ConvertFormFieldsIntoAssociativeArray(objForm);
}

function ConvertFormFieldsIntoAssociativeArray(objForm) {
	arrFormElements = new Array();
	intLength = objForm.elements.length;
	for (x = 0; x < intLength; x++) {
		if (objForm.elements[x].name) { // <- if no name, ignore
			switch (objForm.elements[x].type) {
				// checkbox and radio key/value pair should only sent when checked
				// (leave at top since they are the SLOWEST to process when found)
				case 'radio':
				case 'checkbox':
					if (objForm.elements[x].checked) {
						arrFormElements[objForm.elements[x].name] = objForm.elements[x].value;
					}
					break;

				// tough case. find only those which are selected and fix the name so that php will produce the correct array results
				case 'select-multiple':
					intIndex = 0;
					for (intSM = 0; intSM < objForm.elements[x].length; intSM++) {
						if (objForm.elements[x][intSM].selected) {
							intEmptyBracketPosition = objForm.elements[x].name.lastIndexOf('[]');
							if (intEmptyBracketPosition > -1) {
								strNameFix = objForm.elements[x].name.substring(0, intEmptyBracketPosition);
							} else {
								strNameFix = objForm.elements[x].name + '[]';
							}
							arrFormElements[strNameFix + '[' + (intIndex++) + ']'] = objForm.elements[x][intSM].value;
						}
					}
					break;

				case 'file':
					alert("File uploads are not yet supported.");
					break;

				// easy, no-brainer form elements
				case 'button':
				case 'hidden':
				case 'image':
				case 'password':
				case 'reset':
				case 'select-one':
				case 'submit':
				case 'text':
				case 'textarea':
				default:
					arrFormElements[objForm.elements[x].name] = objForm.elements[x].value;
					break;
			}
		}
	}
	
	return arrFormElements;
}

function StatusMessage(strMsg) {
	arrMsg = new Array();
	// default values
	arrMsg['Display'] = true;
	arrMsg['Message'] = "Searching . . .";
	
	if (strMsg == 'none') {
		arrMsg['Display'] = false;
		arrMsg['Message'] = "";
	} else {
		if (!strMsg) {
			arrMsg['Message'] = "<img src='images/ajax-loader-light.gif'>";
		} else {
			arrMsg['Message'] = strMsg;
		}
	}
	
	return arrMsg;
}

// responseText-specific functions

function AjaxLoad(strID, strURL, booAsynchronous, strMsg) { // <- alias for AjaxLoadGet
	 AjaxLoadGet(strID, strURL, booAsynchronous, strMsg);
}

function AjaxLoadGet(strID, strURL, booAsynchronous, strMsg) {
	booAsynchronous = booAsynchronous ? booAsynchronous : true; // <- booAsynchronous is optional (default to true)
	arrMsg = StatusMessage(strMsg);
	objTarget = document.getElementById(strID);
	
	xmlhttp.open('GET', GetURLCacheIssueWorkaround(strURL), booAsynchronous);
	xmlhttp.onreadystatechange = XMLStateChangeLoad_ResponseText;
	xmlhttp.send(null);
}

function AjaxLoadPost(strID, strURL, arrPosting, booAsynchronous, strMsg) {
	// arrPosting is an associative array
	booAsynchronous = booAsynchronous ? booAsynchronous : true; // <- booAsynchronous is optional (default to true)
	arrMsg = StatusMessage(strMsg);
	objTarget = document.getElementById(strID);
	xmlhttp.open('POST', strURL, booAsynchronous);
	xmlhttp.onreadystatechange = XMLStateChangeLoad_ResponseText;
	// need to set a header for passing *form* information
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	// xmlhttp.send will pass everything at once, so format it like query string (even though it is being posted)
	strQS = '';
	for (strKey in arrPosting) {
		strQS += strKey + '=' + escape(arrPosting[strKey]) + '&';
	}
	xmlhttp.send(strQS);
}

function XMLStateChangeLoad_ResponseText() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		objTarget.innerHTML = xmlhttp.responseText;
	} else {
		if (arrMsg['Display']) {
			objTarget.innerHTML = arrMsg['Message'];
		}
	}
}

// JSON responseText-specific functions

function AjaxLoadGetJSON(strFunctionName, strURL, booAsynchronous) {
	objJSON = new Object();
	booAsynchronous = booAsynchronous ? booAsynchronous : true; // <- booAsynchronous is optional (default to true)

	xmlhttp.open('GET', GetURLCacheIssueWorkaround(strURL), booAsynchronous);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			objJSON = JSON.parse(xmlhttp.responseText);
			eval( strFunctionName + '(objJSON)' );
		}
	}
	xmlhttp.send(null);
}

function AjaxLoadJSON(strFunctionName, strURL, booAsynchronous) { // <- alias for AjaxLoadGetJSON
	 AjaxLoadGetJSON(strFunctionName, strURL, booAsynchronous);
}

// responseXML-specific functions

function AjaxLoadXML(objResult, strURL, booAsynchronous, strMsg) { // <- alias for AjaxLoadGetXML
	AjaxLoadGetXML(objResult, strURL, booAsynchronous, strMsg);
}

// not quite working yet:
function AjaxLoadGetXML(objXMLResult, strURL, booAsynchronous, strMsg) {
	booAsynchronous = booAsynchronous ? booAsynchronous : true; // <- booAsynchronous is optional (default to true)
	arrMsg = StatusMessage(strMsg);
	
	xmlhttp.open('GET', GetURLCacheIssueWorkaround(strURL), booAsynchronous);
	xmlhttp.onreadystatechange = XMLStateChangeLoad_ResponseXML;
	xmlhttp.send(null);
}

// not quite working yet:
function XMLStateChangeLoad_ResponseXML() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		while (document.getElementById('news').hasChildNodes()) {
			document.getElementById('news').removeChild(document.getElementById('news').firstChild);
		}
		
		// still not sure how to use this dynamically. . .
		objXMLResult = xmlhttp.responseXML;
		nodeChannel = objXMLResult.getElementsByTagName('channel');
		nodeChildren = nodeChannel.childNodes;
		
		/*
		var titleNodes = objXML.getElementsByTagName('title');
		var descriptionNodes = objXML.getElementsByTagName('description');
		var linkNodes = objXML.getElementsByTagName('link');
		//alert(titleNodes.length);
		//alert(descriptionNodes.length);
		//alert(linkNodes.length);
		
		for (var i = 1; i < titleNodes.length; i++) {
			var newtext = document.createTextNode(titleNodes[i].childNodes[0].nodeValue);
			var newpara = document.createElement('p');
			var para = document.getElementById('news').appendChild(newpara);
			newpara.appendChild(newtext);
			newpara.className = 'title';
			
			var newtext2 = document.createTextNode(descriptionNodes[i].childNodes[0].nodeValue);
			var newpara2 = document.createElement('p');
			var para2 = document.getElementById('news').appendChild(newpara2);
			newpara2.appendChild(newtext2);
			newpara2.className = 'descrip';
			
			var newtext3 = document.createTextNode(linkNodes[i].childNodes[0].nodeValue);
			var newpara3 = document.createElement('p');
			var para3 = document.getElementById('news').appendChild(newpara3);
			newpara3.appendChild(newtext3);
			newpara3.className = 'link';
		}
		*/
	}
}
