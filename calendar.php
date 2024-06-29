<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="calenderStyle.css">
    <link rel="stylesheet" href="evo-calendar.min.css">
    <link rel="stylesheet" href="evo-calendar.midnight-blue.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<style> 
body
{
    background: url('Images/pexels-rafael-guajardo-194140-604684.jpg') no-repeat;
    background-size: cover;
    background-position: center;
}
input[type = "submit"] {
    background-color: blue;
    color :#fff;
    padding: 20%;
    border: none;
    border-radius: 5px;
    cursor: pointer;

}
input[type="submit"]:hover{
    background-color: lightblue;
}
.back-to-main {
    display: block;
    margin: 20px auto;
    width: fit-content;
}
</style>

</head>
<body>
<a href = "index.php" class="back-to-main">
            <input type = "submit" value = "BACK TO MAIN">
            </a>
    <div class="hero">

        <div id="calendar"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="evo-calendar.min.js"></script>

    <script>
$(document).ready(function() {
    $('#calendar').evoCalendar({
        
        theme: 'Midnight Blue',
        
        calendarEvents: [
      {
        id: 'Event1', 
        name: "New Year", 
        date: "January/1/2020", 
        description:"Beginning of the new year",
        type: "holiday", 
        everyYear: true 
      },
      {
        id: 'Event2', 
        name: "Predicate Day", 
        date: "May/20/2024", 
        description:"Predicate day for semester modules",
        type: "School Activity", 
        everyYear: false 
      },

      {
        id: 'Event3',
        name: "Confirmation of Predicate", 
        badge: "05/20 - 05/24", 
        date: ["May/20/2024", "May/24/2024"], 
        description:"Confirmaion of Predicate Marks",
        type: "School Activity", 
        everyYear: false, 
        color: "green"
      },
      {
        id: 'Event4', 
        name: "TUT RECESS", 
        badge: "06/1 - 06/12", 
        date: ["July/1/2024", "July/12/2024"], 
        description:"School holidays",
        type: "Holiday", 
        everyYear: false 
      },
      {
        id: 'Event5', 
        name: "Youth Day", 
        date: "June/16/2024", 
        description:"Youth Day",
        type: "holiday", 
        everyYear: true ,
        color: "yellow"
      },
      {
        id: 'Event6', 
        name: "Public Holiday", 
        date: "June/17/2024", 
        
        type: "holiday", 
        everyYear: true ,
        color:  "red"
      },
      {
        id: 'Event7', 
        name: "End of First Semester", 
        date: "June/28/2024", 
        
        type: "School Activity", 
        everyYear: false ,
        color:  "orange"
      },
      {
        id: 'Event8', 
        name: "Publication of final Examination Results", 
        date: "July/5/2024", 
        type: "School Activity", 
        everyYear: false ,
        color:  "grey"
      },
      {
        id: 'Event9', 
        name: "MOB316D", 
        date: "June/20/2024",
        description:"Exam date for students doing MOB316D", 
        type: "Exam", 
        everyYear: false ,
        color:  "purple"
      },
      {
        id: 'Event10', 
        name: "INT316D", 
        date: "June/13/2024", 
        description:"Exam date for students doing INT316D", 
        type: "School Activity", 
        everyYear: false ,
        color:  "purple"
      },
      {
        id: 'Event11', 
        name: "DBP316D", 
        date: "June/18/2024", 
        description:"Exam date for students doing DBP316D", 
        type: "School Activity", 
        everyYear: false ,
        color:  "purple"
      },
      {
        id: 'Event12', 
        name: "Christmas Day", 
        date: "December/25/2024", 
        type: "Holiday", 
        everyYear: true ,
        color:  "brown"
      },

      
      {
        name: "Exams",
        badge: "06/03 - 06/24", 
        date: ["June/03/2024", "June/24/2024"], 
        description: "Exams", 
        type: "event",
        color: "#63d867" 
      }

    ]
    })
})
 
    </script>
    
</body>
</html>