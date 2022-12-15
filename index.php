<?php 
class ArenaRacingTest{
    //I have dedicated a single file for this Test. 
    //
    //• Each entity must have a unique identifier.
    // • The Movie entity must hold the title, runtime and release date.
    // • The Actor entity must hold the name and date of birth.
    // • For all properties consider validation of the values.
    // • Each entity must contain a method that returns its data as JSON.
    // • Also provide methods for retrieving the values of each property individually.
    // • Movies must hold a collection of Actors and the characters being portrayed.
    // • The Movie entity requires a method of retrieving all Actors ordered by descending age.
}

class EntityData extends ArenaRacingTest{

    public function movies(){
        // i have decided to store the movie list in a json array
        // Since a database is not required for the test
        $jsondata = '{
            "movies":[
                {"id" : "1", "title" : "Django", "runtime" : "2", "release_date" : "9-10-2015" },
                {"id" : "2", "title" : "The Avengers", "runtime" : "4", "release_date" : "11-7-2021" },
                {"id" : "3", "title" : "Wakanda", "runtime" : "3",  "release_date" : "20-12-2019" }
            ]
        }';

        return $jsondata;
    }

    public function actors(){
        $jsondata = '{
            "actors":[
                {"id" : "1", "name" : "Michael Joe", "DOB" : "1980-7-3", "movie_id" : "2" },
                {"id" : "2", "name" : "Will Smith", "DOB" : "1979-10-12", "movie_id" : "1" },
                { "id" : "3", "name" : "Steve Anderson", "DOB" : "1986-1-30", "movie_id" : "3" }
            ]
        }';

        return $jsondata;
    }

}

$entities = new EntityData();

$moviedata =  json_decode($entities->movies(), true);
$actordata =  json_decode($entities->actors(), true);

///sorting my array
// usort($moviedata,function($a,$b) {
//   return strnatcasecmp($a['title'],$b['title']);
// });
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>TASK - Paul Okwuchi</title>
  </head>
  <body>
    <div class="card">
  <div class="card-header">
    Test
  </div>
  <div class="card-body">
    <h5 class="card-title">Arena Racing - Technical Task - Paul Okwuchi</h5>
    <p class="card-text">

      <?php 
      
        /////Display Movie List
        if (count($moviedata['movies'])) {
            echo "<table class='table table-striped table-hover'><thead>";
            echo "<tr><th scope='col'>id</th><th scope='col'>Movie Title</th><th scope='col'>Run Time</th><th scope='col'>Release Date</th><th scope='col'>Actors</th></tr></thead> <tbody>";
            ///// loop through the movie array
            foreach ($moviedata['movies'] as $data) {
                /////// Output each row
                echo "<tr>";
                echo "<td>" .$data['id']. "</td>";
                echo "<td><i class='icofont-video-cam'></i>" .$data['title']. "</td>";
                echo "<td>". $data['runtime']. "</td>";
                echo "<td>" .$data['release_date']. "</td>";
                ///getting actors associated with the movies
                foreach($actordata['actors'] as $datax) {
                  if(in_array($datax['movie_id'], $data)) {
                    echo "<td>" .$datax['name']. "</td>";
                  } 
                }
                
                echo "</tr>";
            }
            echo "</tbody></table>";
        }else {
            echo "No Data";
        }
      ?>  

    </p>
    <a href="#" class="btn btn-primary"></a>
  </div>
  
</div>

  </body>
</html>