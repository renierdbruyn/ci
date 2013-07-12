$(document).ready(function()
 {
	var grade=document.getElementById("grade").value;
	
	if(grade==="Grade 12")
	{
		$("#matricType").show();
	}
        else
        {
            $("#matricType").hide();
        }
});

function decide()
{
	var grade=document.getElementById("grade").value;
	
	if(grade==="Grade 12")
	{
		$("#matricType").show();
	}
        else
        {
            $("#matricType").hide();
        }
}

//            $(document).ready(function() {
//                var id = 0;
//                event.preventDefault();
//                // Add button functionality
//                $("table.dynatable button.add").click(function(e) {
//                    e.preventDefault();
//                    id++;
//                    var master = $(this).parents("table.dynatable");
//                    // Get a new row based on the prototype row
//                    var prot = master.find(".prototype").clone();
//                    prot.attr("class", "")
//                    prot.find(".id").attr("value", id);
//                    master.find("tbody").append(prot);
//                });
//                // Remove button functionality
//                $(document).on("click", "table.dynatable button.remove", function() {
//                    $(this).parents("tr").remove();
//                });
//            });


 function get_syllabus() {

                var national_senior_certificate = new Array("Accounting",
                        "Agricultural Management Practice",
                        "Agricultural Science",
                        "Agricultural Technology",
                        "Business Studies",
                        "Civil Technology",
                        "Computer Applications Technology",
                        "Consumer Studies",
                        "Dance Studies",
                        "Design",
                        "Dramatic Arts",
                        "Economics",
                        "Electrical Technology",
                        "Engineering Graphics and Design",
                        "Geography",
                        "History",
                        "Hospitality",
                        "Information Technology",
                        "Life Sciences",
                        "Mathematics",
                        "Maths Literacy",
                        'Mechanical Technology',
                        "Music",
                        "Physical Science",
                        "Religion Studies",
                        "Tourism",
                        "Visual Arts");
                var senior_certificate = new Array("Afrikaans",
                        "English",
                        "IsiNdebele",
                        "IsiXhosa",
                        "IsiZulu",
                        "Sepedi",
                        "Sesotho",
                        "Setswana",
                        "Siswati",
                        "Tshivenda",
                        "Xitsonga",
                        "Accounting SG",
                        "Applied Agriculture SG",
                        "Biblical Studies HG",
                        "Biology HG",
                        "Biology SG",
                        "Business Economics HG",
                        "Business Economics SG",
                        "Commercial Mathematics SG",
                        "Computer Studies HG",
                        "Computer Studies SG",
                        "Economics HG",
                        "Economics SG",
                        "Functional Mathematics SG",
                        "Geography SG",
                        "History HG",
                        "History SG",
                        "Home Economics HG",
                        "Home Economics SG",
                        "Physical Science HG",
                        "Physical Science SG",
                        "Technical Drawing HG",
                        "Technical Drawing SG");
                var independent_education_board = new Array("Afrikaans Home Language",
                        "Afrikaans First Additional Language",
                        "English Home Language",
                        "English First Additional Language",
                        "IsiXhosa First Additional Language",
                        "IsiZulu Home Language",
                        "IsiZulu First Additional Language",
                        "Sepedi First Additional Language",
                        "Sesotho First Additional Language",
                        "Setswana First Additional Language",
                        "SiSwati Home Language",
                        "SiSwati First Additional Language",
                        "Mathematical Literacy",
                        "Mathematics",
                        "Life Orientation",
                        "Dance",
                        "Design",
                        "Dramatic Arts",
                        "Music",
                        "Visual Culture Studies / Visual Arts",
                        "Accounting",
                        "Business Studies",
                        "Economics",
                        "Arabic Second Additional Language",
                        "French Second Additional Language",
                        "German Home Language",
                        "German Second Additional Language",
                        "Gujarati Home Language",
                        "Gujarati First Additional Language",
                        "Gujarati Second Additional Language",
                        "Hebrew Second Additional Language",
                        "Hindi Second Additional Language",
                        "Italian Second Additional Language",
                        "Latin Second Additional Language",
                        "Modern Greek Second Additional Language",
                        "Portuguese Home Language",
                        "Portuguese First Additional Language",
                        "Portuguese Second Additional Language",
                        "Spanish Second Additional Language",
                        "Tshivenda First Additional Language",
                        "Civil Technology",
                        "Engineering Graphics and Design",
                        "Geography",
                        "History",
                        "Religion Studies",
                        "Computer Applications Technology",
                        "Information Technology",
                        "Life Sciences",
                        "Physical Sciences",
                        "Consumer Studies",
                        "Hospitality Studies",
                        "Tourism",
                        "Equine Studies",
                        "Sports and Exercise Science",
                        "Royal Schools of Music Practical Grade 6",
                        "Royal Schools of Music Practical Grade 7",
                        "Royal Schools of Music Practical Grade 8",
                        "Trinity College of London Practical Grade 6",
                        "Trinity College of London Practical Grade 7",
                        "Trinity College of London Practical Grade 8",
                        "Trinity College of London Performer's Licentiate",
                        "Unisa Practical Music Grade 6",
                        "Unisa Practical Music Grade 7",
                        "Unisa Practical Music Grade 8",
                        "Unisa Performer's Licentiate in Music",
                        "Advanced Programme Mathematics",
                        "Advanced Mathematics");
                var syllabus = document.school_subjects.syllabus.value;
                var names, values;
                if (syllabus === "National Senior Certificate")
                {
                    names = national_senior_certificate;
                    values = national_senior_certificate;
                }
                else if (syllabus === "Independent Education Board")
                {
                    names = independent_education_board;
                    values = independent_education_board;
                }
                else if (syllabus === "Senior Certificate")
                {
                    names = senior_certificate;
                    values = senior_certificate;
                }
                var opt;
                for (var i = 0; i < names.length; i++)
                {
                    opt = new Option(names[i], values[i], false, false);
                    document.school_subjects.list.options[i] = opt;
                }

            }
            
            

