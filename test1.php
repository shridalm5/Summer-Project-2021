<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
  </head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<style>

  .intro {
  background-color: yellow;
}
</style>
  <body>
    <h1>PDF Example with iframe</h1>
    <iframe src="sample.pdf" width="100%" height="500px" id="myIframe">
    </iframe>
    <div id="temp">





    <script>//$(function() { alert('hello') });
var searchWord = "demonstration";
$(document).ready(function(){
    $('#myIframe').ready(function(){
        var $html = $($('#myIframe').contents().find('body').html());
     if($html.contents().text().search(searchWord)!=-1){
       console.log("Found");
       var replaceWith = "<span style='color:red'>"+searchWord+"</span>"
       var newHTML = $html.text().replace(searchWord, replaceWith);
       $('#myIframe').contents().find('body').html(newHTML);
     }
   });
});
  </script>

<a href="#" onclick=" window.find('yet');">Find in This Page...</a>

  </body>
</html>


