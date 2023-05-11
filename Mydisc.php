<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add My Discussion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <style>
        .review-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background:pink;
            margin-top:5rem;
          }
          
          .review-header {
            text-align: center;
            margin-bottom: 20px;
          }
          
          .review-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
          }
          
          .form-group {
            display: flex;
            flex-direction: column;
          }
          
          label {
            font-weight: bold;
            margin-bottom: 5px;
          }
          
          input[type="text"],
          select,
          textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
          }
          
          button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
          }
          
          button[type="submit"]:hover {
            background-color: #2E8B57;
          }
          
          
          
    </style>
</head>
<body>
    <?php include 'partials/nav.php'; ?>
    <?php include 'partials/footer.php' ?>
  
    <div class="review-container">
        <div class="review-header">
          <h2>Rate and Review</h2>
        </div>
        <form class="review-form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
              <option value="" selected disabled hidden>Select a rating</option>
              <option value="1">1 Star</option>
              <option value="2">2 Stars</option>
              <option value="3">3 Stars</option>
              <option value="4">4 Stars</option>
              <option value="5">5 Stars</option>
            </select>
          </div>
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea id="review" name="review" rows="5" required></textarea>
          </div>
          <button type="submit">Submit</button>
        </form>
      </div>
      
      
    
</body>

</html>