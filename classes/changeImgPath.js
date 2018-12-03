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


         /*
         <div class="input-group">
            <div class="custom-file">
               <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
               <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
            </div>
            <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
            </div>
         </div>
         */
         $("<form></form>", { // form creation
            "class": "mb-3",
            "method": "post",
            "action": "index.php",
            "enctype": "multipart/form-data",
            "id": String("form_user_img_path")
         }).appendTo("#card-container");
         $("<div></div>", { // div for form
            "class": "input-group mb-3",
            "id": String("user_img_path")
         }).appendTo("#form_user_img_path");
         $("<div></div>", { // div for form
            "class": "custom-file",
            "id": String("user_img_path_div_custom")
         }).appendTo("#user_img_path");
         $("<input></input>", { // input to enter new path
            "type": "file",
            "name": "path",
            "class": "custom-file-input",
            "aria-describedby": "inputGroupFileAddon04"
         }).appendTo("#user_img_path_div_custom");
         $("<label></label>", { // input to enter new path
            "class": "custom-file-label",
            "for":"inputGroupFile04",
            "text":"Choose file"
         }).appendTo("#user_img_path_div_custom");
         $("<div></div>", { // input to enter new path
            "class": "input-group-append",
            "id": String("user_img_path_div_btn")
         }).appendTo("#user_img_path");
         $("<input></input>", { // input to Submit
            "class": "btn btn-outline-secondary",
            "type": "submit",
            "name": "submit",
            "id": "button-addon2",
            "value": "Upload"
         }).appendTo("#user_img_path_div_btn");


         /*   $("<form></form>", { // form creation
               "class": "input-group mb-3",
               "method": "post",
               "action": "index.php",
               "enctype": "multipart/form-data",
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
            }).appendTo("#user_img_path");*/
      }
   });
});
