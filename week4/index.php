<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
       $hour = date("G");

        if ($hour >= 5 && $hour < 9) {
            echo "It's breakfast time! The animals should eat: Bananas, Apples, and Oats.";
            echo "<br> <br>";
        } elseif ($hour >= 12 && $hour < 14) {
            echo "It's lunch time! The animals should eat: Fish, Chicken, and Vegetables.";
            echo "<br> <br>";
        } elseif ($hour >= 19 && $hour < 21) {
            echo "It's dinner time! The animals should eat: Steak, Carrots, and Broccoli.";
            echo "<br> <br>";
        } else {
            echo "It's not feeding time. The animals are not being fed right now.";
            echo "<br> <br>";
        }


        $randomNumber = 59;

        if ($randomNumber % 5 == 0 && $randomNumber % 3 == 0){
            echo "FizzBuzz";
            echo "<br> <br>";
        } elseif( $randomNumber % 5 === 0){
            echo "Buzz";
            echo "<br> <br>";
        } elseif( $randomNumber % 3 === 0 ){
            echo "Fizz";
            echo "<br> <br>";
        } else{
            echo $randomNumber;
            echo "<br> <br>";
        }


        // Function to fetch user data from the JSONPlaceholder API
        function getUsers() {
        $url = "https://jsonplaceholder.typicode.com/users";
        $data = file_get_contents($url);
        return json_decode($data, true);
        }
        // Get the list of users
        $users = getUsers();


        // echo json_encode($users);

        for ($i = 0; $i < count($users); $i++) {
            echo "Name: ". $users[$i]["name"] ."<br>";
            echo "Email: <a href='mailto:" . $users[$i]["email"] . "'>" . $users[$i]["email"] . "</a><br>";
            echo "Street: ". $users[$i]["address"]["street"]."<br>";
            echo "City: ". $users[$i]["address"]["city"]."<br>";
            echo "<br>";
        }
                
    ?>
</body>
</html>