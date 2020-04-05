$(document).ready(function(){
	//page/input validation
	var name_err = false;
	var course_err = false;
	var grade_err = false;

	function check_name(){
	   var pattern = /^[a-zA-Z'-.\s ]+$/;
       var name = $("#name").val();
       if (pattern.test(name) && name !== '') {
          $("#name_err").hide();
          $("#name").css("border","1px solid #34F458");
       } else {
          $("#name_err").html("<span class='text-danger'>please input a proper name</span>");
          $("#name_error").show();
          $("#name").css("border","1px solid #F90A0A");
          name_err = true;
       }
	}

		function check_course(){
	   var pattern = /^[a-zA-Z'-.\s ]+$/;
       var course = $("#course").val();
       if (pattern.test(course) && course !== '') {
          $("#course_err").hide();
          $("#course").css("border","1px solid #34F458");
       } else {
          $("#course_err").html("<span class='text-danger'>please input a proper string</span>");
          $("#course_error").show();
          $("#course").css("border","1px solid #F90A0A");
          course_err = true;
       }
	}

		function check_grade(){
	   var pattern = /^\d{2}$/;
       var grade = $("#grade").val();
       if (pattern.test(grade) && grade !== '') {
          $("#grade_err").hide();
          $("#grade").css("border","1px solid #34F458");
       } else {
          $("#grade_err").html("<span class='text-danger'>please input a proper digit</span>");
          $("#grade_error").show();
          $("#grade").css("border","1px solid #F90A0A");
          grade_err = true;
       }
	}
			$("#name").focusout(function(){
				check_name();
			})

			$("#course").focusout(function(){
				check_course();
			})

			$("#grade").focusout(function(){
				check_grade();
			})

			$("#sub").submit(function(){
					name_err = false;
	                course_err = false;
	                grade_err = false;
				check_name();
				check_course();
				check_grade();
				
				if(name_err == false || course_err == false || grade_err == false){
					alert("Form filled successfully");
					return true;
					
				}else{
					alert("Fill the form correctly before you submit");
					return false;
				}
			})


})