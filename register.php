<html>  
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<title>  
Registration Form
</title>
<style>
        .header{padding-left:40%;
        }
        .table{padding-left:1%;padding-top:3%;
        }
        #submit{margin-left:60%;margin-top:3%;
        }
</style>  
</head>  
<body>
    <div class="header">
        <h1>Registration Form</h1>
    </div>
    <div class="table">        
        <form method="POST" enctype="multipart/form-data" action="handler.php">
            <div class="form-group row">
                <label for="completeName" class="col-sm-2 col-form-label">Complete Name:</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="completeName" name="completeName" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email Address:</label>
                <div class="col-sm-4">
                <input type="email" class="form-control" id="email" name="email" value="email@sample.com" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="confirmPassword" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="choose_file" class="col-sm-2 col-form-label">Choose File</label>
                <div class="col-sm-4">
                <input type="file" class="form-control" id="choose_file" name="choose_file" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                <button id="submit"  type="submit" class="btn btn-primary mb-2">Submit Registration</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>