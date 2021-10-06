<?php 
require_once ("GianlucaVendittiInclude.php");

//http://localhost/ZooUsingIncludeFile.php

function DataEntryForm()  // method post means to create a post array, form action means to load the same page
{
    echo " 
    <form action = ? method=post>";  
        echo "<div class = \"DataPair\">";
        DisplayLabel("Name:");
        DisplayTextBox("f_AnimalName", 20, "Claws");
        echo"</div>";
        echo "<div class = \"DataPair\">";
        DisplayLabel("Type of Animal:");
        DisplayTextBox("f_AnimalType", 10, "Tiger");
        echo"</div>";
        echo "<div class = \"DataPair\">";
        DisplayLabel("Pounds of Food per day:");
        DisplayTextBox("f_Pounds", 25, 25);
        echo"</div>";
        echo "<div class = \"DataPair\">";
        echo"<p>Notes <TEXTAREA name = \"f_Notes\" rows = 5 columns = 40></TEXTAREA></p>";
        echo"</div>";
	    DisplayButton("f_DisplayData", "displaydata", "save.png", "saveimg"); //calling display button function passing in display data and image                                                                           
	echo "</form>";
    
}

function DisplayDataForm()
{
    echo "<form action = ? method=post>";
  
    $animalName = $_POST ["f_AnimalName"]; // go and get that phantom for the post array and store it in the varible 

    $animalType = $_POST ["f_AnimalType"]; // The form data entered by the user is saved in a global array 

    $pounds = $_POST ["f_Pounds"];

    $notes = $_POST["f_Notes"];

    //code seperately 
    echo "<p>Animal Name: "; //always use double quotes when prtining to screen 
    echo $animalName;         // varible name 


    // concatenate strings 
    echo "<p>Type: " . $animalType . "</p>";
    echo "<p>Food intake: " . $pounds . " pounds per day </p>"; 

    // a short cut works for simple tasks
    echo "<p>Details: $notes</p>\n";
    DisplayButton("f_Done", "displaydata", "exit.png", "exitimg"); //calling display button function passing in f_done to send user to our goodbye page and image  
    echo "</form>";

    // Use for debugging : 
    // var_dump ($_POST); // dumps out the data
    // $x = 5; 
    //  $y = 7;
    // var_dump ($x, $y);
}

function GoodByeForm()
{
    echo "Goodbye. ";
}

//main 

WriteHeaders("It’s a Zoo Around Here", "Zoo Crazy");

// isset is a function that returns true if the parameter ($_POST["f_DisplayData"])
//is set. f_DisplayData is only set if the DisplayData button is pressed. 

// The first time through, no buttons have been pressed so both isset calls return false
// and DataEntryForm is run

//The second time though $_POST["f_DisplayData"] has a value - ie it is set 
// because the Display Data button was pressed. 
// isset returnns true. The if true and the DisplayDataForm function runs 

if (isset($_POST["f_DisplayData"])) 
  DisplayDataForm();
else
	if (isset($_POST["f_Done"]))
	  GoodbyeForm();
	else // we are on the first page
       DataEntryForm();
WriteFooters();

?>