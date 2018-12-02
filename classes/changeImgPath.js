$(document).ready(function() {


   /*$("#button-addon2").click(function() {
      $.ajax({
         url: 'classes/addPath.php',
         type: 'post',
         data: {
            "callFunc1": document.getElementById('newpath').value
         },
         success: function(response) {
            alert(response);
         }
      });
   });*/
   $("#changePath").click(function() {
      if (document.getElementById('form_user_img_path')) { //if exist hide it if not create it
         $("#form_user_img_path").remove();
      } else {
         /*<div class="custom-file">
         <input type="file" class="custom-file-input" id="customFile">
         <label class="custom-file-label" for="customFile">Choose file</label>
         </div>*/
         /*$("<form></form>", { // form creation
            "class": "input-group mb-3",
            "method": "post",
            "action": "index.php",
            "enctype":"multipart/form-data",
            "id": String("form_user_img_path")
         }).appendTo("#card-container");
         $("<div></div>", { // div for form
            "class": "form-group",
            "id": String("user_img_path")
         }).appendTo("#form_user_img_path");
         $("<input></input>", { // input to enter new path
            "type": "file",
            "name": "path",
            "class":"form-control-file"
         }).appendTo("#user_img_path");
         /*$("<label></label>", { // input to enter new path
            "class": "custom-file-label",
            "for":"customFile",
            "text":"Choose file"
         }).appendTo("#user_img_path");*/
         /*$("<submit></submit>", { // input to Submit
         //   "class": "btn btn-outline-secondary",
         "class":"btn btn-outline-secondary",
            "type": "submit",
            "name": "submit",
            "id": "button-addon2",
            "text": "OK"
         }).appendTo("#user_img_path");*/
         $("<form></form>", { // form creation
           "class": "input-group mb-3",
           "method": "post",
           "action": "index.php",
           "enctype":"multipart/form-data",
           "id": String("form_user_img_path")
        }).appendTo("#card-container");
        $("<div></div>", { // div for form
           "class": "input-group mb-3",
           "id": String("user_img_path")
        }).appendTo("#form_user_img_path");
        $("<input></input>", { // input to enter new path
           "type": "file",
           "name": "path"
        }).appendTo("#user_img_path");
        $("<div></div>", { // input to enter new path
           "class": "input-group-append"
        }).appendTo("#user_img_path");
        $("<input></input>", { // input to Submit
           "class": "btn btn-outline-secondary",
           "type": "submit",
           "name": "submit",
           "id": "button-addon2",
           "text": "OK"
        }).appendTo("#user_img_path");
      }
   });
});
