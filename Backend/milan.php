<?php
// Start the session
session_start();

// Include database connection file
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $location_id = $_POST['location_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (user_id, username, location_id, rating, comment) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiis", $user_id, $username, $location_id, $rating, $comment);

    if ($stmt->execute()) {
        $message = "New review created successfully";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all reviews for the specific location
$location_id = 1; // Assuming 1 is the location_id for Sydney Opera House
$sql = "SELECT user_id, username, rating, comment, created_at FROM reviews WHERE location_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $location_id);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Australia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <div class="title1">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-body-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><h1 style="color: red;">Voyage</h1></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="homepage.html" style="color: white;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html" style="color: white;">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php" style="color: white;">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">MILAN</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./mil3.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./mill2.avif" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./mi3.avif" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./mil3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./mil1.webp" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./mil2.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="description">
                <div style="color: white;">
                    <h3 style="color: red;">Description :<br></h3>
                    <p>Milan, the fashion capital of Italy, captivates visitors with its blend of historic grandeur and modern sophistication. Home to iconic landmarks such as the magnificent Duomo di Milano and the historic Galleria Vittorio Emanuele II, Milan exudes an aura of elegance and style. Delight in world-class shopping, cultural attractions, and vibrant nightlife, all set against a backdrop of stunning architecture and bustling city life.

                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Venice:</p>
<ul>
    <li>
        <b>St. Mark's Basilica:</b>
        <p>Admire the splendor of St. Mark's Basilica, a stunning example of Byzantine architecture located in the heart of Venice's iconic St. Mark's Square. Marvel at its intricate mosaics, golden domes, and ornate marble facade.</p>
        <p><b>Opening Hours:</b> 9:30 AM to 5:00 PM (varying seasonally)</p>
        <p><b>Ticket Price:</b> Free entry, optional fees for access to museum areas</p>
    </li>
    <li>
        <b>Rialto Bridge:</b>
        <p>Experience the charm of the Rialto Bridge, one of Venice's most famous landmarks and the oldest bridge spanning the Grand Canal. Take in panoramic views of the canal and bustling activity below as you stroll across this iconic structure.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Free entry</p>
    </li>
    <li>
        <b>Doge's Palace:</b>
        <p>Step into Venetian history at the Doge's Palace, a magnificent Gothic palace that once served as the seat of Venetian government. Explore its lavish chambers, opulent artworks, and infamous Bridge of Sighs.</p>
        <p><b>Opening Hours:</b> 8:30 AM to 7:00 PM (varying seasonally)</p>
        <p><b>Ticket Price:</b> €20 for adults, discounts available for children and seniors (as of 2022)</p>
    </li>
    <li>
        <b>Grand Canal:</b>
        <p>Embark on a scenic journey along the Grand Canal, Venice's main waterway, aboard a traditional Venetian gondola or vaporetto (water bus). Marvel at the historic palaces, churches, and bridges that line the canal, offering a unique perspective of the city.</p>
        <p><b>Operating Hours:</b> Vaporetto operates from early morning until late evening</p>
        <p><b>Ticket Price:</b> Varies depending on route and ticket type</p>
    </li>
    <li>
        <b>Bridge of Sighs:</b>
        <p>Discover the legendary Bridge of Sighs, an iconic symbol of Venice connecting the Doge's Palace to the historic prison. Legend has it that the bridge earned its name from the sighs of prisoners as they caught their last glimpse of freedom.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Viewable from exterior, included in Doge's Palace ticket for interior access</p>
    </li>
    <li>
        <b>Ca' d'Oro:</b>
        <p>Marvel at the architectural splendor of Ca' d'Oro, a magnificent Venetian Gothic palace overlooking the Grand Canal. Explore its art collections, featuring masterpieces by renowned artists, and admire the palace's ornate facade adorned with intricate details.</p>
        <p><b>Opening Hours:</b> 10:00 AM to 6:00 PM (closed on Mondays)</p>
        <p><b>Ticket Price:</b> €12 for adults, discounts available for students and seniors (as of 2022)</p>
    </li>
</ul>

                    
                    
                </div>
            </div>
            
                <div class="reviews">
                    <h3 style="color: red;">Reviews :</h3>

                    <?php if (isset($message)): ?>
                        <div class="alert alert-info"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <!-- Review Form -->
                    <form id="reviewForm" method="POST" action="">
                        <div class="form-group">
                            <label for="user_id">User ID:</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="location_id">Location ID:</label>
                            <input type="text" class="form-control" id="location_id" name="location_id" value="1" readonly>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select class="form-control" id="rating" name="rating" required>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Review:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <!-- Display Reviews -->
                    <div id="reviewList">
                        <?php foreach ($reviews as $review): ?>
                            <p><b>User ID: <?php echo htmlspecialchars($review['user_id']); ?> (Username: <?php echo htmlspecialchars($review['username']); ?>)</b> (<?php echo $review['rating']; ?>/5):<br>
                            <?php echo htmlspecialchars($review['comment']); ?><br>
                            <small>Reviewed on: <?php echo $review['created_at']; ?></small></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            
                <div class="recommendation">
                    <h3 style="color: red;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Milan, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./milan_hotel1.jpg" class="card-img-top" alt="Milan Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Bulgari Hotel Milano</h5>
                                    <p class="card-text">Experience contemporary luxury and Italian style at Bulgari Hotel Milano, located in the heart of Milan's fashionable Quadrilatero della Moda.
                                        This boutique hotel offers sleek accommodations, innovative cuisine, and personalized service.
                                        Guests can indulge in spa treatments, shop at nearby designer boutiques, or explore Milan's cultural attractions and vibrant nightlife.</p>
                                    <a href="https://www.bulgarihotels.com/en_US/milan" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./milan_hotel2.jpg" class="card-img-top" alt="Milan Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Park Hyatt Milan</h5>
                                    <p class="card-text">Discover understated elegance and refined hospitality at Park Hyatt Milan, situated near the iconic Galleria Vittorio Emanuele II.
                                        This luxury hotel offers spacious rooms, gourmet dining options, and a tranquil spa.
                                        Guests can explore Milan's cultural landmarks, indulge in shopping excursions, or simply unwind in the hotel's serene ambiance.</p>
                                    <a href="https://www.hyatt.com/en-US/hotel/italy/park-hyatt-milan/milph" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./milan_hotel3.webp" class="card-img-top" alt="Milan Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Four Seasons Hotel Milano</h5>
                                    <p class="card-text">Experience timeless luxury and historic charm at Four Seasons Hotel Milano, housed in a converted 15th-century convent.
                                        This landmark hotel offers elegant accommodations, Michelin-starred dining, and personalized service.
                                        Guests can explore Milan's cultural treasures, relax in the hotel's lush courtyard garden, or indulge in spa treatments inspired by traditional Italian rituals.</p>
                                    <a href="https://www.fourseasons.com/milan/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
