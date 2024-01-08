<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PHP CRUD Application</title>

   <style>

    
    .card{
        width:100%;
        border : none;
        background-color:transparent;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .card img{
        width:200px;
        border-radius:50%;
        object-fit:cover;
    }
    .card label{
        margin-top:30px;
        text-align:center;
        height:40px;
        cursor:pointer;
        font-weight:bold;
        margin-bottom:20px;
    }
    .card input{
        display:none;
    }
   </style>
</head>

<body class="bg-dark text-light">
   <div class="container mt-5">
      <div class="text-center mb-4">
         <h3>Update Wikis</h3>
         <p class="text-muted">Complete the form below to update a wiki</p>
      </div>

      <div class="container d-flex justify-content-center"style="margin-top:10%;">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="card mb-5">
        
            <img src="/Wiki/public/img/me.jpg">
        
                </div>
               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" placeholder="firstname" value="">
               </div>

               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" placeholder="lastname" value="">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">CIN:</label>
               <input type="text" class="form-control" name="cin" placeholder="CIN" value="">
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com" value="">
            </div>

            <div class="row ms-1 mt-4">
               <button type="submit" class="btn btn-success col-3 me-3" name="submit">Update</button>
               <a href="index.php" class="btn btn-danger col-3">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
</body>

</html>