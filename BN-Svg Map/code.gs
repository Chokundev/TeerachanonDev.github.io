var ss = SpreadsheetApp.openByUrl("https://docs.google.com/spreadsheets/d/1sp5o8ttR1ntv2fqzPNO2j4r-xWSN6R1shLM5Pi2NWS0/edit#gid=306637067");
var sheet = ss.getSheetByName("Reply");
function doPost(e) {
   
  var data = JSON.parse(e.postData.contents)
  var userMsg = data.originalDetectIntentRequest.payload.data.message.text;
  var values = sheet.getRange(2, 1, sheet.getLastRow(),sheet.getLastColumn()).getValues();
for(var i = 0;i<values.length; i++){
    
    if(values[i][0] == userMsg ){
      i=i+2;
var Data = sheet.getRange(i,2).getValue();
   
      var result = {
    "fulfillmentMessages": [
  {
    "platform": "line",
    "type": 4,
    "payload" : {
    "line":  {
  "type": "text",
  "text": Data
    }
        
   }
  }
 ]
}
      
    var replyJSON = ContentService.createTextOutput(JSON.stringify(result)).setMimeType(ContentService.MimeType.JSON);
    return replyJSON;
}
  }
}